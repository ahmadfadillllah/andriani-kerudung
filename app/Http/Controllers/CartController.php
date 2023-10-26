<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Diskon;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    //
    public function index(Request $request)
    {
        // dd($request->kode);
        if($request->kode != null){
            $coupon = Diskon::where('kode', $request->kode)->first();
            if($coupon == null){
                return redirect()->back()->with('info', 'Coupon tidak ditemukan');
            }else{
                $total = Cart::join('produk', 'cart.produk_id','produk.id')
                ->select(DB::raw('produk.harga * cart.jumlah as total_harga'))->get();
                $diskon = $total->sum('total_harga') * $coupon->diskon;
                $grandtotal = (int)$total->sum('total_harga') - (int)$diskon;
            }
        }else{
            $coupon = Diskon::where('kode', $request->kode)->first();
            $total = Cart::join('produk', 'cart.produk_id','produk.id')
                ->select(DB::raw('produk.harga * cart.jumlah as total_harga'))->get();
                $diskon = $total->sum('total_harga') * 0;
                $grandtotal = (int)$total->sum('total_harga') - (int)$diskon;
        }

        $cart = Cart::with('produk')->where('users_id', Auth::user()->id)->get();
        $cek_cart = Cart::with('produk')->where('users_id', Auth::user()->id)->get()->count();
        foreach ($cart as $key => $value) {
            $arr_cart[] = $value->produk_id;
        }
        $bundle = Produk::where('statusenabled', true)->wherein('bundle', $arr_cart)->get();

        if(empty($cart)){
            return redirect()->route('home.index')->with('info', 'Keranjang kosong!!');
        }

        \Midtrans\Config::$serverKey = env('serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = true;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $grandtotal,
            ),
            'customer_details' => array(
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'phone' => Auth::user()->nohp,
            ),
        );

        $token = \Midtrans\Snap::getSnapToken($params);
        return view('home.cart.index', compact('cek_cart', 'cart', 'coupon', 'token', 'bundle'));
    }

    public function add($id, Request $request)
    {
        if(!Auth::user()){
            return redirect()->back()->with('info', 'Silahkan login terlebih dahulu');
        }
        $cek_cart = Cart::where('users_id', Auth::user()->id)->where('produk_id', $id)->get()->count();
        if($cek_cart > 0){
            return redirect()->route('home.index')->with('info', 'Mohon periksa keranjang anda, barang sudah ada sebelumnya');
        }
        try {
            $barang = new Cart;
            $barang->users_id = Auth::user()->id;
            $barang->produk_id = $id;
            $barang->statusenabled = true;
            $barang->jumlah = $request->jumlah;
            $barang->save();

            return redirect()->route('home.cart.index')->with('success', 'Berhasil masuk dikeranjang');
        } catch (\Throwable $th) {
            return redirect()->route('home.index')->with('info', 'Gagal masuk dikeranjang');
        }
    }

    public function add_bundle($id, Request $request)
    {
        if(!Auth::user()){
            return redirect()->back()->with('info', 'Silahkan login terlebih dahulu');
        }
        $cek_cart = Cart::where('users_id', Auth::user()->id)->where('produk_id', $id)->get()->count();
        if($cek_cart > 0){
            return redirect()->route('home.cart.index')->with('info', 'Mohon periksa keranjang anda, barang sudah ada sebelumnya');
        }
        try {
            $barang = new Cart;
            $barang->users_id = Auth::user()->id;
            $barang->produk_id = $id;
            $barang->statusenabled = true;
            $barang->jumlah = 1;
            $barang->save();

            return redirect()->route('home.cart.index')->with('success', 'Bundle Berhasil masuk dikeranjang');
        } catch (\Throwable $th) {
            return redirect()->route('home.index')->with('info', 'Gagal masuk dikeranjang');
        }
    }

    public function add_luar($id, Request $request)
    {
        if(!Auth::user()){
            return redirect()->back()->with('info', 'Silahkan login terlebih dahulu');
        }
        $cek_cart = Cart::where('users_id', Auth::user()->id)->where('produk_id', $id)->get()->count();
        if($cek_cart > 0){
            return redirect()->route('home.index')->with('info', 'Mohon periksa keranjang anda, barang sudah ada sebelumnya');
        }
        try {
            $barang = new Cart;
            $barang->users_id = Auth::user()->id;
            $barang->produk_id = $id;
            $barang->statusenabled = true;
            $barang->jumlah = 1;
            $barang->save();

            return redirect()->route('home.cart.index')->with('success', 'Berhasil masuk dikeranjang');
        } catch (\Throwable $th) {
            return redirect()->route('home.index')->with('info', 'Gagal masuk dikeranjang');
        }
    }

    public function delete($id_cart)
    {
        try {
            Cart::where('id', $id_cart)->delete();

            return redirect()->back()->with('success', 'Item berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', $th->getMessage());
        }
    }

    public function update_cart(Request $request)
    {
        // dd($request->all());
        try {
            foreach($request->id as $key=>$value){
                $cart = Cart::find($request->id[$key]);
                $cart->jumlah = $request->jumlah[$key];
                $cart->save();
            }

            return redirect()->back()->with('success', 'Keranjang berhasil diupdate');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', $th->getMessage());
        }

    }


}
