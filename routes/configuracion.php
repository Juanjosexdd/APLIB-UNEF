<?php

use App\Http\Controllers\AdminSolicitudesController;
use App\Http\Controllers\Configuracion\CarreraController;
use App\Http\Controllers\Configuracion\CategoriaController;
use App\Http\Controllers\Configuracion\DocumentTypeController;
use App\Http\Controllers\Configuracion\SubcategoriaController;
use App\Http\Controllers\Configuracion\TipoUsuarioController;
use App\Http\Controllers\LibroController;
use Illuminate\Support\Facades\Route;


Route::resource('tipodocumentos', DocumentTypeController::class)->names('configuracion.tipodocumentos');
Route::resource('tipousuarios', TipoUsuarioController::class)->names('configuracion.tipousuarios');
Route::resource('categorias', CategoriaController::class)->names('configuracion.categorias');
Route::resource('subcategorias', SubcategoriaController::class)->names('configuracion.subcategorias');
Route::resource('carreras', CarreraController::class)->names('configuracion.carreras');
Route::resource('libros', LibroController::class)->names('configuracion.libros');
Route::resource('solicitudes', AdminSolicitudesController::class)->names('configuracion.solicitudes');
