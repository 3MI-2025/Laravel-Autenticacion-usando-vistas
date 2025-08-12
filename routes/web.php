<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BebidaController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Autenticacion;

Route::get('/login', function () {
    return view('login');
});
Route::post('/login', [UserController::class, "Login"]);
Route::get('/register', [UserController::class, "Register"]);

Route::middleware([Autenticacion::class])->group(function () {
    Route::get('/',[BebidaController::class, "Index"]);
    Route::post('/bebida', [BebidaController::class, "Insertar"]);
    Route::get('/bebida/{id}', [BebidaController::class, "Detalle"]);
    Route::get('/eliminar/{id}', [BebidaController::class, "Eliminar"]);
    Route::get('/editar/{id}', [BebidaController::class, "BuscarParaEditar"]);
    Route::post('/editar', [BebidaController::class, "Editar"]);
    Route::get('/logout', [UserController::class, "Logout"]);
});


