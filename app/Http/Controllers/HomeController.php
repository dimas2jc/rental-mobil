<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function authenticate()
    {
        return view('login');
    }

    public function postlogin(Request $request)
    {
        if(Auth::attempt($request->only('username','password'))){
            if(Auth::user()->role == 1){
                return redirect()->route('pegawai');
            }
            elseif(Auth::user()->role == 2){
                return redirect()->route('pegawai');
            }
        }
        session()->flash('error', 'Invalid Username or Password');

        return redirect('/login');
    }

    public function logout()
    {
        Auth::logout();

        return redirect ('/');
    }

    public function username()
    {
        return 'username';
    }
}
