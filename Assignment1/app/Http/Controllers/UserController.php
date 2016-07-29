<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
class UserController extends Controller
{
    //
    public function create()
    {
    	return view('user.register');

    }
    public function store(Request $request)
    {	
    	$this->validate($request, [
        'name' => 'required|min:5|alpha_num',
        'first-name' => 'required|min:3|alpha',
        'last-name' => 'required|min:3|alpha',
        'email'	=> 'required|email',
        'address' => 'email',
    	]);

    	$request->session()->push('user.data', $_POST);
    	return redirect('user/list');
    }
    public function showAll(Request $request)
    {
    	$value = $request->session()->get('user.data');
    	return view('user.list')->with('users', $value);
    }
}
