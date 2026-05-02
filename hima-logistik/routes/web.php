<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\StrukturController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BerandaController as AdminBerandaController;
use App\Http\Controllers\Admin\KegiatanController as AdminKegiatanController;
use App\Http\Controllers\Admin\StrukturController as AdminStrukturController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// ============================================================
// PUBLIC ROUTES
// ============================================================
Route::middleware(['site.status'])->group(function () {
    Route::get('/', [BerandaController::class, 'index'])->name('beranda');
    Route::get('/tentang', [TentangController::class, 'index'])->name('tentang');
    Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan.index');
    Route::get('/kegiatan/{kegiatan}', [KegiatanController::class, 'show'])->name('kegiatan.show');
    Route::get('/struktur', [StrukturController::class, 'index'])->name('struktur');
    Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');
});

// ============================================================
// ADMIN ROUTES (dilindungi auth middleware)
// ============================================================
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Beranda
    Route::resource('beranda', AdminBerandaController::class)->except(['show']);

    // Kegiatan
    Route::resource('kegiatan', AdminKegiatanController::class)->except(['show']);

    // Struktur
    Route::resource('struktur', AdminStrukturController::class)->except(['show']);

    // Tentang
    Route::get('/tentang', [\App\Http\Controllers\Admin\TentangController::class, 'index'])->name('tentang.index');
    Route::post('/tentang', [\App\Http\Controllers\Admin\TentangController::class, 'update'])->name('tentang.update');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Settings (Super Admin Only)
    Route::middleware(['superadmin'])->group(function () {
        Route::get('/settings', [\App\Http\Controllers\Admin\SettingController::class, 'index'])->name('settings.index');
        Route::post('/settings', [\App\Http\Controllers\Admin\SettingController::class, 'update'])->name('settings.update');
    });
});

// Redirect /dashboard ke /admin
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
