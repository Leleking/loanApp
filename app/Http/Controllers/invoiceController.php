<?php
namespace App\Http\Controllers;
use App\customer;
use App\User;
use App\guarantor;
use App\loan;
use App\payment;
use App\loanType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class invoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function running($id){
        $customer = customer::find($id);
        $loan = loan::where('customer_id',$customer->id)->orderBy('id','desc')->first();
        $payment = payment::where('loan_id',$loan->id)->orderBy('id','desc')->get();
        return view('invoice.running')->with('customer',$customer)->with('loan',$loan)->with('payment',$payment);
    }
    public function printRunning($id){
        $customer = customer::find($id);
        $loan = loan::where('customer_id',$customer->id)->orderBy('id','desc')->first();
        $payment = payment::where('loan_id',$loan->id)->orderBy('id','desc')->get();
        return view('print.invoice.running')->with('customer',$customer)->with('loan',$loan)->with('payment',$payment);
    }
}
