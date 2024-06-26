<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\JenisProduk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function login()
    {
        if(Auth::user()){
            $cart = Cart::with('produk')->where('users_id', Auth::user()->id)->where('statusenabled', true)->where('statuscheckout', null)->get();
            $jenis_produk = JenisProduk::where('statusenabled', true)->get();
            return view('home.login', compact('jenis_produk', 'cart'));
        }else{
            $jenis_produk = JenisProduk::where('statusenabled', true)->get();
            return view('home.login', compact('jenis_produk'));
        }
    }

    public function register()
    {
        $jenis_produk = JenisProduk::where('statusenabled', true)->get();
        return view('home.register', compact('jenis_produk'));
    }

    public function register_post(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'username' => ['required', 'unique:users,username'],
            'email' => ['required', 'unique:users,email'],
            'no_hp' => ['required'],
            'password' => ['required', 'confirmed'],
        ]);

        try {
            $user = new User;
            $user->statusenabled = true;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->username = $request->username;
            $user->no_hp = $request->no_hp;
            $user->role = 'pembeli';
            $user->avatar = 'user.png';
            $user->tipe = 'biasa';
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->route('login')->with('success', 'User berhasil registrasi');
        } catch (\Throwable $th) {
            return redirect()->route('login')->with('info', $th->getMessage());
        }
    }

    public function login_post(Request $request)
    {
        // dd($request->all());
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            if(Auth::user()->role == 'owner'){
                $request->session()->regenerate();
                return redirect()->route('dashboard.index')->with('success', 'Berhasil login');
            }else if(Auth::user()->statusenabled == true){
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
