<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AlternatifController;
use App\Http\Controllers\Admin\KriteriaController;
use App\Http\Controllers\Admin\SubKriteriaController;
use App\Http\Controllers\Admin\PerhitunganController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RequestProdukController;
use App\Http\Controllers\User\RekomendasiController;
use App\Http\Controllers\User\RequestProdukUserController;

// Auth Routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        $totalProduk = \App\Models\Alternatif::count();
        $totalKriteria = \App\Models\Kriteria::count();
        $totalSubKriteria = \App\Models\SubKriteria::count();
        return view('admin.dashboard', compact('totalProduk', 'totalKriteria', 'totalSubKriteria'));
    })->name('dashboard');

    Route::resource('alternatif', AlternatifController::class);
    Route::resource('kriteria', KriteriaController::class);
    Route::resource('sub-kriteria', SubKriteriaController::class);
    Route::resource('user', UserController::class);
    Route::get('/perhitungan', [PerhitunganController::class, 'index'])->name('perhitungan.index');
    Route::post('/perhitungan/hitung', [PerhitunganController::class, 'hitung'])->name('perhitungan.hitung');
    Route::get('/request-produk', [RequestProdukController::class, 'index'])->name('request-produk.index');
    Route::post('/request-produk/{id}/terima', [RequestProdukController::class, 'terima'])->name('request-produk.terima');
    Route::post('/request-produk/{id}/tolak', [RequestProdukController::class, 'tolak'])->name('request-produk.tolak');
});

// User Routes
Route::middleware(['auth', 'role:user'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', function () {
        return view('user.dashboard');
    })->name('dashboard');

     Route::get('/rekomendasi', [RekomendasiController::class, 'index'])->name('rekomendasi');
     Route::get('/request-produk', [RequestProdukUserController::class, 'index'])->name('request-produk');
     Route::post('/request-produk', [RequestProdukUserController::class, 'store'])->name('request-produk.store');
});