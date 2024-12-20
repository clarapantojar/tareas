<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

// Aplicación directa, no nos hace falta la página de welcome por ahora
Route::redirect('/', '/dashboard'); //el logout tampoco va a ir a la landing - redirect principal

// No nos hace falta, porque está la llamada del controllador con la vista 
// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

# Ruta de tipo get para llamar al controller del dashboard, que devuelve la vista - Qué controller llamamos y qué función usamos
# Route::get('vista', [ControladorController::class, 'funcion'])
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
