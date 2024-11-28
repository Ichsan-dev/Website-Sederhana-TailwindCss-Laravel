<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function index()
    {
        //view halaman login
        return view("Halaman-Login/index");
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.required'=>'Email Wajib Diisi',
            'password.required'=>'Password Wajib Diisi'
        ]);

        $infologin = [
            'email'=>$request->email,
            'password'=>$request->password,
        ];

       if (Auth::attempt($infologin)) {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('login')->withErrors('Username atau Password Salah')->withInput();
            }

    }
    
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
