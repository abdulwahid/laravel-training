<?php

namespace App\Http\Controllers;

use Validator;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    public function index()
    {

    	return view('user_panel.add_user');
    }


    public function validate_data(Request $request)
    {
    	 
    	//echo $name = $request->input('name');
        $messages = [
             'name.required'   => 'Username is required',
             'name.min'        => 'Username should be at least 5 characters long',
             'email.required'  => 'Email is required',
             'f_name.required' => 'First name is required',
             'f_name.min'      => 'First name should be at least 3 characters long',
             'f_name.alpha'    => 'First name should only contain letters',
             'l_name.required' => 'Last name is required',
             'l_name.min'      => 'Last name should be at least 3 characters long',
             'l_name.alpha'    => 'Last name should only contain letters',

        ];

        $validator = Validator::make($request->all(), [
             'name'   => 'required|min:5|alpha_num',
             'f_name' => 'required|min:3|alpha',
             'l_name' => 'required|min:3|alpha',
             'email'  => 'required|email',
             'address'=> 'email',
        ],$messages);

          
        if ($validator->fails()) {
            return redirect('user')
                        ->withErrors($validator);
        }

         $input = $request->all();

        $username   = $request->input('name');
        $f_name     = $request->input('f_name');
        $l_name     = $request->input('l_name');
        $email      = $request->input('email');

        DB::table('recent_users')->insert([
           ['username' => $username, 'first_name' => $f_name,'last_name' =>$l_name,'email' =>$email]
       ]);


        //$request->session()->push( 'userinfo.users', $_POST );
         $request->session()->push( 'userinfo.users', $input );
         return redirect()->action('UserController@render_data');
        
        
    }

    public function render_data(Request $request)
    {
        $data['userinfo']=$request->session()->get('userinfo.users');
        //print_r($data);
         return view('user_panel.user_list',$data);
    }
}
