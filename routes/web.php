<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ShowlibrosController;
use App\Http\Controllers\SolicitudLibroController;

Route::get('/', [WelcomeController::class, 'index']);
Route::get('search', SearchController::class)->name('search');
Route::resource('libros', ShowlibrosController::class)->names('libros');

Route::middleware(['auth', 'auth.session'])->group(function () {

    Route::resource('solicitud-libros', SolicitudLibroController::class)->names('solicitud-libros');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
