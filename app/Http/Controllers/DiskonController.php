<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Diskon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class DiskonController extends Controller
{
    //
    public function index(Request $request)
    {
        $coupon = Diskon::where('kode', $request->kode)->first();
        $cart = Cart::with('produk')->where('users_id', Auth::user()->id)->get();
        $total = Cart::join('produk', 'cart.produk_id','produk.id')
        ->select(DB::raw('produk.harga * cart.jumlah as total_harga'))->get();
        if($coupon != null){
            $diskon = $total->sum('total_harga') * $coupon->diskon;
        }else{
            $diskon = $total->sum('total_harga') * 0;
        }
        $grandtotal = (int)$total->sum('total_harga') - (int)$diskon;

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

        if(Auth::user()->tipe != 'vip'){
            return redirect()->route('home.cart.index')->with('info', 'Maaf akun anda bukan VIP');
        }
        if($coupon == null){
            return redirect()->route('home.cart.index')->with('info', 'Kupon tidak ditemukan');
        }

        return view('home.cart.index', compact('cart', 'coupon', 'token'));
    }

}
