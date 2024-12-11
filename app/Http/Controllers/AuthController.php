<?php

namespace App\Http\Controllers;

use App\Models\Akun; // Pastikan model User terhubung
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    
        $akun = Akun::where('username', $request->username)->first();
    
        if ($akun && Hash::check($request->password, $akun->password)) {
            $request->session()->put('username', $akun->username);
            return redirect()->route('dashboard')->with('success', 'Selamat datang, Anda berhasil login!');
        }
    
        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->onlyInput('username');
    }
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validasi input
    $request->validate([
        'username' => 'required|unique:akuns,username|max:255',
        'password' => 'required|min:8|confirmed',
    ]);

    // Debug data input sebelum disimpan
    dd($request->all()); // Berhenti di sini untuk melihat data input

    // Simpan data akun baru
    $akun = Akun::create([
        'username' => $request->username,
        'password' => Hash::make($request->password),
    ]);
    

    return redirect()->route('login')->with('success', 'Akun berhasil dibuat! Silakan login.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('warning', 'Logout berhasil! Sampai jumpa lagi.');
    }
}
