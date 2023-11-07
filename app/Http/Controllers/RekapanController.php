<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RekapanController extends Controller
{
    //
    public function index()
    {
        $rekapan = Order::selectRaw("
            count(id) AS data,
            total,
            DATE_FORMAT(created_at, '%m-%Y') AS bulan,
            YEAR(created_at) AS year,
            MONTH(created_at) AS month
        ")
        ->groupBy('bulan')
        ->get();
        return view('rekapan.index', compact('rekapan'));
    }
}
