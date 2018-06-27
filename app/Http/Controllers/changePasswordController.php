<?php

namespace App\Http\Controllers;
use App\user;
use Illuminate\Http\Request;

class changePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isStatus');
    }
    public function postChangePassword(Request $request)
    {
        $validatedData = $request->validate([
            'oldpass' => 'required|min:6',
            'password' => 'required|string|min:6',
            'password_confirmation' => 'required|same:password',
        ],[
            'oldpass.required' => 'Old password is required',
            'oldpass.min' => 'Old password needs to have at least 6 characters',
            'password.required' => 'Password is required',
            'password.min' => 'Password needs to have at least 6 characters',
            'password_confirmation.required' => 'Passwords do not match'
        ]);

        $current_password = \Auth::User()->password;           
        if(\Hash::check($request->input('oldpass'), $current_password))
        {          
          $user_id = \Auth::User()->id;                       
          $obj_user = User::find($user_id);
          $obj_user->password = \Hash::make($request->input('password'));
          $obj_user->save(); 
          return view('auth.passwords.changeConfirmation');
        }
        else
        {           
          $data['errorMessage'] = 'Please enter correct current password';
          return redirect()->back()->with('data', $data);
        }  
    }
}
