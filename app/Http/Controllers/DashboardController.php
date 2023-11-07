<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $now = Carbon::now()->format('d');
        $bulan = Carbon::now()->format('m');

        $keranjang = DB::table('cart')->whereMonth('created_at',$now)->count();
        $order = DB::table('order')->whereMonth('created_at',$now)->count();
        $pengguna = DB::table('cart')->whereMonth('created_at',$bulan)->count();

        return view('dashboard.index', compact('keranjang', 'order', 'pengguna'));
    }
}
