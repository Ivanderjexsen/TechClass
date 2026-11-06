
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\PendaftarController;

// Halaman Pengunjung
Route::get('/', [LandingController::class, 'index'])
    ->name('landing');

Route::get('/kelas/{id}', [PendaftaranController::class, 'detail'])
    ->name('kelas.detail');

Route::post('/kelas/{id}/daftar', [PendaftaranController::class, 'store'])
    ->name('kelas.daftar');

// Autentikasi Admin
Route::prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/login', [AuthController::class, 'create'])
            ->name('login');

        Route::post('/login', [AuthController::class, 'store'])
            ->name('login.store');

        Route::middleware(AdminMiddleware::class)->group(function () {

            Route::get('/dashboard', [DashboardController::class, 'index'])
                ->name('dashboard');

            Route::resource('/kelas', KelasController::class)
                ->except(['show']);

            Route::resource('/kategori', KategoriController::class)
                ->except(['show']);


            // Data Pendaftar
            Route::get('/pendaftar', [PendaftarController::class, 'index'])
                ->name('pendaftar.index');

            // Ekspor Data Pendaftar ke CSV
            Route::get('/pendaftar/export', [PendaftarController::class, 'export'])
                ->name('pendaftar.export');

            Route::get('/pendaftar/{id}', [PendaftarController::class, 'show'])
                ->name('pendaftar.show');

            Route::put('/pendaftar/{id}/status', [PendaftarController::class, 'updateStatus'])
                ->name('pendaftar.updateStatus');

            Route::delete('/pendaftar/{id}', [PendaftarController::class, 'destroy'])
                ->name('pendaftar.destroy');

            // Logout Admin
            Route::post('/logout', [AuthController::class, 'destroy'])
                ->name('logout');
        });
    });
