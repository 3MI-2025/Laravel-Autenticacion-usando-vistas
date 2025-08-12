<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BebidaController;

Route::get('/',[BebidaController::class, "Index"] );
Route::post('/bebida', [BebidaController::class, "Insertar"]);
Route::get('/bebida/{id}', [BebidaController::class, "Detalle"]);
Route::get('/eliminar/{id}', [BebidaController::class, "Eliminar"]);
Route::get('/editar/{id}', [BebidaController::class, "BuscarParaEditar"]);
Route::post('/editar', [BebidaController::class, "Editar"]);