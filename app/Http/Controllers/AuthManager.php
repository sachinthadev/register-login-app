<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\User;



 

class AuthManager extends Controller
{
    function login(){
        return view('login');
    }

    function  register(){

        return view('registration');
    }

    function loginpost(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password'=>'required|min:5|max:12'
        ]);

        $credential=$request->only('email'  , 'password');
        if(Auth::attempt($credential)){

            return redirect()->intended(route("homepage" ));
        }
        else {
            return  back()->with('fail','Incorrect  email or  password');
        }
    }



    public function registerpost(Request $request)
    {
        $request->validate([
            "name" => "required",
            'email' => 'required|email',
            'password' => 'required|min:5|max:12'
        ]);

        $user = new User();

        $user->name =$request->name;
        $user->email =$request->email;
        $user->password = Hash::make($request->password);
        

        $user->save();
        return redirect('/login')->with('success', 'User registered successfully. Login now!');

    }
    

    function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('login');
    }
}