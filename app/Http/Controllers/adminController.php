<?php

namespace App\Http\Controllers;
use App\User;
use App\branch;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isSuper');
    }
    public function addUser(){
        $branch = branch::all();
        return view('auth.user.addUser')->with('branch',$branch);
    }
    public function manageUser(){
        $users = User::all();
        return view('auth.user.manageUsers')->with('users',$users);
    }
}
