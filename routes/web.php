<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PembayaranController;
use Resource\Views;

// Route beranda / home
// Route::get('/', function() {
//     return view('home');
// });

Route::get('/', function () {
    return view('home');
})->name('home');



// -------------------
// KARYAWAN
// -------------------
Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
Route::get('/karyawan/create', [KaryawanController::class, 'create'])->name('karyawan.create');
Route::post('/karyawan', [KaryawanController::class, 'store'])->name('karyawan.store');
Route::get('/karyawan/{id}', [KaryawanController::class, 'show'])->name('karyawan.show');
Route::get('/karyawan/{id}/edit', [KaryawanController::class, 'edit'])->name('karyawan.edit');
Route::put('/karyawan/{id}', [KaryawanController::class, 'update'])->name('karyawan.update');
Route::get('/karyawan/{id}/delete', [KaryawanController::class, 'confirmDelete'])->name('karyawan.confirmDelete');
Route::delete('/karyawan/{id}', [KaryawanController::class, 'destroy'])->name('karyawan.destroy');

// -------------------
// PELANGGAN (pakai resource + tambahan delete confirmation)
// -------------------
Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan.index');
Route::get('/pelanggan/create', [PelangganController::class, 'create'])->name('pelanggan.create');
Route::post('/pelanggan', [PelangganController::class, 'store'])->name('pelanggan.store');
Route::get('/pelanggan/{id}', [PelangganController::class, 'show'])->name('pelanggan.show');
Route::get('/pelanggan/{id}/edit', [PelangganController::class, 'edit'])->name('pelanggan.edit');
Route::put('/pelanggan/{id}', [PelangganController::class, 'update'])->name('pelanggan.update');
Route::get('/pelanggan/{id}/delete', [PelangganController::class, 'confirmDelete'])->name('pelanggan.confirmDelete');
Route::delete('/pelanggan/{id}', [PelangganController::class, 'destroy'])->name('pelanggan.destroy');

// -------------------
// PRODUK
// -------------------
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('produk.show');
Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
Route::put('/produk/{id}', [ProdukController::class, 'update'])->name('produk.update');
Route::get('/produk/{id}/delete', [ProdukController::class, 'confirmDelete'])->name('produk.confirmDelete');
Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');

// -------------------
// PEMBAYARAN
// -------------------
Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');
Route::get('/pembayaran/create', [PembayaranController::class, 'create'])->name('pembayaran.create');
Route::post('/pembayaran', [PembayaranController::class, 'store'])->name('pembayaran.store');
Route::get('/pembayaran/{id}', [PembayaranController::class, 'show'])->name('pembayaran.show');
Route::get('/pembayaran/{id}/edit', [PembayaranController::class, 'edit'])->name('pembayaran.edit');
Route::put('/pembayaran/{id}', [PembayaranController::class, 'update'])->name('pembayaran.update');
Route::get('/pembayaran/{id}/delete', [PembayaranController::class, 'confirmDelete'])->name('pembayaran.confirmDelete');
Route::delete('/pembayaran/{id}', [PembayaranController::class, 'destroy'])->name('pembayaran.destroy');

//Route untuk Middleware CheckAge
Route::get('/pendaftaran-ktp', function(){
    return 'Selamat datang di halaman Pendaftaran KTP Online!';
})->middleware('check.age');
