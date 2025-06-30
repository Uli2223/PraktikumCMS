<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;

// Public routes
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/upload', [ImageController::class, 'create']);
Route::post('/upload', [ImageController::class, 'store'])->name('image.upload');
Route::delete('/upload/{id}', [ImageController::class, 'destroy'])->name('image.destroy');

// Authenticated routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/home', function () {
        return view('home');
    })->name('home');
    
    // Karyawan
    Route::resource('karyawan', KaryawanController::class)->except(['destroy']);
    Route::get('karyawan/{id}/delete', [KaryawanController::class, 'confirmDelete'])->name('karyawan.confirmDelete');
    Route::delete('karyawan/{id}', [KaryawanController::class, 'destroy'])->name('karyawan.destroy');
    
    // Pelanggan
    Route::resource('pelanggan', PelangganController::class)->except(['destroy']);
    Route::get('pelanggan/{id}/delete', [PelangganController::class, 'confirmDelete'])->name('pelanggan.confirmDelete');
    Route::delete('pelanggan/{id}', [PelangganController::class, 'destroy'])->name('pelanggan.destroy');
    
    // Produk
    Route::resource('produk', ProdukController::class)->except(['destroy']);
    Route::get('produk/{id}/delete', [ProdukController::class, 'confirmDelete'])->name('produk.confirmDelete');
    Route::delete('produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
    
    // Pembayaran
    Route::resource('pembayaran', PembayaranController::class)->except(['destroy']);
    Route::get('pembayaran/{id}/delete', [PembayaranController::class, 'confirmDelete'])->name('pembayaran.confirmDelete');
    Route::delete('pembayaran/{id}', [PembayaranController::class, 'destroy'])->name('pembayaran.destroy');
    
    // Middleware CheckAge
    Route::get('/pendaftaran-ktp', function(){
        return 'Selamat datang di halaman Pendaftaran KTP Online!';
    })->middleware('check.age');
});