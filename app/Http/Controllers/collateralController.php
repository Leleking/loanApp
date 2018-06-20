<?php

namespace App\Http\Controllers;
use App\collateral;
use Illuminate\Http\Request;

class collateralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
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
            'name'=>'required',
            'about'=> 'required',
          ]);
        $scan= $request->scan;
        
        if($scan){
            $imagename=$scan->getClientOriginalName();
            $scan->move('img/collateral',$imagename);
            $scan= $imagename;

        }
        $docs= $request->docs;
        
        if($docs){
            $imagename=$docs->getClientOriginalName();
            $docs->move('img/collateral',$imagename);
            $docs= $imagename;

        }
       
        
        //
        $collateral = new collateral;
        $collateral->customer_id = $request->input('customer_id');
        if($scan){$collateral->scan = $scan;}
        if($docs){$collateral->docs = $docs;}
        $collateral->name=$request->name;
        $collateral->about=$request->about;
        $collateral->save();
        return back()->withMessage("Customer's Collateral Documents successfully added");
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
