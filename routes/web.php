<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipamentoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\LocatarioController;
use App\Http\Controllers\LocadorController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('equipamentos', EquipamentoController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('locador', LocadorController::class);
Route::resource('locatario', LocatarioController::class);