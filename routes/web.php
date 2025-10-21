<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MahasiswaController; // ← Tambahkan ini
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini kamu bisa mendaftarkan route aplikasi web kamu.
| Route di bawah ini otomatis berada di grup "web" middleware.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // 🟩 Tambahkan route resource Mahasiswa di sini
    Route::resource('mahasiswa', MahasiswaController::class);
});

require __DIR__.'/auth.php';
