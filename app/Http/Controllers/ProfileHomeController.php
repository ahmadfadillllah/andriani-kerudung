<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileHomeController extends Controller
{
    //
    public function index()
    {
        $cek_cart = Cart::with('produk')->where('users_id', Auth::user()->id)->get()->count();
        $cart = Cart::with('produk')->where('users_id', Auth::user()->id)->get();

        $alamat = Alamat::where('users_id', Auth::user()->id)->where('statusenabled', true)->get();
        $alamat_utama = $alamat->pluck('utama')->toArray();

        return view('home.profile.index', compact('cek_cart', 'cart', 'alamat', 'alamat_utama'));

    }

    public function personal(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'username' => ['required'],
            'email' => ['required'],
            'no_hp' => ['required'],
            'name' => ['required']
        ]);
        try {
            User::where('id', Auth::user()->id)->update([
                'username' => $request->username,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'name' => $request->name,
            ]);
            return redirect()->back()->with('success', 'Personal berhasil diupdate');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', $th->getMessage());
        }
    }

    public function change_password(Request $request)
    {
        $request->validate([
            'password_lama' => ['required', 'min:8'],
            'password_baru' => ['required', 'min:8'],
        ],
        [
            'password_lama.min' => 'Password lama minimal 8 karakter',
            'password_baru.min' => 'Password baru minimal 8 karakter',
        ]);

        if(!Hash::check($request->password_lama, auth()->user()->password)){
            return back()->with("info", "Password lama salah");
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->password_baru)
        ]);

        return back()->with("success", "Password telah diubah");
    }

    public function alamat( Request $request)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/city?id=$request->kota&province=$request->provinsi",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
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

        if($request->utama == "true"){
            $utama = true;
        }else{
            $utama = false;
        }
        try {
            $alamat = new Alamat;
            $alamat->statusenabled = true;
            $alamat->provinsi = $request->provinsi;
            $alamat->namaprovinsi = $respon['rajaongkir']->results->province;
            $alamat->namakota = $respon['rajaongkir']->results->city_name;
            $alamat->users_id = Auth::user()->id;
            $alamat->kota = $request->kota;
            $alamat->alamat = $request->alamat;
            $alamat->utama = $utama;
            $alamat->save();

            return back()->with("success", "Alamat telah ditambahkan");
        } catch (\Throwable $th){
            return back()->with("info", $th->getMessage());
        }
    }

    public function hapus_alamat($id)
    {
        try {
            Alamat::where('id', $id)->update(['statusenabled' => false]);
            return redirect()->back()->with('success', 'Alamat berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', $th->getMessage());
        }
    }


}
