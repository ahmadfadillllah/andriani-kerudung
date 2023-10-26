<?php

namespace App\Http\Controllers;

use App\Models\JenisProduk;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BundleController extends Controller
{
    //
    public function index()
    {
        $produk = Produk::where('statusenabled', true)->where('bundle', '!=', null)->get();
        $bundle = Produk::where('statusenabled', true)->where('bundle', null)->get();
        return view('bundle.index', compact('produk', 'bundle'));
    }

    public function insert(Request $request)
    {
        // dd($request->all());
        $date = date('YmdHisgis');
        $harga = Str::replace('Rp', '', $request->harga);
        $harga = Str::replace('.', '', $harga);
        $hargaasli = Str::replace('Rp', '', $request->hargaasli);
        $hargaasli = Str::replace('.', '', $hargaasli);
        try {
            $bundle = new Produk;
            $bundle->users_id = Auth::user()->id;
            $bundle->statusenabled = true;
            $bundle->nama = $request->nama;
            $bundle->stok = $request->stok;
            $bundle->hargaasli = $hargaasli;
            $bundle->harga = $harga;
            $bundle->bundle = $request->bundle;


            if($request->hasFile('gambar1')){
                $request->file('gambar1')->move('image/produk/', $date.$request->file('gambar1')->getClientOriginalName());
                $bundle->gambar1 = $date.$request->file('gambar1')->getClientOriginalName();
            }
            $bundle->save();

            return redirect()->route('bundle.index')->with('success', 'Bundle berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->route('bundle.index')->with('info', $th->getMessage());
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
