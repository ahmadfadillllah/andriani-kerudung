<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    //
    public function index()
    {
        if(Auth::user()->role == 'owner'){
            $keranjang = Cart::with('produk', 'users')->where('statusenabled', true)->get();
        }else{
            $keranjang = Cart::with('produk', 'users')->where('users_id', Auth::user()->id)->where('statusenabled', true)->get();
        }
        return view('keranjang.index', compact('keranjang'));
    }
}
