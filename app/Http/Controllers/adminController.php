<?php

namespace App\Http\Controllers;
use App\User;
use App\branch;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function addUser(){
        $branch = branch::all();
        return view('auth.user.addUser')->with('branch',$branch);
    }
    public function manageUser(){
        $user = User::all();
        return view('auth.user.manage')->with('user',$user);
    }
}
