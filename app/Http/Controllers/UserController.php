<?php

namespace App\Http\Controllers;

use Validator;

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
              'name.min'   => 'Username shoould be atleast 5 characters long',  
             'email.required' => 'Email is required',
             'f_name.required' => 'First name is required',
             'f_name.min' => 'First name shoould be atleast 3 characters long',
             'l_name.required' => 'Last name is required',
             'l_name.min' => 'Last name shoould be atleast 3 characters long',

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


        $request->session()->push( 'userinfo.users', $_POST );
        return redirect()->action('UserController@render_data');
        
        
    }

    public function render_data(Request $request)
    {

        
         $data['userinfo']=$request->session()->get('userinfo.users');
        //print_r($data);
       
        return view('user_panel.user_list',$data);
    }
}
