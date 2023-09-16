<?php

namespace App\Http\Controllers;

use App\Models\JenisProduk;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProdukController extends Controller
{
    //
    public function index()
    {
        $jenis_produk = JenisProduk::where('statusenabled', true)->get();
        $produk = Produk::where('statusenabled', true)->get();
        return view('produk.index', compact('jenis_produk','produk'));
    }

    public function insert(Request $request)
    {
        // dd($request->all());
        $date = date('YmdHisgis');
        $harga = Str::replace('Rp', '', $request->harga);
        $harga = Str::replace('.', '', $harga);
        try {
            $produk = new Produk;
            $produk->jenisproduk_id = $request->jenisproduk_id;
            $produk->users_id = Auth::user()->id;
            $produk->statusenabled = true;
            $produk->nama = $request->nama;
            $produk->stok = $request->stok;
            $produk->harga = $harga;


            if($request->hasFile('gambar1')){
                $request->file('gambar1')->move('image/produk/', $date.$request->file('gambar1')->getClientOriginalName());
                $produk->gambar1 = $date.$request->file('gambar1')->getClientOriginalName();
            }
            if($request->hasFile('gambar2')){
                $request->file('gambar2')->move('image/produk/', $date.$request->file('gambar2')->getClientOriginalName());
                $produk->gambar2 = $date.$request->file('gambar2')->getClientOriginalName();
            }
            if($request->hasFile('gambar3')){
                $request->file('gambar3')->move('image/produk/', $date.$request->file('gambar3')->getClientOriginalName());
                $produk->gambar3 = $date.$request->file('gambar3')->getClientOriginalName();
            }
            if($request->hasFile('gambar4')){
                $request->file('gambar4')->move('image/produk/', $date.$request->file('gambar4')->getClientOriginalName());
                $produk->gambar4 = $date.$request->file('gambar4')->getClientOriginalName();
            }
            $produk->save();

            return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->route('produk.index')->with('info', $th->getMessage());
        }
    }

    public function update($id,Request $request)
    {
        try {
            Produk::where('id', $id)->update([
                'nama' => $request->nama,
                'stok' => $request->stok,
                'harga' => $request->harga,
            ]);
            return redirect()->back()->with('success', 'Jenis produk berhasil diupdate');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', $th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            Produk::where('id', $id)->update(['statusenabled' => false]);
            return redirect()->back()->with('success', 'Produk berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', $th->getMessage());
        }
    }
}