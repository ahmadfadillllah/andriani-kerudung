<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class CheckoutController extends Controller
{
    //
    public function index(Request $request)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $order_id = substr(str_shuffle(str_repeat($pool, 5)), 0, 16);

        $alamat = Alamat::where('statusenabled', true)->where('utama', true)->first();
        $cart = Cart::with('produk')->where('users_id', Auth::user()->id)->where('statusenabled', true)->get();

        $grandtotal = request()->subtotal - request()->diskon + request()->ongkoskirim;

        \Midtrans\Config::$serverKey = env('serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = true;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $order_id,
                'gross_amount' => $grandtotal,
            ),
            'customer_details' => array(
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'phone' => Auth::user()->nohp,
            ),
        );

        $token = \Midtrans\Snap::getSnapToken($params);
        return view('home.checkout.index', compact('alamat', 'cart', 'token', 'order_id', 'request'));
    }

    public function proses(Request $request)
    {
        $grandtotal = $request->subtotal - $request->diskon + $request->ongkoskirim;
        try {
            foreach($request->idcart as $key=>$value){
                $cart = new Order;
                $cart->order_id = $request->order_id;
                $cart->users_id = Auth::user()->id;
                $cart->produk_id = $value['produk_id'];
                $cart->jumlah = $value['jumlah'];
                $cart->statusenabled = true;
                $cart->cara_bayar = $request->cara_bayar;
                $cart->catatan = $request->catatan;
                $cart->subtotal = $request->subtotal;
                $cart->diskon = $request->diskon;
                $cart->ongkoskirim = $request->ongkoskirim;
                $cart->namakurir = $request->namakurir;
                $cart->total = $grandtotal;
                $cart->save();
            }

            foreach($request->idcart as $key=>$value){
                $cart = Cart::find($value['id']);
                $cart->statuscheckout = $request->status;
                $cart->save();
            }

            return redirect()->back()->with('success', 'Order berhasil');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', $th->getMessage());
        }


    }
}
