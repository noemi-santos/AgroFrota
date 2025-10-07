<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipamentoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\LocatarioController;
use App\Http\Controllers\LocadorController;
use App\Http\Controllers\HomeController;


Route::get('/', function () {
    return view('home');
});

Route::resource('equipamentos', EquipamentoController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('locador', LocadorController::class);
Route::resource('locatario', LocatarioController::class);
Route::get('/', [HomeController::class, 'index'])->name('home');