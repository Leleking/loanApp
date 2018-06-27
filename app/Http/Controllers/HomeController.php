<?php

namespace App\Http\Controllers;
use App\customer;
use App\loan;
use App\payment;
use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;
use Carbon\Carbon;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('isStatus');
        
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        Nexmo::message()->send([
            'to'   => '+233248574526',
            'from' => 'LOAN Me',
            'text' => 'Thank You for registering with Loan Me'
        ]);
        */
        $id = auth()->user()->id;
        //get the current id of the user
        $defaultered =0;
        if(!auth()->user()->isAdmin){
            $customer = customer::where('user_id',$id)->orderBy('id','asc')->get();
        }else{
            $customer = customer::all();
        }
        foreach($customer as $customers){
            $loan = loan::where('customer_id',$customers->id)->orderBy('id','desc')->first();
           $payment = payment::where('loan_id',$loan['id'])->orderBy('id','desc')->first();
          if($payment && !$loan['cleared'] && $payment['due_date'] < Carbon::now() && $loan){
              $defaultered =$defaultered + 1;
          }
            
        }
        
       
        return view('home')->with('defaultered',$defaultered);
    }
    public function showChangePasswordForm(){
        return view('auth.passwords.changePassword');
    }
}
