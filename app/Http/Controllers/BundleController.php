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
        $harga = Str::replace(',', '', $harga);
        $hargaasli = Str::replace('Rp', '', $request->hargaasli);
        $hargaasli = Str::replace('.', '', $hargaasli);
        $hargaasli = Str::replace(',', '', $hargaasli);
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
        $harga = Str::replace('Rp', '', $request->harga);
        $harga = Str::replace('.', '', $harga);
        $harga = Str::replace(',', '', $harga);
        $hargaasli = Str::replace('Rp', '', $request->hargaasli);
        $hargaasli = Str::replace('.', '', $hargaasli);
        $hargaasli = Str::replace(',', '', $hargaasli);
        try {
            Produk::where('id', $id)->update([
                'nama' => $request->nama,
                // 'bundle' => $request->bundle,
                'stok' => $request->stok,
                'harga' => $harga,
                'hargaasli' => $hargaasli,
            ]);
            return redirect()->back()->with('success', 'Bundle berhasil diupdate');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', $th->getMessage());
        }
    }

    public function updatebundle($id,Request $request)
    {
        $date = date('YmdHisgis');
        try {

            $produk = Produk::find($id);

            if($request->hasFile('gambar1')){
                $request->file('gambar1')->move('image/produk/', $date.$request->file('gambar1')->getClientOriginalName());
                $produk->gambar1 = $date.$request->file('gambar1')->getClientOriginalName();
                $produk->save();
            }

            if($request->hasFile('gambar2')){
                $request->file('gambar2')->move('image/produk/', $date.$request->file('gambar2')->getClientOriginalName());
                $produk->gambar2 = $date.$request->file('gambar2')->getClientOriginalName();
                $produk->save();
            }

            if($request->hasFile('gambar3')){
                $request->file('gambar3')->move('image/produk/', $date.$request->file('gambar3')->getClientOriginalName());
                $produk->gambar3 = $date.$request->file('gambar3')->getClientOriginalName();
                $produk->save();
            }

            if($request->hasFile('gambar4')){
                $request->file('gambar4')->move('image/produk/', $date.$request->file('gambar4')->getClientOriginalName());
                $produk->gambar4 = $date.$request->file('gambar4')->getClientOriginalName();
                $produk->save();
            }

            return redirect()->back()->with('success', 'Gambar bundle berhasil diupdate');
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
