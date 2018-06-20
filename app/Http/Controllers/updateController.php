<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\guarantor;
use App\customer;
use App\User;
use App\branch;
use App\collateral;
class updateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isStatus');
    }
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

    public function updateCollateral(Request $request){
        $this->validate($request,[
            'collateralName'=> 'required',
            'about'=>'required',
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
          $collateral = collateral::find($request->id);
          $collateral->name = $request->collateralName;
          $collateral->about = $request->about;
          if($request->about){
              $collateral->about = $request->about;
          }
          if($scan){$collateral->scan = $scan;}
          if($docs){$collateral->docs = $docs;}
          $collateral->save();
          return back()->withMessage("Collateral Information Edited Successfully");
        }
    
}
