<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class AuthManager extends Controller
{
    //
    function login()
    {
        return view('auth.login');
    }
    function loginPost(Request $request)
    {
        $request ->validate([
            'email' => 'required|email',
            'password' => 'required | min:5'
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended(route("home"));
        }
        return redirect(route("login"))->withErrors("Invalid Credentials");

    }

    function register()
    {
        return view('auth.register');
    }

    function registerPost(Request $request)
    {
        $request->validate([
            'name'=> 'required | string | max:255',
            'email'=> 'required | email | max:255 | unique:users',
            'password'=> 'required | min:5 | '
        ]);

        $user= new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
       if( $user->save())
        {
        // return redirect(route("login"))->with("sucess", "Account created successfully. Please login.");
        // return back()->with("sucess", "Account created successfully. Please login.");
       return redirect()->route('login')
            ->with('success', 'Account created successfully. Please login.');
        }
        // return redirect(route(("register"))->with("error","Failed to create account. Please try again."));
        // return back()->with("error","Failed to create account. Please try again.");
       return back()->with('error', 'Failed to create account.');

    }
    function logout()
    {
        Auth::logout();
        return redirect(route("login.post"))->with("success", "Logged out successfully.");
    }
}

