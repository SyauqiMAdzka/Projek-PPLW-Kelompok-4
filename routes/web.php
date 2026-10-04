<?php
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;


Route::withoutMiddleware([
    PreventRequestForgery::class,
    StartSession::class,
    ShareErrorsFromSession::class,
])->group(function () {
    Route::get('/test-frontend', function () {
        return '<h1>Frontend berhasil!</h1>';
    });

    Route::get('/register', function () {
        return view('auth.register');
    });

    Route::get('/login', function () {
        return view('auth.login');
    });

    Route::get('/verification', function () {
        return view('auth.verification');
    });

    Route::get('/preview/admin', function () {
    return view('dashboard.admin');
    });

    Route::get('/preview/staff', function () {
    return view('dashboard.staff');
    });

    Route::view('/test', 'auth.verification');

    Route::get('/', function () {
        return view('welcome');
    });
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

// Menampilkan form register
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');

// Menangkap data dari form saat tombol register diklik
Route::post('/register', [AuthController::class, 'processRegister'])->name('register.proses');

// Rute Register
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'processRegister'])->name('register.proses');

// Rute Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'processLogin'])->name('login.proses');
