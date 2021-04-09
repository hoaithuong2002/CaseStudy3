<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function showLogin()
    {
        if (!Auth::check()){
            return view('login');
        }
        return redirect()->route('admin.dashboard');
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
            return redirect()->route('admin.dashboard');
        }
    }
    function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

}
