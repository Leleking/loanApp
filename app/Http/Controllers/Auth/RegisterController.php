<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Mail;
use App\Mail\verifyEmail;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isStatus');
    }
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
   

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $password = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789') , 0 , 10 );
        $image = $data['image'];
        if($image){
            $imagename=$image->getClientOriginalName();
            $image->move('img/users',$imagename);
            $image= $imagename;

        }
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($password),
            'verifyToken' => Str::random(40),
            'isAdmin'=>$data['admin'],
            'branch_id'=>$data['branch'],
            'image'=>$image,
        ]);
        $thisUser = User::findOrFail($user->id);
        $this->sendEmail($thisUser,$password);
        return $user;
    }
    public function sendEmail($thisUser,$password){
        Mail::to($thisUser['email'])->send(new verifyEmail($thisUser,$password));
    }
    public function verifyEmail(){
        return view('email.verifyEmail');
    }
    public function sendEmailDone($email,$verifyToken){
        $user = User::where(['email'=>$email,'verifyToken'=>$verifyToken])->first();
        if($user){
            $user  = User::where(['email'=>$email,'verifyToken'=>$verifyToken])->update(['status'=>1,'verifyToken'=>null]);
            $user = User::where('email',$email)->first();
            Auth::loginUsingId($user->id, TRUE);
            return view('home');
        }else{
            return 'User not found or user account already activated';
        }

    }
}
