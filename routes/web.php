<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Welcome;
use App\Livewire\Auth\Login;
use App\Livewire\Dashboard\Index as DashboardIndex;
use App\Livewire\Dashboard\Profile;
use App\Livewire\Dashboard\Users;
use App\Http\Middleware\EnsureUserIsAdmin;

// Página inicial
Route::get('/', Welcome::class)->name('home');

// Autenticação
Route::get('/login', Login::class)->name('login')->middleware('guest');

Route::post('/logout', function () {
    auth()->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

// Dashboard (protegido por autenticação e verificação de admin)
Route::middleware(['auth', EnsureUserIsAdmin::class])->prefix('dashboard')->group(function () {
    Route::get('/', DashboardIndex::class)->name('dashboard');
    Route::get('/profile', Profile::class)->name('dashboard.profile');
    Route::get('/users', Users::class)->name('dashboard.users');
});
