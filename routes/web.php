<?php

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

    Route::view('/admin/dashboard', 'admin.dashboard')
        ->middleware('role:admin')
        ->name('admin.dashboard');

    Route::view('/player/dashboard', 'player.dashboard')
        ->middleware('role:player')
        ->name('player.dashboard');
});