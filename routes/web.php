<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\IndexController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\IndexController::class, 'index']);
Auth::routes();
// home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'panel'])->name('home');
Route::get('/v_home', [App\Http\Controllers\HomeController::class, 'panel'])->name('home');

// laporan keluar
Route::get('/laporankeluar', [LaporanController::class, 'index'])->name('laporan');
Route::get('/laporankeluar/add', [LaporanController::class, 'add'])->name('laporanadd');
Route::get('/laporankeluar/proses/{id_produk}', [LaporanController::class, 'proses']);
Route::post('/laporankeluar/insert', [LaporanController::class, 'insert']);
// laporan keluar harga supplier berbeda
Route::get('/laporankeluar/prosesv/{id_produk}', [LaporanController::class, 'prosesv']);
Route::post('/laporankeluar/insertv', [LaporanController::class, 'insertv']);

// laporan masuk
Route::get('/laporanmasuk', [LaporanController::class, 'index2'])->name('laporanmasuk');


// hak akses admin
Route::group(['middleware' => 'admin'], function () {
    // user
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/user/edit/{id}', [UserController::class, 'edit']);
    Route::post('/user/update/{id}', [UserController::class, 'update']);
    // produk
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
    Route::get('/produk/add', [ProdukController::class, 'add']);
    Route::post('/produk/insert', [ProdukController::class, 'insert']);
    Route::get('/produk/edit/{id_produk}', [ProdukController::class, 'edit']);
    Route::post('/produk/update/{id_produk}', [ProdukController::class, 'update']);
    Route::get('/produk/delete/{id_produk}', [ProdukController::class, 'delete']);
    // sales
    Route::get('/sales', [SalesController::class, 'index'])->name('sales');
    Route::get('/sales/add', [SalesController::class, 'add']);
    Route::post('/sales/insert', [SalesController::class, 'insert']);
    Route::get('/sales/edit/{id_sales}', [SalesController::class, 'edit']);
    Route::post('/sales/update/{id_sales}', [SalesController::class, 'update']);
    Route::get('/sales/delete/{id_sales}', [SalesController::class, 'delete']);
    // kategori
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
    Route::get('/kategori/add', [KategoriController::class, 'add']);
    Route::post('/kategori/insert', [KategoriController::class, 'insert']);
    Route::get('/kategori/edit/{id_kategori}', [KategoriController::class, 'edit']);
    Route::post('/kategori/update/{id_kategori}', [KategoriController::class, 'update']);
    Route::get('/kategori/delete/{id_kategori}', [KategoriController::class, 'delete']);
    // brand
    Route::get('/brand', [BrandController::class, 'index'])->name('brand');
    Route::get('/brand/add', [BrandController::class, 'add']);
    Route::post('/brand/insert', [BrandController::class, 'insert']);
    Route::get('/brand/edit/{id_brand}', [BrandController::class, 'edit']);
    Route::post('/brand/update/{id_brand}', [BrandController::class, 'update']);
    Route::get('/brand/delete/{id_brand}', [BrandController::class, 'delete']);

    // laporankeluar

    Route::get('/laporankeluar/edit/{id_laporan}', [LaporanController::class, 'edit']);
    Route::post('/laporankeluar/update/{id_laporan}', [LaporanController::class, 'update']);
    Route::get('/laporankeluar/delete/{id_laporan}', [LaporanController::class, 'delete']);
    Route::get('/laporanmasuk/delete/{id_laporan}', [LaporanController::class, 'delete2']);

    // laporan masuk
    Route::get('/laporanmasuk/add', [LaporanController::class, 'add2'])->name('laporanmasukadd');
    Route::get('/laporanmasuk/tambah/{id_produk}', [LaporanController::class, 'tambah']);
    Route::post('/laporanmasuk/insert', [LaporanController::class, 'insert2']);

    // laporan masuk harga supplier berbeda
    Route::get('/laporanmasuk/tambahv/{id_produk}', [LaporanController::class, 'tambahv']);
    Route::post('/laporanmasuk/insertv', [LaporanController::class, 'insertv2']);
});
