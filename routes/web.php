<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SeasonController;
use App\Http\Controllers\Admin\PlayerController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

    Route::get('/dashboard', function () {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('player.dashboard');
    })->name('dashboard');

    Route::prefix('admin')->name('admin.')->middleware('role:admin')->group(function () {
        Route::view('/dashboard', 'admin.dashboard')->name('dashboard');
        Route::resource('categories', CategoryController::class)->except('show');
        Route::resource('seasons', SeasonController::class)->except('show');
        Route::resource('players', PlayerController::class)->except('show');
    });

    Route::prefix('player')->name('player.')->middleware('role:player')->group(function () {
        Route::view('/dashboard', 'player.dashboard')->name('dashboard');
    });
});