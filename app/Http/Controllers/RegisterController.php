<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Hash;
use Auth;
use App\User;

class RegisterController extends Controller
{
    public function form(){
    	return view('registration.signupform');
    }

    public function store(Request $request){

    		$post = $request->all();
    

    		$name = $post['name'];
    		$email = $post['email'];
    		$username = $post['username'];
    		$password = $post['password'];
    		$remember_token = $post['_token'];
    		$c_password = $post['confirm'];


    		$validator = \Validator::make(array(

    			"name" => $request->name,
    			"email" => $request->email,
    			"username" => $request->username,
    			"password" => $request->password,
    			"c_password" => $request->confirm,

    			),
				  array(

				  		"name" => 'required',
				  		"email" => 'required|email|unique:users',
				  		"username" => 'required|max:10|unique:users',
				  		"password" => 'required',
				  		"c_password" => 'required|same:password',

    				));

    		if($validator->fails()){
    			return redirect()->back()->withErrors($validator)->withInput();
    		}
    		else{
    			
    			$data = array(
	    			"name" => $name,
	    			"email" => $email,
	    			"username" => $username,
	    			"password" => Hash::make($password),
	    			"remember_token" => $remember_token,
    			);

    			try{
					$check = User::create($data);	
				}catch(Exception $e){
    				print_r($e);
    			}

    			

    			if($check){
    				return redirect('/user-profile')->with("success", "Registeration Success check it now");
    			}else{
    				return redirect('/')->with("error", "Error on registeration");
    			}

    		}

    }

    public function userprofile(){

        return view('user-profile');

    }

    public function login(Request $request){
        $post = $request->all();
        
        $email = $post['email'];
        $password = $post['password'];

        $data = array(
               "email"=>$email, "password" => $password
            );

        $checkValidation = \Validator::make($request->all(),
            [
                'email' => 'required',
                'password' => 'required',
            ]);

        if($checkValidation->fails()){
            return redirect()->back()->withErrors($checkValidation)->withInput();
        }

        if(Auth::attempt($data))
        {
            return redirect()->intended('user-profile');

        }else{
            return redirect()->back()->with("error", "Credential Fail");
        }

    }

    public function logout(){
        Auth::logout();
        return redirect()->intended('/');
    }
}
