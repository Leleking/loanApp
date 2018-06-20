<?php

namespace App\Http\Controllers;
use App\collateral;
use App\customer;
use App\User;
use App\branch;
use App\guarantor;
use App\loan;
use App\payment;
use App\loanType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Mail;
use App\Mail\dueEmail;
use Nexmo\Laravel\Facade\Nexmo;
class ajaxController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isStatus');
    }
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
                $payment->end_date =  Carbon::now()->addMonths($remaining);
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
            'remaining'=>$payment->remaining_emi - 1,
            'loan_id'=>$loan->id
            
           
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
           // $payment = payment::find($payment['id']);
            $due_date = Carbon::parse($payment['due_date'])->format('l jS \of F Y ');
            $sms = 'Dear '.$customer->surname.' '.$customer->otherName. ', we hope to remind you of your loan payment of '.$loan->emi.'GHc which is due on the '.$due_date.'.We hope to see you soon. Thank You';
           
            Nexmo::message()->send([
                'to'   => '+233248574526',
                'from' => 'KickStart',
                'text' => $sms,
            ]);
              return response()->json(['response'=>'Reminder SMS Sent']);   
          }
         
    }
    public function addLoanType(Request $request){
        if($request->ajax()){
            $this->validate($request,[
                'name'=> 'required',
                'interest'=>'required',
               
               
              ]);
              $check = 0;
              $loanType = loanType::all();
              foreach($loanType as $loanTypes){
                  if($loanTypes->name == $request->name){
                    $check =+1; 
                    break;
                  }
              }
              if(!$check){
              $loanType = new loanType;
              $loanType->name = $request->name;
              $loanType->interest = $request->interest;
              $loanType->status = 1;
              if($request->about){
                  $loanType->about = $request->about;
              }         
              $loanType->save();
              return response()->json(['response'=>'Loan Type Added']); 
            }else{
                return response()->json(['response'=>'Loan Type already exists. Please change name and try again']); 
            }
          }       
    }
    public function guarantorEdit(Request $request){
        if($request->ajax()){
           
            $guarantor = guarantor::find($request->id);
            $created_at = Carbon::parse($guarantor->created_at)->format('l jS \of F Y ');
            return response()->json([
            'name'=>$guarantor->name,
            'id'=>$guarantor->id,
            'phone'=>$guarantor->phone,
            'address'=>$guarantor->address,
            'created_at'=>$created_at,
            ]);
        }
    }
    public function addBranch(Request $request){
        if($request->ajax()){
            $this->validate($request,[
                'name'=> 'required',
                'address'=>'required',
               
               
              ]);
              $check = 0;
              $branch = branch::all();
              foreach($branch as $branches){
                  if($branches->name == $request->name){
                    $check =+1; 
                    break;
                  }
              }
              if(!$check){
              $branch = new branch;
              $branch->name = $request->name;
              $branch->address = $request->address;
              if($request->about){
                  $branch->about = $request->about;
              }         
              $branch->save();
              return response()->json(['response'=>'Branch Added']); 
            }else{
                return response()->json(['response'=>'Branch already exists. Please change name and try again']); 
            }
          }      
    }
    public function branchEdit(Request $request){
        if($request->ajax()){
           
            $branch = branch::find($request->id);
            $created_at = Carbon::parse($branch->created_at)->format('l jS \of F Y ');
            return response()->json([
            'name'=>$branch->name,
            'id'=>$branch->id,
            'address'=>$branch->address,
            'about'=>$branch->about,
            'created_at'=>$created_at,
            ]);
        }
    }
    public function collateralEdit(Request $request){
        if($request->ajax()){
           
            $collateral = collateral::find($request->id);
            $created_at = Carbon::parse($collateral->created_at)->format('l jS \of F Y ');
            return response()->json([
            'name'=>$collateral->name,
            'id'=>$collateral->id,
            'about'=>$collateral->about,
            'docs'=>$collateral->docs,
            'scan'=>$collateral->scan,
            'created_at'=>$created_at,
            ]);
        }
    }
    public function changeUserStatus(Request $request){
        if($request->ajax()){
        
          
          
            $user = User::find($request->id);
            if($user->status){
                $user->status = 0;
                $user->save();
                return response()->json(['response'=>'User has been deactivated']);
              }else
              {
                $user->status = 1;
                $user->save();
                
                return response()->json(['response'=>'User has been activated']);
              }
              
             
           
      
        
  
         
         
        
          }
    }
}


