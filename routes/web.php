<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PengadaanController;

// Arahkan otomatis ke login
Route::get('/', function () {
    return redirect()->route('login');
});

// Middleware Guest (Untuk yang belum login)
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Middleware Auth (Untuk yang sudah login)
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Routing CRUD Resource standar
    Route::resource('barang', BarangController::class);
    Route::resource('pengadaan', PengadaanController::class);

    // Routing khusus aksi Approval
    Route::put('/pengadaan/{id}/approve', [PengadaanController::class, 'approve'])->name('pengadaan.approve');
    Route::put('/pengadaan/{id}/reject', [PengadaanController::class, 'reject'])->name('pengadaan.reject');
});