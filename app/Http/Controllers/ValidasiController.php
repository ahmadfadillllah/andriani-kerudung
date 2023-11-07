<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ValidasiController extends Controller
{
    //
    public function index()
    {
        if(Auth::user()->role == 'owner'){
            $rekapan = Order::with('produk', 'users')->where('statusenabled', true)->groupBy('order_id')->get();
        }else{
            $rekapan = Order::with('produk', 'users')->where('users_id', Auth::user()->id)->where('statusenabled', true)->groupBy('order_id')->get();
        }
        return view('validasi.index', compact('rekapan'));
    }

    public function detail($order_id)
    {
        $detail = Order::join('users', 'users.id', 'order.users_id')
        ->join('alamat', 'alamat.users_id', 'users.id')
        ->join('produk', 'produk.id', 'order.produk_id')
        ->where('order_id', $order_id)->where('order.statusenabled', true)
        ->where('alamat.statusenabled', true)
        ->where('alamat.utama', true)
        ->select('order.order_id', 'alamat.namaprovinsi', 'alamat.namakota', 'alamat.alamat',
        'order.namakurir', 'order.statuspengiriman', 'order.created_at', 'produk.nama', 'order.jumlah', 'produk.harga', 'order.subtotal', 'order.diskon', 'order.ongkoskirim', 'order.total as totalkeseluruhan')
        ->get();
        return view('validasi.detail', compact('detail'));
    }
}
