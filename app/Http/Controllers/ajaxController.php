<?php

namespace App\Http\Controllers;
use App\customer;
use App\User;
use App\guarantor;
use App\loan;
use App\payment;
use App\loan_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Mail;
use App\Mail\dueEmail;
use Nexmo\Laravel\Facade\Nexmo;
class ajaxController extends Controller
{
    public function addCustomer(Request $request){
        if($request->ajax()){
            $this->validate($request,[
                'surname'=> 'required',
                'otherName'=>'required',
                'street'=>'required',
                'birth'=>'required',
                'phone'=>'required',
                'street'=>'required',
                'city'=>'required',
                'address'=>'required',
                'state'=>'required',
                'postcode'=>'required',
                'acct_no'=>'required',
                'email'=>'required'
              ]);
              $customer = new customer;
              $customer->surname = $request->surname;
              $customer->otherName= $request->otherName;
              $customer->street = $request->street;
              $customer->birth = $request->birth;
              $customer->gender=$request->gender;
              $customer->phone =$request->phone;
              $customer->user_id=auth()->user()->id;
              $customer->city = $request->city;
              $customer->state = $request->state;
              $customer->postcode=$request->postcode;
              $customer->address=$request->address;
              $customer->acct_no =$request->acct_no;
              $customer->email=$request->email;
              $customer->save();
        
    
    
            return response()->json(['response'=>'New Customer Drafted']);
           
          
        }

    }
    public function addGuarantor(Request $request){
        if($request->ajax()){
            $this->validate($request,[
                'name'=> 'required',
                'phone'=>'required',
                'address'=>'required',
               
              ]);
              $guarantor = new guarantor;
             $guarantor->create($request->all());
              
            return response()->json(['response'=>'New Guarantor added']);   
        }
    }
    public function addCustomerLoan(Request $request){
        if($request->ajax()){
            $this->validate($request,[
                'loan_date'=> 'required',
                'penalty'=>'required',
                'principal'=>'required',
                'file'=>'required',
                'interest'=>'required',
                'years'=>'required',
                'ad_emi'=>'required',
                'pay_mode'=>'required',
                'emi_type'=>'required'
               
              ]);
              $customer_loan = loan::where('customer_id',$request->customer_id)->orderBy('id','asc')->get();
              if(!count($customer_loan)){
                $loan = new loan;
                $loan->create($request->all()); 
              return response()->json(['response'=>'New Loan added, please await approval']); 
                 
              }else{
                  foreach($customer_loan as $loan){
                    if($loan->status){
                        return response()->json(['response'=>'Loan could not be drafted.Previous Loan payment not completed']); 
                    }else{
                        return response()->json(['response'=>'Loan could not be added because there is another loan awaiting approval']); 
                    }
                   
                  }
               
              }
              
        }
    }
    public function changeStatus(Request $request){
        if($request->ajax()){
        
          
            $loan = loan::where('customer_id',$request->id)->orderBy('id','desc')->first();
            $loan = loan::find($loan->id);
            if($loan->status){
                $loan->status = 0;
                $loan->save();
                return response()->json(['response'=>'Loan has been deactivated']);
              }else
              {
                $loan->status = 1;
                $loan->save();
                $remaining = round($loan->total/$loan->emi);

                $payment = new payment;
                $payment->loan_id = $loan->id;
                $payment->remaining_emi = $remaining ;
                $payment->due_date = Carbon::now()->addMonths(1);
                $payment->save();
                return response()->json(['response'=>'Loan has been activated']);
              }
              
             
           
      
        
  
         
         
        
          }
    }
    public function pay_emi(Request $request){
        if($request->ajax()){
            $customer = customer::find($request->id);
            $customerName = $customer->surname." ".$customer->otherName;
            $loan = loan::where('customer_id',$customer->id)->orderBy('id','desc')->first();
            $payment = payment::where('loan_id',$loan->id)->orderBy('id','desc')->first();
            $payment = payment::find($payment->id);
            $due_date = Carbon::parse($payment->due_date)->format('l jS \of F Y ');
            
                $to = Carbon::createFromFormat('Y-m-d H:s:i', $payment->due_date);
                $from = Carbon::createFromFormat('Y-m-d H:s:i', Carbon::now());
                $diff_in_months = $to->diffInMonths($from);
                //print_r($diff_in_months); // Output: 1
                if($diff_in_months > 1){
                    $penalty = ($loan->penalty/100) * $loan->principal;
                    $emi_amount = $diff_in_months * $loan->emi;
                }
                else{
                    $penalty = 0;
                    $emi_amount = $loan->emi;
                }
                $total_amount = $penalty + $emi_amount + $payment->undeposited_penalty;
               
                $total_left =  $payment->remaining_emi * $loan->emi;
               
         
            return response()->json([
            'acct'=>$customer->acct_no,
            'name'=>$customerName,
            'principal'=>$loan->principal,
            'emi'=>$loan->emi,
            'due_date'=>$due_date,
            'emi_amount'=>$emi_amount,
            'penalty'=>$penalty,
            'total_amount'=>$total_amount,
            'undeposited_penalty'=>$payment->undeposited_penalty,
            'cal_total'=>$loan->total,
            'total_left'=> $total_left,
            'remaining'=>$payment->remaining_emi
            
           
            ]);
        }
    }
    public function due_payment(Request $request){
        if($request->ajax()){
          //$request->id 
          $customer = customer::findOrFail($request->id);
          $this->sendDueEmail($customer);
            return response()->json(['response'=>'Reminder Message Sent']);   
        }
    }
    public function sendDueEmail($thisCustomer){
        Mail::to($thisCustomer['email'])->send(new dueEmail($thisCustomer));
    }
    public function due_payment_sms(Request $request){
        if($request->ajax()){
            //$request->id 
            $customer = customer::findOrFail($request->id);
            $loan = loan::where('customer_id',$customer->id)->orderBy('id','desc')->first();
            $payment = payment::where('loan_id',$loan->id)->orderBy('id','desc')->first();
            $payment = payment::find($payment->id);
            $due_date = Carbon::parse($payment->due_date)->format('l jS \of F Y ');
            $sms = 'Dear '.$customer->surname.' '.$customer->otherName. ', we hope to remind you of your loan payment of '.$loan->emi.'GHc which is due on the '.$due_date.'.We hope to see you soon. Thank You';
            Nexmo::message()->send([
                'to'   => '+233248574526',
                'from' => 'KickStart',
                'text' => $sms,
            ]);
              return response()->json(['response'=>'Reminder SMS Sent']);   
          }
    }
}


