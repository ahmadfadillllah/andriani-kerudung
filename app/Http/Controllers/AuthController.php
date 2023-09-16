<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function login()
    {
        return view('home.login');
    }

    public function login_post(Request $request)
    {
        // dd($request->all());
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            if(Auth::user()->statusenabled == true){
                $request->session()->regenerate();
                return redirect()->route('home.index')->with('success', 'Berhasil login');
            }else{
                return redirect()->route('login')->with('info', 'Akun telah dinonaktifkan');
            }
        }

        return back()->withErrors([
            'username' => 'Username/password salah',
            'password' => 'Password salah',
        ])->onlyInput('username', 'password');
    }

    public function loginadmin()
    {
        return view('auth.login');
    }

    public function loginadmin_post(Request $request)
    {
        // dd($request->all());
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            if(Auth::user()->statusenabled == true){
                $request->session()->regenerate();
                return redirect()->route('dashboard.index');
            }else{
                return redirect()->route('loginadmin')->with('info', 'Akun telah dinonaktifkan');
            }
        }

        return back()->withErrors([
            'username' => 'Username tidak ditemukan',
            'password' => 'Password salah',
        ])->onlyInput('email', 'password');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Anda telah logout');
    }
}
