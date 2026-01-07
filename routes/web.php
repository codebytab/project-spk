<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| ROUTE LOGIN & REGISTER
|--------------------------------------------------------------------------
*/

// Login
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Register
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| ROUTE SPK (WAJIB LOGIN)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

   Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

   /* =====================
      KRITERIA (CRUD)
   ====================== */
   Route::resource('kriteria', KriteriaController::class)->except(['show']);

   /* =====================
      NILAI / INPUT Alternatif
      (1 FORM = 1 Alternatif)
   ====================== */
   // Menggunakan custom route agar sesuai dengan existing view/logic jika resource tidak pas
   // atau pakai resource tapi sesuaikan methodnya. 
   // Di controller saya buat: index, store, edit, update, destroy.

   Route::get('/nilai', [AlternatifController::class, 'index']);
   Route::post('/nilai', [AlternatifController::class, 'store']);
   Route::get('/nilai/{id}/edit', [AlternatifController::class, 'edit']);
   Route::put('/nilai/{id}', [AlternatifController::class, 'update']);
   Route::delete('/nilai/{id}', [AlternatifController::class, 'destroy']);

   /* =====================
      PERANGKINGAN (READ)
   ====================== */
   Route::get('/ranking', [RankingController::class, 'index']);
});

/*
|--------------------------------------------------------------------------
| ROUTE CEK DATABASE (OPTIONAL)
|--------------------------------------------------------------------------
*/
Route::get('/cek-db', function () {
   return config('database.connections.mysql.database');
});
