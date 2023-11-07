<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\JenisProduk;
use App\Models\Kontak;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index(Request $request)
    {
        $jenis_produk = JenisProduk::where('statusenabled', true)->get();
        if(isset($request->produk)){
            $produk = Produk::where('statusenabled', true)->where('bundle', null)
            ->where('stok', '>', 0)->with('jenisproduk')
            ->orWhere('nama', 'like', '%' . $request->produk . '%')
            ->get();
        }else{
            $produk = Produk::where('statusenabled', true)->where('bundle', null)->where('stok', '>', 0)->with('jenisproduk')->get();
        }

        if(Auth::user()){
            $cek_cart = Cart::where('users_id', Auth::user()->id)->get()->where('statusenabled', true)->where('statuscheckout', null)->count();
            $cart = Cart::with('produk')->where('users_id', Auth::user()->id)->where('statusenabled', true)->where('statuscheckout', null)->get();
            return view('home.index', compact('jenis_produk', 'produk', 'cek_cart', 'cart'));
        }

        return view('home.index', compact('jenis_produk', 'produk'));

    }

    public function contact(Request $request)
    {
        $jenis_produk = JenisProduk::where('statusenabled', true)->get();
        if(isset($request->produk)){
            $produk = Produk::where('statusenabled', true)->where('bundle', null)
            ->where('stok', '>', 0)->with('jenisproduk')
            ->orWhere('nama', 'like', '%' . $request->produk . '%')
            ->get();
        }else{
            $produk = Produk::where('statusenabled', true)->where('bundle', null)->where('stok', '>', 0)->with('jenisproduk')->get();
        }

        if(Auth::user()){
            $cek_cart = Cart::where('users_id', Auth::user()->id)->get()->where('statusenabled', true)->where('statuscheckout', null)->count();
            $cart = Cart::with('produk')->where('users_id', Auth::user()->id)->where('statusenabled', true)->where('statuscheckout', null)->get();
            return view('home.contact', compact('jenis_produk', 'produk', 'cek_cart', 'cart'));
        }

        return view('home.contact', compact('jenis_produk', 'produk'));
    }

    public function contactpost(Request $request)
    {
        try {
            $contact = new Kontak;
            $contact->statusenabled = true;
            $contact->nama = $request->nama;
            $contact->email = $request->email;
            $contact->subject = $request->subject;
            $contact->message = $request->message;
            $contact->save();

            return redirect()->route('home.contact')->with('success', 'Pesan berhasil dikirim');
        } catch (\Throwable $th) {
            return redirect()->route('home.contact')->with('info', 'Pesan gagal dikirim');
        }
    }
}
