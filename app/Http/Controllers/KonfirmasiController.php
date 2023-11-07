<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KonfirmasiController extends Controller
{
    //
    public function index()
    {
        if(Auth::user()->role == 'owner'){
            $rekapan = Order::with('produk', 'users')->where('statusenabled', true)->groupBy('order_id')->get();
        }else{
            $rekapan = Order::with('produk', 'users')->where('users_id', Auth::user()->id)->where('statusenabled', true)->groupBy('order_id')->get();
        }
        return view('konfirmasi-pesanan.index', compact('rekapan'));
    }
    public function diterima($order_id)
    {
        try {
            Order::where('order_id', $order_id)->update(['statuspengiriman' => 'Pesanan Diterima']);

            return redirect()->back()->with('success', 'Pesanan berhasil diperbarui');

        } catch (\Throwable $th) {
            return redirect()->back()->with('info', $th->getMessage());
        }
    }
}
