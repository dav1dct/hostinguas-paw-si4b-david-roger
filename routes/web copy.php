<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\DashboardController;
use App\Models\Pembayaran;

Route::get('/', function () {
    return view('login/login');
});

Route::get('/register', function () {
    return view('register/register');
});

Route::get('/dashboard', function () {
    return view('dashboard/dashboard');
});

Route::resource('barang', BarangController::class);
Route::resource('pembayaran', PembayaranController::class);
Route::resource('pembeli', PembeliController::class);
Route::resource('pesanan', PesananController::class);

Route::post('/barang/store', [BarangController::class, 'store'])->name('barang.store');
Route::put('/barang/{id}', [BarangController::class, 'update'])->name('barang.update');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

