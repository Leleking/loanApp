<?php

namespace App\Http\Controllers;
use App\customer;
use App\User;
use App\guarantor;
use App\loan;
use App\loanType;
use Illuminate\Http\Request;

class pagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return redirect('/home');
    }
    public function manageCustomers(){
        //returns the page to manage customers
        $id = auth()->user()->id;
        //get the current id of the user
        $customer = customer::where('user_id',$id)->orderBy('id','asc')->get();
        //return all customers which where entered by that particular user
        return view('customer.manageCustomers')->with('customer',$customer);
    }
    public function uploadGuarantorDocuments(){
    
        $customer  = customer::all();
        

       
        return view('guarantor.uploadGuarantor')->with('customer',$customer);
    }
    public function uploadCustomerDocuments(){
        $id = auth()->user()->id;
        $customer = $customer = customer::where('user_id',$id)->orderBy('id','asc')->get();
        return view('customer.uploadCustomer')->with('customer',$customer);
    }
    public function addLoan($id){
        $customer = customer::find($id);
        $loan_type = loanType::all();
        return view('loan.addLoan')->with('customer',$customer)->with('loan_type',$loan_type);
    }
    public function approveLoan(){
      $loan = loan::all();
      return view('auth.loan.approveloan')->with('loan',$loan);
    }
}
