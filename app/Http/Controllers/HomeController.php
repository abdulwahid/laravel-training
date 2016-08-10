<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

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
        // print_r($user['attributes']);
        if(\Auth::user()->id == 1) //key in db in user table for role id
        {
            return view('admin_index');
        }
        else
        {
            return view('home');
        }


    }
}
