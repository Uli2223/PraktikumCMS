<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    DashboardController,
    ImageController,
    KaryawanController,
    PelangganController,
    ProdukController,
    PembayaranController,
    PembelianController
};

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

// Public routes
Route::get('/', function () {
    return view('home');
})->name('home');

// Authentication routes
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->name('logout');
});

// Image handling routes
Route::controller(ImageController::class)->group(function () {
    Route::get('/upload', 'create');
    Route::post('/upload', 'store')->name('image.upload');
    Route::delete('/upload/{id}', 'destroy')->name('image.destroy');
});

// Authenticated routes
Route::middleware(['auth'])->group(function () {
    // Dashboard routes
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/home', function () {
        return view('home');
    })->name('home');
    
    // Karyawan resource routes
    Route::prefix('karyawan')->name('karyawan.')->controller(KaryawanController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}', 'show')->name('show');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::get('/{id}/delete', 'confirmDelete')->name('confirmDelete');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });
    
    // Pelanggan resource routes
    Route::prefix('pelanggan')->name('pelanggan.')->controller(PelangganController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}', 'show')->name('show');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::get('/{id}/delete', 'confirmDelete')->name('confirmDelete');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });
    
    // Produk resource routes
    Route::prefix('produk')->name('produk.')->controller(ProdukController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}', 'show')->name('show');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::get('/{id}/delete', 'confirmDelete')->name('confirmDelete');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });
    
    // Pembayaran resource routes
    Route::prefix('pembayaran')->name('pembayaran.')->controller(PembayaranController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}', 'show')->name('show');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::get('/{id}/delete', 'confirmDelete')->name('confirmDelete');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });
    
    // Pembelian resource routes
    Route::prefix('pembelian')->name('pembelian.')->controller(PembelianController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create/{pelanggan_id}', 'create')->name('create');
        Route::post('/store/{pelanggan_id}', 'store')->name('store');
        Route::get('/{id}', 'show')->name('show');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::get('/{id}/delete', 'confirmDelete')->name('confirmDelete');
        Route::delete('/{id}', 'destroy')->name('destroy');
        
        // Pelanggan selection route
        Route::get('/select-pelanggan', function () {
            return redirect()->route('pelanggan.index');
        })->name('select-pelanggan');
    });

    // Special KTP registration route
    Route::get('/pendaftaran-ktp', function() {
        return 'Selamat datang di halaman Pendaftaran KTP Online!';
    })->middleware('check.age')->name('ktp.registration');
});