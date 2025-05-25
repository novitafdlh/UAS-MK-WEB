<?php

use App\Http\Controllers\Admin\MahasiswaController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Admin\JurusanController;
use App\Http\Controllers\Admin\ProdiController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Dosen\NilaiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mahasiswa\KRSController;
use App\Http\Controllers\Mahasiswa\ProfilController;

// Halaman utama
Route::get('/', fn() => view('auth.login'));

// Login admin terpisah
Route::get('/login/admin', [AdminLoginController::class, 'create'])->name('login.admin');
Route::post('/login/admin', [AdminLoginController::class, 'store'])->name('login.admin.store');

// Login dosen & mahasiswa
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');

// Register mahasiswa
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');

// Authenticated routes
Route::middleware('auth')->group(function () {
    
    // Admin
    Route::middleware('is_admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('dashboard', fn() => view('admin.dashboard'))->name('dashboard');
        // Route untuk Data Mahasiswa
        Route::prefix('mahasiswa')->name('mahasiswa.')->group(function () {
            Route::prefix('data')->name('data.')->group(function () {
                Route::get('/', [MahasiswaController::class, 'index'])->name('index');
                Route::get('/create', [MahasiswaController::class, 'create'])->name('create');
                Route::post('/', [MahasiswaController::class, 'store'])->name('store');
                Route::get('/{id}/edit', [MahasiswaController::class, 'edit'])->name('edit');
                Route::put('/{id}', [MahasiswaController::class, 'update'])->name('update');
                Route::delete('/{id}', [MahasiswaController::class, 'destroy'])->name('destroy');
            });

            Route::prefix('akun')->name('akun.')->group(function () {
                Route::get('/', [\App\Http\Controllers\Admin\AkunMahasiswaController::class, 'index'])->name('index');
                Route::get('/create', [\App\Http\Controllers\Admin\AkunMahasiswaController::class, 'create'])->name('create');
                Route::post('/', [\App\Http\Controllers\Admin\AkunMahasiswaController::class, 'store'])->name('store');
                Route::get('/{id}/edit', [\App\Http\Controllers\Admin\AkunMahasiswaController::class, 'edit'])->name('edit');
                Route::put('/{id}', [\App\Http\Controllers\Admin\AkunMahasiswaController::class, 'update'])->name('update');
                Route::delete('/{id}', [\App\Http\Controllers\Admin\AkunMahasiswaController::class, 'destroy'])->name('destroy');
            });
        }); 
        
        // Route untuk Data Dosen
        Route::prefix('dosen')->name('dosen.')->group(function () {
            Route::prefix('data')->name('data.')->group(function () {
                Route::get('/', [\App\Http\Controllers\Admin\DosenController::class, 'index'])->name('index');
                Route::get('/create', [\App\Http\Controllers\Admin\DosenController::class, 'create'])->name('create');
                Route::post('/', [\App\Http\Controllers\Admin\DosenController::class, 'store'])->name('store');
                Route::get('/{id}/edit', [\App\Http\Controllers\Admin\DosenController::class, 'edit'])->name('edit');
                Route::put('/{id}', [\App\Http\Controllers\Admin\DosenController::class, 'update'])->name('update');
                Route::delete('/{id}', [\App\Http\Controllers\Admin\DosenController::class, 'destroy'])->name('destroy');
            });

            Route::prefix('akun')->name('akun.')->group(function () {
                Route::get('/', [\App\Http\Controllers\Admin\AkunDosenController::class, 'index'])->name('index');
                Route::get('/create', [\App\Http\Controllers\Admin\AkunDosenController::class, 'create'])->name('create');
                Route::post('/', [\App\Http\Controllers\Admin\AkunDosenController::class, 'store'])->name('store');
                Route::get('/{id}/edit', [\App\Http\Controllers\Admin\AkunDosenController::class, 'edit'])->name('edit');
                Route::put('/{id}', [\App\Http\Controllers\Admin\AkunDosenController::class, 'update'])->name('update');
                Route::delete('/{id}', [\App\Http\Controllers\Admin\AkunDosenController::class, 'destroy'])->name('destroy');
            });
        });

        Route::prefix('jurusan')->name('jurusan.')->group(function () {
            Route::get('/', [JurusanController::class, 'index'])->name('index');
            Route::get('/create', [JurusanController::class, 'create'])->name('create');
            Route::post('/', [JurusanController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [JurusanController::class, 'edit'])->name('edit');
            Route::put('/{id}', [JurusanController::class, 'update'])->name('update');
            Route::delete('/{id}', [JurusanController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('prodi')->name('prodi.')->group(function () {
            Route::get('/', [ProdiController::class, 'index'])->name('index');
            Route::get('/create', [ProdiController::class, 'create'])->name('create');
            Route::post('/', [ProdiController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [ProdiController::class, 'edit'])->name('edit');
            Route::put('/{id}', [ProdiController::class, 'update'])->name('update');
            Route::delete('/{id}', [ProdiController::class, 'destroy'])->name('destroy');
        });

        // Route untuk Data Matakuliah
        Route::resource('matakuliah', \App\Http\Controllers\Admin\MatakuliahController::class);

        // Route untuk Jadwal
        Route::prefix('jadwal')->name('jadwal.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\JadwalController::class, 'index'])->name('index');
            Route::get('/create', [\App\Http\Controllers\Admin\JadwalController::class, 'create'])->name('create');
            Route::post('/', [\App\Http\Controllers\Admin\JadwalController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [\App\Http\Controllers\Admin\JadwalController::class, 'edit'])->name('edit');
            Route::put('/{id}', [\App\Http\Controllers\Admin\JadwalController::class, 'update'])->name('update');
            Route::delete('/{id}', [\App\Http\Controllers\Admin\JadwalController::class, 'destroy'])->name('destroy');
});

    });

    // Dosen
    Route::middleware('is_dosen')->prefix('dosen')->name('dosen.')->group(function () {
    Route::get('/dashboard', fn() => view('dosen.dashboard'))->name('dashboard');

    Route::prefix('nilai')->name('nilai.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Dosen\NilaiController::class, 'index'])->name('index');
        Route::get('/create', [\App\Http\Controllers\Dosen\NilaiController::class, 'create'])->name('create');
        Route::post('/', [\App\Http\Controllers\Dosen\NilaiController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [\App\Http\Controllers\Dosen\NilaiController::class, 'edit'])->name('edit');
        Route::put('/{id}', [\App\Http\Controllers\Dosen\NilaiController::class, 'update'])->name('update');
        Route::delete('/{id}', [\App\Http\Controllers\Dosen\NilaiController::class, 'destroy'])->name('destroy');
    });
});



    // Mahasiswa
    Route::middleware('is_mahasiswa')->group(function () {
        Route::get('/mahasiswa/dashboard', fn() => view('mahasiswa.dashboard'))->name('mahasiswa.dashboard');
        Route::get('/mahasiswa/krs', [KRSController::class, 'index'])->name('mahasiswa.krs.index');
        Route::get('/mahasiswa/krs/create', [KRSController::class, 'create'])->name('mahasiswa.krs.create');
        Route::post('/mahasiswa/krs', [KRSController::class, 'store'])->name('mahasiswa.krs.store');
        Route::get('/mahasiswa/krs/{krs}/edit', [KRSController::class, 'edit'])->name('mahasiswa.krs.edit');
        Route::put('/mahasiswa/krs/{krs}', [KRSController::class, 'update'])->name('mahasiswa.krs.update');
        Route::delete('/mahasiswa/krs/{krs}', [KRSController::class, 'destroy'])->name('mahasiswa.krs.destroy');

        Route::prefix('mahasiswa')->name('mahasiswa.')->group(function () {
    Route::get('profil', [ProfilController::class, 'index'])->name('profil.index');
    Route::get('profil/edit', [ProfilController::class, 'edit'])->name('profil.edit');
    Route::post('profil/update', [ProfilController::class, 'update'])->name('profil.update');
});

    });
});

// Laravel Breeze / Fortify
require __DIR__.'/auth.php';
