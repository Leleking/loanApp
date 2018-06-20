<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\guarantor;
use App\customer;
use App\User;
use App\branch;
class updateController extends Controller
{
    public function updateGuarantor(Request $request){
        $this->validate($request,[
            'guarantorName'=> 'required',
            'address'=>'required',
           
           
          ]); 
          $guarantor = guarantor::find($request->id);
          $guarantor->name = $request->guarantorName;
          $guarantor->address = $request->address;
          $guarantor->customer_id = $request->customer_id;
          $guarantor->save();
          return back()->withMessage("Guarantor's Information Edited Successfully");
    }
    public function updateBranch(Request $request){
        $this->validate($request,[
            'branchName'=> 'required',
            'address'=>'required',
           
           
          ]); 
          $branch = branch::find($request->id);
          $branch->name = $request->branchName;
          $branch->address = $request->address;
          if($request->about){
              $branch->about = $request->about;
          }
          $branch->save();
          return back()->withMessage("Branch Information Edited Successfully");
    }
}
