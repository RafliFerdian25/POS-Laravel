<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SaleDetailController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

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

// Route::get('/transaksi/baru', [PenjualanController::class, 'create'])->name('transaksi.baru');
Route::post('/transaksi/simpan', [SaleController::class, 'store'])->name('transaksi.simpan');
Route::get('/transaksi/selesai', [SaleController::class, 'selesai'])->name('transaksi.selesai');
Route::get('/transaksi/nota-kecil', [SaleController::class, 'notaKecil'])->name('transaksi.nota_kecil');
Route::get('/transaksi/{id}/data', [SaleDetailController::class, 'data'])->name('transaksi.data');
Route::get('/transaksi/loadform/{diskon}/{total}/{diterima}', [SaleDetailController::class, 'loadForm'])->name('transaksi.load_form');
Route::resource('/transaksi', SaleDetailController::class)
->except('create', 'show', 'edit');

Route::get('/barang/data', [ProductController::class, 'data'])->name('barang.data');
Route::resource('/barang', ProductController::class);
// Route::get('/kategori/create', [ProductController::class, 'createCategory'])->name('kategori.create');
// Route::POST('/kategori', [ProductController::class, 'storeCategory'])->name('kategori.store');
// Route::get('/kategori/{id}/edit', [ProductController::class, 'editCategory'])->name('kategori.edit');
// Route::delete('/kategori/{id}', [ProductController::class, 'destroyCategory'])->name('kategori.destroy');
// Route::PUT('/kategori/{id}', [ProductController::class, 'updateCategory'])->name('kategori.update');
Route::resource('/kategori', ProductController::class);

Route::get('/penjualan', [SaleDetailController::class, 'index'])->name('penjualan.index');