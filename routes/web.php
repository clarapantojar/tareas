<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

// Aplicación directa, no nos hace falta la página de welcome por ahora
Route::redirect('/', '/dashboard'); //el logout tampoco va a ir a la landing

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
