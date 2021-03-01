<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function showLogin()
    {
        return view('login');
    }

    function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $data = [
            'email' => $email,
            'password' => $password
        ];
        if (!Auth::attempt($data)) {
            return redirect()->route('login')->with('login-error', 'Tài khoản hoặc mật khẩu không đúng!');
        } else {
            return redirect()->route('home');
        }
    }
    function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

}
