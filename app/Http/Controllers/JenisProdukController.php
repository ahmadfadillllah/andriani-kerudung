<?php

namespace App\Http\Controllers;

use App\Models\JenisProduk;
use Illuminate\Http\Request;

class JenisProdukController extends Controller
{
    //
    public function index()
    {
        $jenis_produk = JenisProduk::where('statusenabled', true)->get();
        return view('jenis_produk.index', compact('jenis_produk'));
    }

    public function insert(Request $request)
    {
        try {
            $barang = new JenisProduk;
            $barang->statusenabled = true;
            $barang->nama = $request->nama;
            $barang->save();

            // if($request->hasFile('gambar')){
            //     $request->file('gambar')->move('admin/dompet.dexignlab.com/xhtml/images/barang/', $date.$request->file('gambar')->getClientOriginalName());
            //     $barang->gambar = $date.$request->file('gambar')->getClientOriginalName();
            //     $barang->save();
            // }

            return redirect()->route('jenis_produk.index')->with('success', 'Jenis produk berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->route('jenis_produk.index')->with('info', 'Jenis produk gagal ditambahkan');
        }
    }

    public function update($id,Request $request)
    {
        try {
            JenisProduk::where('id', $id)->update(['nama' => $request->nama]);
            return redirect()->back()->with('success', 'Jenis produk berhasil diupdate');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', $th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            JenisProduk::where('id', $id)->update(['statusenabled' => false]);
            return redirect()->back()->with('success', 'Jenis produk berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', $th->getMessage());
        }

        // try {
        //     JenisProduk::where('id', $id)->delete();

        //     return redirect()->back()->with('success', 'Jenis produk berhasil dihapus');
        // } catch (\Throwable $th) {
        //     return redirect()->back()->with('info', $th->getMessage());
        // }
    }
}
