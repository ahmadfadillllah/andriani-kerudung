<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Produk;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrackingController extends Controller
{
    //
    public function index()
    {
        $jan = DB::table('cart')->whereMonth('created_at',1)->where('statuscheckout', null)->get()->count();
        $janc = DB::table('cart')->whereMonth('created_at',1)->where('statuscheckout', 'checkout')->get()->count();

        $feb = DB::table('cart')->whereMonth('created_at',2)->where('statuscheckout', null)->get()->count();
        $febc = DB::table('cart')->whereMonth('created_at',2)->where('statuscheckout', 'checkout')->get()->count();

        $mar = DB::table('cart')->whereMonth('created_at',3)->where('statuscheckout', null)->get()->count();
        $marc = DB::table('cart')->whereMonth('created_at',3)->where('statuscheckout', 'checkout')->get()->count();

        $apr = DB::table('cart')->whereMonth('created_at',4)->where('statuscheckout', null)->get()->count();
        $aprc = DB::table('cart')->whereMonth('created_at',4)->where('statuscheckout', 'checkout')->get()->count();

        $mei = DB::table('cart')->whereMonth('created_at',5)->where('statuscheckout', null)->get()->count();
        $meic = DB::table('cart')->whereMonth('created_at',5)->where('statuscheckout', 'checkout')->get()->count();

        $jun = DB::table('cart')->whereMonth('created_at',6)->where('statuscheckout', null)->get()->count();
        $junc = DB::table('cart')->whereMonth('created_at',6)->where('statuscheckout', 'checkout')->get()->count();

        $jul = DB::table('cart')->whereMonth('created_at',7)->where('statuscheckout', null)->get()->count();
        $julc = DB::table('cart')->whereMonth('created_at',7)->where('statuscheckout', 'checkout')->get()->count();

        $agu = DB::table('cart')->whereMonth('created_at',8)->where('statuscheckout', null)->get()->count();
        $aguc = DB::table('cart')->whereMonth('created_at',8)->where('statuscheckout', 'checkout')->get()->count();

        $sep = DB::table('cart')->whereMonth('created_at',9)->where('statuscheckout', null)->get()->count();
        $sepc = DB::table('cart')->whereMonth('created_at',9)->where('statuscheckout', 'checkout')->get()->count();

        $okt = DB::table('cart')->whereMonth('created_at',10)->where('statuscheckout', null)->get()->count();
        $oktc = DB::table('cart')->whereMonth('created_at',10)->where('statuscheckout', 'checkout')->get()->count();

        $nov = DB::table('cart')->whereMonth('created_at',11)->where('statuscheckout', null)->get()->count();
        $novc = DB::table('cart')->whereMonth('created_at',11)->where('statuscheckout', 'checkout')->get()->count();

        $des = DB::table('cart')->whereMonth('created_at',12)->where('statuscheckout', null)->get()->count();
        $desc = DB::table('cart')->whereMonth('created_at',12)->where('statuscheckout', 'checkout')->get()->count();

        $now = Carbon::now()->format('Y');
        $sudahco = DB::table('cart')->whereYear('created_at',$now)->where('statuscheckout', 'checkout')->get()->count();
        $belumco = DB::table('cart')->whereYear('created_at',$now)->where('statuscheckout', null)->get()->count();

        $sudahcheckout = [
            $janc, $febc, $marc, $aprc, $meic, $junc, $julc, $aguc, $sepc, $oktc, $novc, $desc
        ];

        $belumcheckout = [
            $jan, $feb, $mar, $apr, $mei, $jun, $jul, $agu, $sep, $okt, $nov, $des
        ];

        $tracking = DB::table('produk as pr')
        ->join('order as or', 'or.produk_id', '=', 'pr.id')
        ->select('pr.nama', 'pr.stok', DB::raw('SUM(or.jumlah) as total_terjual', 'sisa'))
        ->groupBy('pr.nama')
        ->get();
        foreach ($tracking as $produk) {
            $produk->sisa = $produk->stok - $produk->total_terjual;
        }

        return view('tracking.index', compact('sudahcheckout', 'belumcheckout', 'sudahco', 'belumco', 'tracking'));
    }

    public function download(Request $request)
    {
        $tracking = DB::table('produk as pr')
        ->join('order as or', 'or.produk_id', '=', 'pr.id')
        ->select('pr.nama', 'pr.stok', DB::raw('SUM(or.jumlah) as total_terjual', 'sisa'))
        ->groupBy('pr.nama')
        ->whereBetween('or.created_at', [$request->start_date, $request->end_date])
        ->get();
        foreach ($tracking as $produk) {
            $produk->sisa = $produk->stok - $produk->total_terjual;
        }

        if($tracking->isEmpty()){
            return redirect()->back()->with('info', 'Data tidak ada');
        }

        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $pdf = \PDF::loadView('tracking.file', compact('tracking', 'start_date', 'end_date'));
	    return $pdf->stream();
    }
}
