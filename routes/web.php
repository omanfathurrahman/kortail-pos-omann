<?php

use App\Http\Controllers\AntrianController;
use App\Http\Controllers\BukaKasirController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\Dashboard2Controller;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PrintStrukController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
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

Route::get('/', function () {
    return view('kasir/container/landing');
});

Route::get('/landing-page', function () {
    return view('kasir/container/landing');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Derina
    // Route::get('/dashboard2', [Dashboard2Controller::class, 'index'])->name('dashboard2');

    // abis login
    Route::get('/home', [Dashboard2Controller::class, 'index']);
    // abis buka kasir
    Route::post('/home', [Dashboard2Controller::class, 'store']);
    // abis tutup kasir
    Route::patch('/home/{id}', [Dashboard2Controller::class, 'update']);
    // ke page buka kasir
    Route::get('/home/bukaKasir', [BukaKasirController::class, 'index']);


    // Oman
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
    Route::post('/transaksi/pembayaran', [PembayaranController::class, 'store']);
    Route::post('/transaksi/pembayaran/checkOut', [CheckOutController::class, 'store'])->name('checkOut');
    Route::get('/transaksi/pembayaran/checkOut/printStruk', [PrintStrukController::class, 'index'])->name('printStruk');


    // Grace
    // Untuk mengambil data produk dari database
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
    // Untuk menambah data antrian dari transaksi yang dibuat
    Route::post('/antrian', [AntrianController::class, 'store']);
    // Menampilkan data antrian yang ada di database
    Route::get('/antrian', [AntrianController::class, 'index'])->name('antrian');
    // Menghapus data antrian dari database
    Route::delete('/antrian/{id}', [AntrianController::class, 'destroy']);

});
