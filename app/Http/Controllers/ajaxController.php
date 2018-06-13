<?php

namespace App\Http\Controllers;
use App\customer;
use App\User;
use App\guarantor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
                'date'=> 'required',
                'penalty'=>'required',
                'principal'=>'required',
                'file'=>'required',
                'interest'=>'required',
                'years'=>'required',
                'ad_emi'=>'required',
                'pay_mode'=>'required',
                'emi_type'=>'required'
               
              ]);
            
              
            return response()->json(['response'=>'New Guarantor added']);   
        }
    }
}
