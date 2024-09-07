<?php

use App\Http\Controllers\LogSistemaController;
use App\Http\Controllers\Seguridad\LoginLogController;
use App\Http\Controllers\Seguridad\RespaldoController;
use App\Http\Controllers\Seguridad\RoleController;
use App\Http\Controllers\Seguridad\UserController;
use Illuminate\Support\Facades\Route;

Route::resource('logins', LoginLogController::class)->names('seguridad.logins');
Route::resource('logs', LogSistemaController::class)->names('seguridad.logs');
Route::resource('usuarios', UserController::class)->names('seguridad.usuarios');
Route::resource('respaldos', RespaldoController::class)->names('seguridad.respaldos');
Route::resource('roles', RoleController::class)->names('seguridad.roles');
