<?php

namespace App\Http\Controllers;
use App\payment;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\loan;
class makePaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isStatus');
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'payment_date'=>'required',
           'undeposited_penalty'=>'required',
           'remaining'=>'required',
           'emi_amount'=>'required',


          ]);
          $payments = payment::where('loan_id',$request->loan_id)->orderBy('id','desc')->first();
          $due_date = Carbon::now();
          $due_date = $due_date->addMonths(1);
          
          $undeposited_penalty = $request->total - $request->penalty - $request->emi_amount;
          $penalty = $request->total - $undeposited_penalty - $request->emi_amount;
          $payment = new payment;
          $payment->emi = $request->emi_amount;
          $payment->remaining_emi = $request->remaining;
          $payment->loan_id = $request->loan_id;
          $payment->payment = $request->emi_amount;
          $payment->pay_mode = $request->pay_mode;
          $payment->undeposited_penalty = $undeposited_penalty;
          $payment->penalty = $penalty;
          $payment->loan_date= $request->payment_date;
          $payment->due_date = $due_date;
          $payment->end_date = $payments->end_date;
          if($request->remaining == 0){
              $payment->status = 1;
              $payments = payment::find($payments->id);
              
              $loan = loan::find($payments->loan_id);
              $loan->cleared = 1;
              $loan->save();
          }else{
              $payment->status = 0;
          }
          $payment->save();
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
