<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| PUBLIC CONTROLLERS
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\PesanJemaatController;

/*
|--------------------------------------------------------------------------
| ADMIN CONTROLLERS
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\WartaController;
use App\Http\Controllers\Admin\JadwalIbadahController;
use App\Http\Controllers\Admin\KegiatanGerejaController;
use App\Http\Controllers\Admin\InventarisController;
use App\Http\Controllers\Admin\KeuanganController;
use App\Http\Controllers\Admin\PastorController;
use App\Http\Controllers\Admin\PenatuaController;

/*
|--------------------------------------------------------------------------
| LANDING PAGE JEMAAT
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| PESAN JEMAAT (PUBLIC)
|--------------------------------------------------------------------------
*/
Route::post('/pesan-jemaat', [PesanJemaatController::class, 'store'])
    ->name('pesan.store');

/*
|--------------------------------------------------------------------------
| ADMIN AREA
|--------------------------------------------------------------------------
*/
Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->name('admin.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        // Settings
        Route::get('/settings', [SettingController::class, 'index'])
            ->name('settings');
        Route::post('/settings', [SettingController::class, 'store'])
            ->name('settings.store');

        // Warta
        Route::resource('warta', WartaController::class)
            ->except(['show']);

        // Jadwal Ibadah
        Route::resource('jadwal', JadwalIbadahController::class)
            ->except(['show']);

        // ✅ PROFIL PENDETA (MULTI CRUD)
        Route::resource('pastor', PastorController::class);

        // Kegiatan Gereja
        Route::resource('kegiatan', KegiatanGerejaController::class);

        // Inventaris
        Route::resource('inventaris', InventarisController::class);

        // Keuangan
        Route::get('/keuangan', [KeuanganController::class, 'index'])
            ->name('keuangan.index');
        Route::get('/keuangan/create', [KeuanganController::class, 'create'])
            ->name('keuangan.create');
        Route::post('/keuangan', [KeuanganController::class, 'store'])
            ->name('keuangan.store');
        Route::get('/keuangan/export/pdf', [KeuanganController::class, 'exportPdf'])
            ->name('keuangan.export.pdf');
        Route::get('/keuangan/export/excel', [KeuanganController::class, 'exportExcel'])
            ->name('keuangan.export.excel');
        Route::get('/keuangan/{id}/edit', [KeuanganController::class, 'edit'])
            ->name('keuangan.edit');
        Route::put('/keuangan/{id}', [KeuanganController::class, 'update'])
            ->name('keuangan.update');
        Route::delete('/keuangan/{id}', [KeuanganController::class, 'destroy'])
            ->name('keuangan.destroy');

        // Pesan Jemaat (Admin View)
        Route::get('/pesan', [PesanJemaatController::class, 'index'])
            ->name('pesan.index');
        Route::post('/pesan/{id}/read', [PesanJemaatController::class, 'markRead'])
            ->name('pesan.read');
        Route::delete('/pesan/{id}', [PesanJemaatController::class, 'destroy'])
            ->name('pesan.destroy');

        // Profile Admin
        Route::get('/profile', [ProfileController::class, 'edit'])
            ->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])
            ->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])
            ->name('profile.destroy');

        Route::resource('penatua', PenatuaController::class);
    });

require __DIR__.'/auth.php';