<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SaleDetailController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\SupplierController;
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

// Barang
Route::get('/barang/data', [ProductController::class, 'data'])->name('barang.data');
Route::resource('/barang', ProductController::class)->except('show');

// Kategori
Route::resource('/kategori', CategoryController::class)->except('show');
Route::resource('/merk', MerkController::class)->except('show', 'index');
Route::resource('/supplier', SupplierController::class)->except('show');

// Penjualan
Route::get('/', [SaleDetailController::class, 'index'])->name('penjualan.index');

// Laporan
Route::get('/laporan/{sale}/show', [SaleController::class, 'showReport'])->name('laporan.show');
Route::get('/laporan/bulanan', [SaleController::class, 'laporanBulanan'])->name('laporan.bulanan');
