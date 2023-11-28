<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    //
    public function index($order_id)
    {
        $cek_cart = Cart::with('produk')->where('users_id', Auth::user()->id)->get()->count();
        $cart = Cart::with('produk')->where('users_id', Auth::user()->id)->get();

        $order = Order::with('produk')->where('users_id', Auth::user()->id)->get();

        return view('home.order.index', compact('cek_cart', 'cart','order'));
    }
}
