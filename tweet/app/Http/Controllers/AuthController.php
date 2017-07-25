<?php

namespace Tweet\Http\Controllers;

use Tweet\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function getSignUp()
    {
        return view('auth.signup');
    }

    public function postSignUp(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|unique:users|email|max:255',
            'username' => 'required|unique:users|alpha_dash|max:20',
            'password' => 'required|min:6'
        ]);

        User::create([
           'email' => $request->input('email'),
           'username' => $request->input('username'),
           'password' => bcrypt($request->input('password')),
        ]);

        return redirect()->route('welcome')->with('info', 'Account created succesfully');

    }
}