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
use Carbon\Carbon;
use Mail;
use App\Mail\dueEmail;
use Nexmo\Laravel\Facade\Nexmo;

class reportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isStatus');
    }
    public function running(){
        $id = auth()->user()->isAdmin;
        //get the current id of the user
        if(!$id){
            $customer = customer::where('user_id',$id)->orderBy('id','asc')->get();
        }else{
            $customer = customer::orderBy('id','asc')->get();
        }
       
      
        return view('report.running')->with('customer',$customer);;
    }
}
