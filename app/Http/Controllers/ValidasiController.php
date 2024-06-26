<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isEmpty;

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

    public function update($order_id,Request $request)
    {
        try {
            Order::where('order_id', $order_id)->update(['statuspengiriman' => $request->statuspengiriman]);
            return redirect()->back()->with('success', 'Status Pengiriman berhasil diupdate');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', $th->getMessage());
        }
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
        'order.namakurir', 'order.statuspengiriman', 'order.created_at', 'produk.nama', 'produk.warna', 'produk.berat', 'order.jumlah', 'produk.harga', 'order.subtotal', 'order.diskon', 'order.ongkoskirim', 'order.total as totalkeseluruhan')
        ->get();
        if($detail->isEmpty()){
            return redirect()->back()->with('info', 'Maaf, anda tidak mempunyai hak akses');
        }
        return view('validasi.detail', compact('detail'));
    }
}
