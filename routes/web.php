<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipamentoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\LocacaoController;
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

    Route::middleware([NivelAdmMiddleware::class])->group(function () {
        Route::resource('/equipamentos', EquipamentoController::class);
        Route::resource('/categorias', CategoriaController::class);
        Route::get('/adm/users', [AdminController::class, 'ViewUserList'])->name('adm.user.list');
        Route::get('/adm/users/create', [AdminController::class, 'ViewCreateUser'])->name('adm.user.create');
        Route::post('/adm/users/create', [AdminController::class, 'CreateUser'])->name('adm.user.create');
        Route::get('/adm/users/{id}', [AdminController::class, 'ShowUser'])->name('adm.user.show');
        Route::delete('/adm/users/{id}', [AdminController::class, 'UserDelete'])->name('adm.user.show');
        Route::get('/adm/users/{id}/edit', [AdminController::class, 'ViewEditUser'])->name('adm.user.ViewEdit');
        Route::patch('/adm/users/edit', [AdminController::class, 'EditUser'])->name('adm.user.edit');

        Route::get('/adm/locacoes', [AdminController::class, 'ViewLocacaoList'])->name('adm.locacao.list');
        Route::get('/adm/locacoes/{id}', [AdminController::class, 'ShowLocacao'])->name('adm.locacao.show');
        Route::delete('/adm/locacoes/{id}', [AdminController::class, 'LocacaoDelete'])->name('adm.locacao.show');

    });

    Route::middleware([NivelCliMiddleware::class])->group(function () {
        Route::get('home-cli', function () {
            return view("home-cli");
        });
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
        Route::get('/locacoes', [LocacaoController::class, 'index']);
        Route::get('/locacoes/show/{id}', [LocacaoController::class, 'show'])->name('locacoes.show');
        Route::get('/locacoes/create/{id}', [LocacaoController::class, 'create'])->name('locacoes.create');
        Route::get('/locacoes/colab/create/{id}', [LocacaoController::class, 'createLocatarioDaLocacao'])->name('locacoes.showAdd');
        Route::post('/locacoes/colab/create/', [LocacaoController::class, 'storeLocatarioDaLocacao'])->name('locacoes.addColab');
        Route::post('/locacoes/{equipamento}', [LocacaoController::class, 'store'])->name('locacoes.store');
        //Route::get('/locacoes', [HomeController::class, 'index'])->name('home');
        //Route::get('/anuncios', [HomeController::class, 'index'])->name('home');
    });

});