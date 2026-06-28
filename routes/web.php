<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\WargaController;
use App\Http\Controllers\Admin\IuranController;
use App\Http\Controllers\Admin\PembayaranController;
use App\Http\Controllers\Admin\PengumumanController;
use App\Http\Controllers\Warga\DashboardController;
use App\Http\Controllers\Admin\LaporanController;

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Dashboard Warga
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/warga/qris', function () {
    return view('warga.qris');
    })->name('warga.qris');

    Route::get('/warga/dashboard', [DashboardController::class, 'index'])
    ->name('warga.dashboard');

Route::get('/warga/riwayat', [DashboardController::class, 'riwayat'])
    ->name('warga.riwayat');

Route::get('/warga/pengumuman', [DashboardController::class, 'pengumuman'])
    ->name('warga.pengumuman');

});

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->group(function () {

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('admin.dashboard');

        Route::resource('warga', WargaController::class);

        Route::resource('iuran', IuranController::class);

        Route::resource('pembayaran', PembayaranController::class);
   
        Route::get(
        'pembayaran-export/pdf',
        [PembayaranController::class, 'exportPdf']
        )->name('pembayaran.pdf');

        Route::get(
         'pembayaran-export/excel',
         [PembayaranController::class, 'exportExcel']
         )->name('pembayaran.excel');

        Route::resource('pengumuman', PengumumanController::class);

        Route::get(
        '/laporan',
        [LaporanController::class, 'index']
        )->name('laporan.index');

    });

/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});


require __DIR__.'/auth.php';