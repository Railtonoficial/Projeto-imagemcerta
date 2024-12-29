<?php

use App\Http\Controllers\FotoController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FotoController::class, 'dashboard'])->name('home');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->middleware('guest')->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->middleware('guest');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');

Route::get('/register', [RegisteredUserController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->middleware('guest');

Route::get('/dashboard', [FotoController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/fotos', [FotoController::class, 'fotos_aprovadas'])->name('fotos.fotos_aprovadas');
    Route::get('/fotos/create', [FotoController::class, 'create'])->name('fotos.create');
    Route::post('/fotos', [FotoController::class, 'store'])->name('fotos.store');
    Route::post('/fotos/{foto}/alternarAprovacao', [FotoController::class, 'alternarAprovacao'])->name('fotos.alternarAprovacao');
    Route::get('/fotos/avaliar', [FotoController::class, 'avaliar'])->name('fotos.avaliar');
    Route::delete('/fotos/{foto}', [FotoController::class, 'destroy'])->name('fotos.destroy');
});

require __DIR__.'/auth.php';
