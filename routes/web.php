<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PengajuanController;

Route::get('/', function () {
    return view('welcome');
});
// ==========================================
// 1. JALUR KHUSUS STAFF (Pengajuan Barang)
// ==========================================
Route::prefix('staff')->group(function () {
    // Menampilkan halaman riwayat & form pengajuan
    Route::get('/pengajuan', [PengajuanController::class, 'indexStaff'])->name('staff.pengajuan.index');

    // Menangkap input form dan menyimpan pengajuan baru ke database
    Route::post('/pengajuan', [PengajuanController::class, 'store'])->name('staff.pengajuan.store');
});

// ==========================================
// 2. JALUR KHUSUS ADMIN (Manajemen & Approval)
// ==========================================
Route::prefix('admin')->group(function () {

    // --- Manajemen Master Barang (CRUD) ---
    Route::get('/barang', [BarangController::class, 'index'])->name('admin.barang.index');
    Route::post('/barang', [BarangController::class, 'store'])->name('admin.barang.store');
    Route::put('/barang/{id}', [BarangController::class, 'update'])->name('admin.barang.update');
    Route::delete('/barang/{id}', [BarangController::class, 'destroy'])->name('admin.barang.destroy');

    // --- Manajemen Approval Pengajuan ---
    Route::get('/pengajuan', [PengajuanController::class, 'indexAdmin'])->name('admin.pengajuan.index');
    Route::post('/pengajuan/{id}/approve', [PengajuanController::class, 'approve'])->name('admin.pengajuan.approve');
    Route::post('/pengajuan/{id}/reject', [PengajuanController::class, 'reject'])->name('admin.pengajuan.reject');
});
