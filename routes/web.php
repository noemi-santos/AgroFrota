<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipamentoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\LocatarioController;
use App\Http\Controllers\LocadorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

use App\Http\Middleware\NivelAdmMiddleware;
use App\Http\Middleware\NivelCliMiddleware;


Route::get("/", function () {
    return redirect()->intended("/login");
});

Route::get("/login", [AuthController::class, "ShowFormLogin"])->name("login");
Route::post("/login", [AuthController::class, "Login"]);
Route::get("/cadastrar", [AuthController::class, "ShowFormCadastro"]);
Route::post("/cadastrar", [AuthController::class, "CadastrarUsuario"]);

Route::middleware("auth")->group(function () {

    Route::post("/logout", [AuthController::class, "Logout"]);
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/minhaConta', [ClienteController::class, 'edit']);
    Route::patch('/minhaConta', [ClienteController::class, 'updateCredentials']);

    Route::middleware([NivelAdmMiddleware::class])->group(function () {
        Route::get('/home-adm', function () {
            return view("home-adm");
        });
        Route::resource('equipamentos', EquipamentoController::class);
        Route::resource('categorias', CategoriaController::class);
    });

    Route::middleware([NivelCliMiddleware::class])->group(function () {
        Route::get('/home-cli', function () {
            return view("home-cli");
        });
        Route::get('/buscar', [EquipamentoController::class, 'index']);
        Route::get('/anunciar', [EquipamentoController::class, 'create']);
        //Route::get('/locacoes', [HomeController::class, 'index'])->name('home');
        //Route::get('/anuncios', [HomeController::class, 'index'])->name('home');
    });

});