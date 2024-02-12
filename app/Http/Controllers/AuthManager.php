<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;





 

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

        $data['name'] = $request->input('name');
        $data['email'] = $request->input('email');
        $data['password'] = Hash::make($request->input('password'));

        $user = User::create($data);
        if (!$user) {
            return redirect()->route('register')->with('faild', 'Registration failed');
        } else {
            return redirect()->route('login')->with('success', 'Registration successful');
        }
    }
    

    function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('login');
    }
}