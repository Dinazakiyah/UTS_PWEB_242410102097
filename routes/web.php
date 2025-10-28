<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;


Route::get('/', [PageController::class, 'showLogin'])->name('login');


Route::post('/login', [PageController::class, 'processLogin'])->name('login.process');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [PageController::class, 'showDashboard'])->name('dashboard');
Route::get('/admin', [PageController::class, 'showPengelolaan'])->middleware('role:admin')->name('admin');
Route::get('/pengelolaan', [PageController::class, 'showPengelolaan'])->middleware('role:journalist')->name('pengelolaan');
Route::get('/berita', [PageController::class, 'showBerita'])->name('berita');
Route::get('/artikel/{id}', [PageController::class, 'showArtikel'])->name('artikel');
    Route::get('/profile', [PageController::class, 'showProfile'])->name('profile');
});

Route::get('/logout', [PageController::class, 'logout'])->name('logout');
