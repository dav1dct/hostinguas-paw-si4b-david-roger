<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BarangController;
use App\Http\Controllers\API\PembayaranController;
use App\Http\Controllers\API\ReviewController;
use App\Http\Controllers\API\PesananController;
use App\Http\Controllers\API\AuthController;

Route::get('barang', [BarangController::class, 'index']);
Route::post('barang', [BarangController::class, 'store']);
Route::patch('barang/{id}', [BarangController::class, 'update']);
Route::delete('barang/{id}', [BarangController::class, 'destroy']);

Route::get('pembayaran', [PembayaranController::class, 'index']);
Route::post('pembayaran', [PembayaranController::class, 'store']);
Route::patch('pembayaran/{id}', [PembayaranController::class, 'update']);
Route::delete('pembayaran/{id}', [PembayaranController::class, 'destroy']);

Route::get('review', [ReviewController::class, 'index']);
Route::post('review', [ReviewController::class, 'store']);
Route::patch('review/{id}', [ReviewController::class, 'update']);
Route::delete('review/{id}', [ReviewController::class, 'destroy']);

Route::get('pesanan', [PesananController::class, 'index']);
Route::post('pesanan', [PesananController::class, 'store']);
Route::patch('pesanan/{id}', [PesananController::class, 'update']);
Route::delete('pesanan/{id}', [PesananController::class, 'destroy']);

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
