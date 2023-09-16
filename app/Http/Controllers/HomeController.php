<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\JenisProduk;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index()
    {


        $jenis_produk = JenisProduk::where('statusenabled', true)->get();
        $produk = Produk::where('statusenabled', true)->where('stok', '>', 0)->with('jenisproduk')->get();
        if(Auth::user()){
            $cek_cart = Cart::where('users_id', Auth::user()->id)->get()->count();
            $cart = Cart::with('produk')->where('users_id', Auth::user()->id)->get();
            return view('home.index', compact('jenis_produk', 'produk', 'cek_cart', 'cart'));
        }
        return view('home.index', compact('jenis_produk', 'produk'));
    }
}
