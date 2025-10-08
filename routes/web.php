<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipamentoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\LocatarioController;
use App\Http\Controllers\LocadorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('home');
});

Route::resource('equipamentos', EquipamentoController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('locador', LocadorController::class);
Route::resource('locatario', LocatarioController::class);
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get("/login", [AuthController::class, "ShowFormLogin"])->name("login");
Route::post("/login", [AuthController::class, "Login"]);
Route::get("/cadastrar", [AuthController::class], "ShowFormCadastro");
Route::post("/cadastrar", [AuthController::class], "CadastrarUsuario");

Route::middleware("auth")->group(function (){
    Route::resource('equipamentos', EquipamentoController::class);
    Route::resource('categorias', CategoriaController::class);
    Route::resource('locador', LocadorController::class);
    Route::resource('locatario', LocatarioController::class);
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::post("/logout", [AuthController::class], "Logout");
    Route::get("/inicial", function() { return view("inicial"); });
});