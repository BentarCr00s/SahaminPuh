<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SecurePageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SahamInfoController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/berita', [NewsController::class, 'index'])->name('news');

Route::get('/sahaminfo', [SahamInfoController::class, 'index'])->middleware('auth', 'verified')->name('sahaminfo');


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

Route::get('/news/{id}/{slug}', [NewsController::class, 'show'])->name('news.show');

Route::post('/news/{news}/comments', [CommentController::class, 'store'])->middleware('auth');
Route::patch('/comments/{comment}', [CommentController::class, 'update'])->middleware('auth');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->middleware('auth');

Route::post('comments/{comment}/like', [CommentController::class, 'like'])->name('comments.like');
Route::post('comments/{comment}/dislike', [CommentController::class, 'dislike'])->name('comments.dislike');

require __DIR__.'/auth.php';
