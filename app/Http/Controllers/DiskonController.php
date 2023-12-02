<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Diskon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class DiskonController extends Controller
{
    //
    public function index(Request $request)
    {
        $kupon = Diskon::all();
        return view('kupon.index', compact('kupon'));
    }

    public function insert(Request $request)
    {
        try {
            $barang = new Diskon;
            $barang->kode = Str::upper($request->kode);
            $barang->diskon = $request->diskon;
            $barang->save();

            return redirect()->route('kupon.index')->with('success', 'Kupon berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->route('kupon.index')->with('info', 'Kupon gagal ditambahkan');
        }
    }

    public function update($id,Request $request)
    {
        try {
            Diskon::where('id', $id)->update(
                [
                    'kode' => $request->kode,
                    'diskon' => $request->diskon
                    ]
            );
            return redirect()->back()->with('success', 'Kupon berhasil diupdate');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', $th->getMessage());
        }
    }

    public function destroy($id)
    {

        try {
            Diskon::where('id', $id)->delete();

            return redirect()->back()->with('success', 'Kupon berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', $th->getMessage());
        }
    }

}
