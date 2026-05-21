<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

// Dashboard (sementara, tanpa middleware auth — akan ditambah di Bab 7)
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Route untuk modul pelayanan medis rumah sakit (Bab 5)
// Route::resource('poliklinik', PoliklinikController::class);
// Route::resource('dokter', DokterController::class);
// Route::resource('jadwal', JadwalPraktikController::class);
