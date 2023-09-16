<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileHomeController extends Controller
{
    //
    public function index()
    {
        if(Auth::user()){
            $cek_cart = Cart::with('produk')->where('users_id', Auth::user()->id)->get()->count();
            $cart = Cart::with('produk')->where('users_id', Auth::user()->id)->get();
            return view('home.profile.index', compact('cek_cart', 'cart'));
        }
        return view('home.profile.index');
    }

    public function personal(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'username' => ['required'],
            'email' => ['required'],
            'no_hp' => ['required'],
            'name' => ['required']
        ]);
        try {
            User::where('id', Auth::user()->id)->update([
                'username' => $request->username,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'name' => $request->name,
            ]);
            return redirect()->back()->with('success', 'Personal berhasil diupdate');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', $th->getMessage());
        }
    }

    public function change_password(Request $request)
    {
        $request->validate([
            'password_lama' => ['required', 'min:8'],
            'password_baru' => ['required', 'min:8'],
        ],
        [
            'password_lama.min' => 'Password lama minimal 8 karakter',
            'password_baru.min' => 'Password baru minimal 8 karakter',
        ]);

        if(!Hash::check($request->password_lama, auth()->user()->password)){
            return back()->with("info", "Password lama salah");
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->password_baru)
        ]);

        return back()->with("success", "Password telah diubah");
    }


}
