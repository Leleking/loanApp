<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\customer;
use App\loan;
use App\payment;
use App\customer_image_file;
use Carbon\Carbon;
class customerController extends Controller
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
        
        return view('customer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.addCustomer');
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
            'id_card'=>'required',
            'passport'=> 'required',
          ]);
        $passport = $request->passport;
        
        if($passport){
            $imagename=$passport->getClientOriginalName();
            $passport->move('img/passport',$imagename);
            $passport = $imagename;

        }
        $id_card = $request->id_card;
        if($id_card){
            $imagename=$id_card->getClientOriginalName();
            $id_card->move('img/id',$imagename);
            $id_card = $imagename;

        }
        
        //
        $customer = new customer_image_file;
        $customer->customer_id = $request->input('customer_id');
        $customer->passport = $passport;
        $customer->id_card=$id_card;
        $customer->save();
        
        return redirect()->back();
        
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = customer::find($id);
        $loan = loan::where('customer_id',$customer->id)->orderBy('id','desc')->first();
        $payment_last = payment::where('loan_id',$loan->id)->orderBy('id','desc')->first();
        $payment = payment::where('loan_id',$loan->id)->orderBy('id','desc')->get();
        $loan = loan::where('customer_id',$customer->id)->orderBy('id','asc')->get();
       
       
        return view('customer.profile')->with('customer',$customer)->with('loan',$loan)->with('payment_last',$payment_last)->with('payment',$payment);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = customer::find($id);
        $birth = Carbon::parse($customer->birth)->format('Y-m-d');
        return view('customer.edit')->with('customer',$customer)->with('birth',$birth);
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
          $customer = customer::find($id);
          $customer->surname = $request->surname;
          $customer->otherName= $request->otherName;
          $customer->street = $request->street;
          $customer->birth = $request->birth;
          $customer->gender=$request->gender;
          $customer->phone =$request->phone;
          $customer->city = $request->city;
          $customer->state = $request->state;
          $customer->postcode=$request->postcode;
          $customer->address=$request->address;
          $customer->acct_no =$request->acct_no;
          $customer->email=$request->email;
          $customer->save();
          return back()->withMessage("Customer successfully Updated");
    
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
