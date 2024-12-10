<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Jika login berhasil
            return redirect()->intended('/dashboard');
        }

        // Jika login gagal
        return redirect()->back()->with('error', 'Username atau password salah.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}

