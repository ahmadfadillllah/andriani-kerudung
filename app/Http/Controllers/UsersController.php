<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function index(Request $request)
    {
        if(!empty($request->all())){
            $users = User::where('name', 'like', "%$request->search%")->get();
        }else{
            $users = User::all();
        }

        return view('users.index', compact('users'));
    }

    public function destroy($id)
    {
        try {
            User::where('id', $id)->update(['statusenabled' => false]);
            return redirect()->back()->with('success', 'User berhasil dihapus');
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

    public function update($id,Request $request)
    {
        if($request->tipe == "null"){
            $tipeakun = "biasa";
        }else{
            $tipeakun = $request->tipe;
        }
        if($request->statusenabled == "1"){
            $statusakun = true;
        }else if($request->statusenabled == "true"){
            $statusakun = true;
        }else if($request->statusenabled == "false"){
            $statusakun = false;
        }else{
            $statusakun = $request->statusenabled;
        }
        $request->validate([
            // 'email' => 'required|unique:users|max:255',
            'name' => 'required',
            // 'username' => 'required|unique:users|max:255',
            'no_hp' => 'required',
            'role' => 'required',
        ]);

        try {
            User::where('id', $id)->update([
                'name' => $request->name,
                // 'email' => $request->email,
                // 'username' => $request->username,
                'no_hp' => $request->no_hp,
                'role' => $request->role,
                'statusenabled' => $statusakun,
                'tipe' => $tipeakun,
            ]);
            return redirect()->back()->with('success', 'User berhasil diupdate');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', $th->getMessage());
        }
    }

    public function change_password($id,Request $request)
    {
        try {
            User::where('id', $id)->update([
                'password' => Hash::make($request->password),
            ]);
            return redirect()->back()->with('success', 'Password berhasil diupdate');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', $th->getMessage());
        }
    }

    public function insert(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:users|max:255',
            'name' => 'required',
            'username' => 'required|unique:users|max:255',
            'no_hp' => 'required',
            'password' => 'required|confirmed|min:6',
            'role' => 'required',
        ]);

        if($request->tipe == "null"){
            $tipeakun = "biasa";
        }else{
            $tipeakun = $request->tipe;
        }
        if($request->statusenabled == "1"){
            $statusakun = true;
        }else if($request->statusenabled == "true"){
            $statusakun = true;
        }else if($request->statusenabled == "false"){
            $statusakun = false;
        }else{
            $statusakun = $request->statusenabled;
        }

        try {
            $barang = new User;
            $barang->statusenabled = $statusakun;
            $barang->name = $request->name;
            $barang->email = $request->email;
            $barang->username = $request->username;
            $barang->password = Hash::make($request->password);
            $barang->no_hp = $request->no_hp;
            $barang->role = $request->role;
            $barang->tipe = $tipeakun;
            $barang->avatar = 'user.png';
            $barang->save();

            return redirect()->back()->with('success', 'Users berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', $th->getMessage());
        }
    }
}
