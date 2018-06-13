<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        Nexmo::message()->send([
            'to'   => '+233248574526',
            'from' => 'LOAN Me',
            'text' => 'Thank You for registering with Loan Me'
        ]);
        */
        return view('home');
    }
}
