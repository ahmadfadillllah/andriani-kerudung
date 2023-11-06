<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
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
        if($request->kode != null){
            $coupon = Diskon::where('kode', $request->kode)->first();
            if($coupon == null){
                return redirect()->back()->with('info', 'Coupon tidak ditemukan');
            }else{
                $total = DB::table('cart')->join('produk', 'cart.produk_id','produk.id')
                ->select(DB::raw('produk.harga * cart.jumlah as total_harga'))
                ->where('cart.statusenabled', true)->where('cart.statuscheckout', null)->get();
                $diskon = $total->sum('total_harga') * $coupon->diskon;
                $grandtotal = (int)$total->sum('total_harga') - (int)$diskon;
            }
        }else{
            $coupon = Diskon::where('kode', $request->kode)->first();
            $total = DB::table('cart')->join('produk', 'cart.produk_id','produk.id')
                ->select(DB::raw('produk.harga * cart.jumlah as total_harga'))
                ->where('cart.statusenabled', true)->where('cart.statuscheckout', null)->get();
                $diskon = $total->sum('total_harga') * 0;
                $grandtotal = (int)$total->sum('total_harga') - (int)$diskon;
        }

        $cart = Cart::with('produk')->where('users_id', Auth::user()->id)->where('statusenabled', true)->where('statuscheckout', null)->get();
        if($cart->isEmpty()){
            return redirect()->route('home.index')->with('info', 'Keranjang kosong!!');
        }
        $cek_cart = Cart::with('produk')->where('users_id', Auth::user()->id)->where('statusenabled', true)->where('statuscheckout', null)->get()->count();
        foreach ($cart as $key => $value) {
            $arr_cart[] = $value->produk_id;
        }
        $bundle = Produk::where('statusenabled', true)->wherein('bundle', $arr_cart)->get();

        $alamat = Alamat::where('users_id', Auth::user()->id)->where('statusenabled', true)->where('utama', true)->first();
        if($alamat == null){
            $alamatutama = 1;
        }else{
            $alamatutama = $alamat->kota;
        }



        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "origin=254&destination=$alamatutama&weight=1700&courier=jne",
        CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: ab64c4ae2a078453de30c534ebc56fe2"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
            $respon = collect(json_decode($response));
        }
        $kurir = $respon['rajaongkir']->results[0]->costs;
        return view('home.cart.index', compact('cek_cart', 'cart', 'coupon', 'bundle', 'alamat', 'kurir'));
    }

    public function add($id, Request $request)
    {
        if(!Auth::user()){
            return redirect()->back()->with('info', 'Silahkan login terlebih dahulu');
        }
        $cek_cart = Cart::where('users_id', Auth::user()->id)->where('produk_id', $id)->where('statusenabled', true)->where('statuscheckout', null)->get()->count();
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
        $cek_cart = Cart::where('users_id', Auth::user()->id)->where('produk_id', $id)->where('statusenabled', true)->where('statuscheckout', null)->get()->count();
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
        $cek_cart = Cart::where('users_id', Auth::user()->id)->where('produk_id', $id)->where('statusenabled', true)->where('statuscheckout', null)->get()->count();
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
