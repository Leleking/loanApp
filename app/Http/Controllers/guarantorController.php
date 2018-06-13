<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\customer;
use App\user;
use App\guarantor;
use App\guarantor_image_file;

class guarantorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = auth()->user()->id;
        $customer = customer::where('user_id',$id)->orderBy('id','asc')->get();

        return view('guarantor.addGuarantor')->with('customer',$customer);
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
        $guarantor = new guarantor_image_file;
        $guarantor->guarantor_id = $request->input('guarantor_id');
        $guarantor->passport = $passport;
        $guarantor->id_card=$id_card;
        $guarantor->save();
        
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
