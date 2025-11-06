<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipamentoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\LocatarioController;
use App\Http\Controllers\LocadorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AnuncioController;

use App\Http\Middleware\NivelAdmMiddleware;
use App\Http\Middleware\NivelCliMiddleware;

Route::get('/', [HomeController::class, 'indexPublic'])->name('home-cli');


Route::get("/login", [AuthController::class, "ShowFormLogin"])->name("login");
Route::post("/login", [AuthController::class, "Login"]);

Route::get("/cadastrar", [AuthController::class, "ShowFormCadastro"]);
Route::post("/cadastrar", [AuthController::class, "CadastrarUsuario"]);

Route::middleware("auth")->group(function () {

    // criar aqui a rota do /anunciar
    Route::post("/logout", [AuthController::class, "Logout"]);
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/minhaConta', [ClienteController::class, 'edit']);
    Route::patch('/minhaConta', [ClienteController::class, 'updateCredentials']);

    // Rotas comuns a ADM e CLI
    Route::resource('/equipamentos', EquipamentoController::class);

    // Rotas exclusivas de ADM
    Route::middleware([NivelAdmMiddleware::class])->group(function () {
        Route::resource('/categorias', CategoriaController::class);
    });

    // Rotas exclusivas de CLI
    Route::middleware([NivelCliMiddleware::class])->group(function () {
        Route::get('/buscar', [EquipamentoController::class, 'index']);
        Route::get('/anunciar', [EquipamentoController::class, 'create']);
        // Rotas para Anúncios (formulário simples)
        Route::get('/anuncios/create', [AnuncioController::class, 'create'])->name('anuncios.create');
        Route::post('/anuncios', [AnuncioController::class, 'store'])->name('anuncios.store');
        // Rota simples/boilerplate de exemplo para 'anunciar'
        Route::get('/anunciar-simples', function () {
            return view('anunciar');
        })->name('anunciar.simples');

        Route::post('/anunciar-simples', function (\Illuminate\Http\Request $request) {
            $request->validate([
                'titulo' => 'required|string|max:255',
                'descricao' => 'nullable|string',
                'preco' => 'nullable|numeric'
            ]);

            // Aqui você integraria com o Model/DB. Por ora apenas simula sucesso.
            return redirect()->back()->with('sucesso', 'Anúncio (simulado) enviado!');
        });
        //Route::get('/locacoes', [HomeController::class, 'index'])->name('home');
        //Route::get('/anuncios', [HomeController::class, 'index'])->name('home');
    });

});