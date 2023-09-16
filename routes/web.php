<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DependantDropdownController;
use App\Http\Controllers\DiskonController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JenisProdukController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileHomeController;
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
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login/post', [AuthController::class, 'login_post'])->name('login.post');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login/admin', [AuthController::class, 'loginadmin'])->name('loginadmin');
Route::post('/login/admin/post', [AuthController::class, 'loginadmin_post'])->name('loginadmin.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//Get Provinsi
Route::get('provinces', [DependantDropdownController::class, 'provinces'])->name('provinces');
Route::get('cities', [DependantDropdownController::class, 'cities'])->name('cities');
Route::get('districts', [DependantDropdownController::class, 'districts'])->name('districts');
Route::get('villages', [DependantDropdownController::class, 'villages'])->name('villages');

Route::post('/home/cart/add/{id}', [CartController::class, 'add'])->name('home.cart.add');
Route::post('/home/cart/add_luar/{id}', [CartController::class, 'add_luar'])->name('home.cart.add_luar');
Route::group(['middleware' => ['auth', 'checkRole:owner,karyawan']], function(){

    //Home Profile
    Route::get('/home/profile', [ProfileHomeController::class, 'index'])->name('home.profile.index');
    Route::post('/home/profile/personal', [ProfileHomeController::class, 'personal'])->name('home.profile.personal');
    Route::post('/home/profile/alamat', [ProfileHomeController::class, 'alamat'])->name('home.profile.alamat');
    Route::post('/home/profile/change_password', [ProfileHomeController::class, 'change_password'])->name('home.profile.change_password');
    //Cart
    Route::get('/home/cart', [CartController::class, 'index'])->name('home.cart.index');
    Route::get('/home/cart/{id_cart}', [CartController::class, 'delete'])->name('home.cart.delete');
    Route::post('/home/cart', [CartController::class, 'update_cart'])->name('home.cart.update_cart');
    Route::post('/home/cart/checkout', [CartController::class, 'checkout'])->name('home.cart.checkout');

    Route::get('/coupon', [DiskonController::class, 'index'])->name('coupon.index');

    //Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    //Jenis Produk
    Route::get('/jenis_produk', [JenisProdukController::class, 'index'])->name('jenis_produk.index');
    Route::post('/jenis_produk/insert', [JenisProdukController::class, 'insert'])->name('jenis_produk.insert');
    Route::post('/jenis_produk/update/{id}', [JenisProdukController::class, 'update'])->name('jenis_produk.update');
    Route::get('/jenis_produk/destroy/{id}', [JenisProdukController::class, 'destroy'])->name('jenis_produk.destroy');

    //Produk
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
    Route::post('/produk/insert', [ProdukController::class, 'insert'])->name('produk.insert');
    Route::post('/produk/update/{id}', [ProdukController::class, 'update'])->name('produk.update');
    Route::get('/produk/destroy/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
});

Route::get('/', [HomeController::class, 'index'])->name('home.index');
