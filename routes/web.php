<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/berita', function () {
    return view('berita');
})->name('berita');

Route::get('/sahaminfo', function () {
    return view('sahaminfo');
})->name('sahaminfo');

Route::get('/kalkulator', function () {
    return view('kalkulator');
})->name('kalkulator');

Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/kalkulator', function () {
    return view('kalkulator');
})->middleware(['auth', 'verified'])->name('kalkulator');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
