<?php

namespace App\Http\Controllers;
use App\customer;
use App\User;
use App\guarantor;
use App\loan;
use App\loanType;
use App\branch;
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
    public function loanType($id){
        $loanType = loanType::find($id);
        return view('pages.loanType')->with('loanType',$loanType);
    }
    public function addLoanType(){
        return view('loan.addLoanType');
    }
    public function manageLoanType(){
        $loanType = loanType::all();
        return view('loan.manageLoanType')->with('loanType',$loanType);
    }
    public function manageUsers(){
        $users = User::all();
        return view('user.manageUsers')->with('users',$users);
    }
    public function manageGuarantors(){
        $guarantor = guarantor::all();
        $customer = customer::where('user_id',auth()->user()->id)->get();
        return view('guarantor.manageGuarantor')->with('guarantor',$guarantor)->with('customer',$customer);
    }
    public function addBranch(){
        return view('branch.addBranch')->with('branch.add');
    }
    public function manageBranch(){
        $branch = branch::all();
        return view('branch.manageBranch')->with('branch',$branch);
    }
    public function manageCollateral(){

    }
    public function addCollateral(){
        $id = auth()->user()->id;
        if(!auth()->user()->isAdmin){
            $customer = $customer = customer::where('user_id',$id)->orderBy('id','asc')->get();
        }else{
            $customer = $customer = customer::all();
        }
       
        return view('collateral.add')->with('customer',$customer);
    }
}
