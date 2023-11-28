<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BundleController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DependantDropdownController;
use App\Http\Controllers\DiskonController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JenisProdukController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\KonfirmasiController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileHomeController;
use App\Http\Controllers\RekapanController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ValidasiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
Route::post('/contact/post', [HomeController::class, 'contactpost'])->name('home.contact.post');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login/post', [AuthController::class, 'login_post'])->name('login.post');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register/post', [AuthController::class, 'register_post'])->name('register.post');
Route::get('/login/admin', [AuthController::class, 'loginadmin'])->name('loginadmin');
Route::post('/login/admin/post', [AuthController::class, 'loginadmin_post'])->name('loginadmin.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//Get Provinsi
Route::get('provinces', [DependantDropdownController::class, 'provinces'])->name('provinces');
Route::get('cities', [DependantDropdownController::class, 'cities'])->name('cities');

Route::post('/home/cart/add/{id}', [CartController::class, 'add'])->name('home.cart.add');
Route::post('/home/cart/add_luar/{id}', [CartController::class, 'add_luar'])->name('home.cart.add_luar');
Route::get('/home/cart/add_bundle/{id}', [CartController::class, 'add_bundle'])->name('home.cart.add_bundle');
Route::group(['middleware' => ['auth', 'checkRole:owner,karyawan,pembeli']], function(){

    //Home Profile
    Route::get('/home/profile', [ProfileHomeController::class, 'index'])->name('home.profile.index');
    Route::post('/home/profile/personal', [ProfileHomeController::class, 'personal'])->name('home.profile.personal');
    Route::post('/home/profile/alamat', [ProfileHomeController::class, 'alamat'])->name('home.profile.alamat');
    Route::get('/home/profile/alamat/hapus/{id}', [ProfileHomeController::class, 'hapus_alamat'])->name('home.profile.alamat.hapus');
    Route::post('/home/profile/change_password', [ProfileHomeController::class, 'change_password'])->name('home.profile.change_password');
    //Cart
    Route::get('/home/cart', [CartController::class, 'index'])->name('home.cart.index');
    Route::get('/home/cart/{id_cart}', [CartController::class, 'delete'])->name('home.cart.delete');
    Route::post('/home/cart', [CartController::class, 'update_cart'])->name('home.cart.update_cart');
    Route::post('/home/cart/checkout', [CartController::class, 'checkout'])->name('home.cart.checkout');

    //Order
    Route::get('/home/orders/{order_id}', [OrdersController::class, 'index'])->name('home.orders.index');

    //Checkout
    Route::get('/home/checkout', [CheckoutController::class, 'index'])->name('home.checkout.index');
    Route::post('/home/checkout/proses', [CheckoutController::class, 'proses'])->name('home.checkout.proses');

    Route::get('/coupon', [DiskonController::class, 'index'])->name('coupon.index');

    //Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    //Jenis Produk
    Route::get('/jenis_produk', [JenisProdukController::class, 'index'])->name('jenis_produk.index');
    Route::post('/jenis_produk/insert', [JenisProdukController::class, 'insert'])->name('jenis_produk.insert');
    Route::post('/jenis_produk/update/{id}', [JenisProdukController::class, 'update'])->name('jenis_produk.update');
    Route::get('/jenis_produk/destroy/{id}', [JenisProdukController::class, 'destroy'])->name('jenis_produk.destroy');

    //Keranjang
    Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');

    //Tracking Penjualan
    Route::get('/tracking-penjualan', [TrackingController::class, 'index'])->name('tracking.index');

    //Validasi Pembayaran
    Route::get('/validasi-pembayaran', [ValidasiController::class, 'index'])->name('validasi.index');
    Route::get('/validasi-pembayaran/detail/{order_id}', [ValidasiController::class, 'detail'])->name('validasi.detail');

    //Konfirmasi Pesanan
    Route::get('/konfirmasi-pesanan', [KonfirmasiController::class, 'index'])->name('konfirmasi.index');
    Route::get('/konfirmasi-pesanan/diterima/{order_id}', [KonfirmasiController::class, 'diterima'])->name('konfirmasi.diterima');

    //Rekapan
    Route::get('/rekapan', [RekapanController::class, 'index'])->name('rekapan.index');

    //Produk
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
    Route::post('/produk/insert', [ProdukController::class, 'insert'])->name('produk.insert');
    Route::post('/produk/update/{id}', [ProdukController::class, 'update'])->name('produk.update');
    Route::post('/produk/updategambar/{id}', [ProdukController::class, 'updategambar'])->name('produk.updategambar');
    Route::get('/produk/destroy/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');

    //Bundle
    Route::get('/bundle', [BundleController::class, 'index'])->name('bundle.index');
    Route::post('/bundle/insert', [BundleController::class, 'insert'])->name('bundle.insert');
    Route::post('/bundle/update/{id}', [BundleController::class, 'update'])->name('bundle.update');
    Route::post('/bundle/updatebundle/{id}', [BundleController::class, 'updatebundle'])->name('bundle.updatebundle');
    Route::get('/bundle/destroy/{id}', [BundleController::class, 'destroy'])->name('bundle.destroy');

    //Users
    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
    Route::post('/users/insert', [UsersController::class, 'insert'])->name('users.insert');
    Route::post('/users/update/{id}', [UsersController::class, 'update'])->name('users.update');
    Route::get('/users/destroy/{id}', [UsersController::class, 'destroy'])->name('users.destroy');
});
