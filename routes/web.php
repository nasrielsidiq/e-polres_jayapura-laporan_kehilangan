<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\StatusController;

// ADMIN
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\LaporanAdminController;
use App\Http\Controllers\Admin\PelaporController;
use App\Http\Controllers\Admin\KategoriBarangController;
use App\Http\Controllers\Admin\ArsipController;
    // Route::post('/pengaturan', [PengaturanController::class, 'update'])->name('pengaturan.update');
use App\Http\Controllers\Admin\PengaturanController;
use App\Http\Controllers\Admin\PetugasController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\PanduanController;

/*
|--------------------------------------------------------------------------
| Public Routes (Tanpa Login)
|--------------------------------------------------------------------------
*/

Route::get('/', [LandingController::class, 'index'])->name('beranda');

// Panduan layanan
Route::get('/panduan', [PanduanController::class, 'index'])->name('panduan');
Route::get('/panduan/faq', [PanduanController::class, 'faq'])->name('panduan.faq');

// Hubungi kami
Route::get('/hubungi-kami', [KontakController::class, 'index'])->name('hubungi');

// Cek status laporan
Route::get('/cek-status', [StatusController::class, 'index'])->name('status.cek');
Route::post('/cek-status', [StatusController::class, 'search'])->name('status.search');

// Cetak bukti laporan — public
Route::get('/laporan/{nomor}/cetak', [StatusController::class, 'cetakBukti'])
    ->name('laporan.cetak');

/*
|--------------------------------------------------------------------------
| Dashboard (Authenticated Users)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

/*
|--------------------------------------------------------------------------
| Profile Management
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/*
|--------------------------------------------------------------------------
| User Pelapor (Wajib Login)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified', 'role:pelapor'])->group(function () {

    // Buat laporan kehilangan
    Route::get('/laporan/buat', [LaporanController::class, 'create'])->name('laporan.buat');
    Route::post('/laporan/buat', [LaporanController::class, 'store'])->name('laporan.store');

    // Riwayat laporan saya
    Route::get('/laporan/saya', [LaporanController::class, 'riwayat'])->name('laporan.saya');

    // Detail laporan
    Route::get('/laporan/{id}/detail', [LaporanController::class, 'show'])->name('laporan.detail');

    // Upload lampiran
    Route::post('/laporan/{id}/lampiran', [LaporanController::class, 'uploadLampiran'])
        ->name('laporan.lampiran');
});


/*
|--------------------------------------------------------------------------
| Admin SPKT
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->middleware(['auth', 'verified', 'role:admin|petugas'])
    ->group(function () {

    // Dashboard
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    /*
    |----------------------------------------------------------------------
    | Manajemen Laporan Kehilangan
    |----------------------------------------------------------------------
    */
    Route::prefix('laporan')->group(function () {
        Route::get('/', [LaporanAdminController::class, 'index'])->name('admin.laporan.index');
        // create & store for admin
        Route::get('/buat', [LaporanAdminController::class, 'create'])->name('admin.laporan.create');
        Route::post('/buat', [LaporanAdminController::class, 'store'])->name('admin.laporan.store');
        Route::get('/{id}/detail', [LaporanAdminController::class, 'show'])->name('admin.laporan.detail');

        // Verifikasi laporan
        Route::post('/{id}/verifikasi', [LaporanAdminController::class, 'verifikasi'])
            ->name('admin.laporan.verifikasi');

        // Update status (diproses, selesai, ditolak)
        Route::post('/{id}/update-status', [LaporanAdminController::class, 'updateStatus'])
            ->name('admin.laporan.update');

        // Cetak surat kehilangan
        Route::get('/{id}/cetak-surat', [LaporanAdminController::class, 'cetakSurat'])
            ->name('admin.laporan.cetak');
    });

    /*
    |----------------------------------------------------------------------
    | Manajemen Pelapor
    |----------------------------------------------------------------------
    */
    Route::resource('pelapor', PelaporController::class)->names([
        'index' => 'admin.pelapor.index',
        'show' => 'admin.pelapor.detail',
        'create' => 'admin.pelapor.create',
        'store' => 'admin.pelapor.store',
        'edit' => 'admin.pelapor.edit',
        'update' => 'admin.pelapor.update',
        'destroy' => 'admin.pelapor.destroy'
    ])->parameters([
        'pelapor' => 'pelapor'
    ]);

    /*
    |----------------------------------------------------------------------
    | Manajemen Kategori Barang Hilang
    |----------------------------------------------------------------------
    */
    Route::resource('kategori-barang', KategoriBarangController::class)->names([
        'index' => 'admin.kategori.index',
        'create' => 'admin.kategori.create',
        'store' => 'admin.kategori.store',
        'edit' => 'admin.kategori.edit',
        'update' => 'admin.kategori.update',
        'destroy' => 'admin.kategori.destroy'
    ]);

    /*
    |----------------------------------------------------------------------
    | Arsip Laporan
    |----------------------------------------------------------------------
    */
    Route::get('/arsip', [ArsipController::class, 'index'])->name('admin.arsip.index');
    Route::get('/arsip/{id}', [ArsipController::class, 'show'])->name('admin.arsip.detail');
    Route::put('/arsip/{id}/restore', [ArsipController::class, 'restore'])->name('admin.arsip.restore');
    Route::delete('/arsip/{id}', [ArsipController::class, 'destroy'])->name('admin.arsip.destroy');

    /*
    |----------------------------------------------------------------------
    | Manajemen Petugas
    |----------------------------------------------------------------------
    */
    Route::resource('petugas', PetugasController::class)->names([
        'index' => 'admin.petugas.index',
        'create' => 'admin.petugas.create',
        'store' => 'admin.petugas.store',
        'edit' => 'admin.petugas.edit',
        'update' => 'admin.petugas.update',
        'destroy' => 'admin.petugas.destroy'
    ]);

    /*
    |----------------------------------------------------------------------
    | Pengaturan Sistem
    |----------------------------------------------------------------------
    */
    Route::get('/pengaturan', [PengaturanController::class, 'index'])->name('admin.pengaturan.index');
    Route::post('/pengaturan', [PengaturanController::class, 'update'])->name('admin.pengaturan.update');
});


/*
|--------------------------------------------------------------------------
| AUTH ROUTES (Breeze)
|--------------------------------------------------------------------------
|
| Semua route login/register/logout/email verification
| sudah otomatis tersedia di:
|   routes/auth.php
|
*/
require __DIR__.'/auth.php';
