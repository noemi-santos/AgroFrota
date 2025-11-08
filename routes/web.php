<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AvaliacaoController;
use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipamentoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\LocacaoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AnuncioController;
use App\Http\Controllers\BuscarController;

use App\Http\Middleware\NivelAdmMiddleware;
use App\Http\Middleware\NivelCliMiddleware;

Route::get('/', [HomeController::class, 'indexPublic'])->name('home-cli');

// Rota pública de busca
//Route::get('/buscar', [BuscarController::class, 'index'])->name('buscar');
Route::get('/anuncios', [AnuncioController::class, 'index'])->name('anuncios.index');

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
    Route::get('/meus-anuncios', [AnuncioController::class, 'meusAnuncios'])
        ->name('anuncios.meus');

    // CRUD de Anúncios (somente logados podem criar, editar, deletar)
    Route::get('/anuncios/create', [AnuncioController::class, 'create'])->name('anuncios.create');
    Route::get('/anunciar', [AnuncioController::class, 'create'])->name('anunciar');
    Route::post('/anuncios', [AnuncioController::class, 'store'])->name('anuncios.store');
    Route::get('/anuncios/{id}/edit', [AnuncioController::class, 'edit'])->name('anuncios.edit');
    Route::put('/anuncios/{id}', [AnuncioController::class, 'update'])->name('anuncios.update');
    Route::delete('/anuncios/{id}', [AnuncioController::class, 'destroy'])->name('anuncios.destroy');


    Route::resource('/equipamentos', EquipamentoController::class);

    Route::middleware([NivelAdmMiddleware::class])->group(function () {
        Route::resource('/categorias', CategoriaController::class);

        Route::get('/adm/users', [AdminController::class, 'ViewUserList'])->name('adm.user.list');
        Route::get('/adm/users/create', [AdminController::class, 'ViewCreateUser'])->name('adm.user.create');
        Route::post('/adm/users/create', [AdminController::class, 'CreateUser'])->name('adm.user.create');
        Route::get('/adm/users/{id}', [AdminController::class, 'ShowUser'])->name('adm.user.show');
        Route::delete('/adm/users/{id}', [AdminController::class, 'UserDelete'])->name('adm.user.show');
        Route::get('/adm/users/{id}/edit', [AdminController::class, 'ViewEditUser'])->name('adm.user.ViewEdit');
        Route::patch('/adm/users/edit', [AdminController::class, 'EditUser'])->name('adm.user.edit');

        Route::get('/adm/locacoes', [AdminController::class, 'ViewLocacaoList'])->name('adm.locacao.list');
        Route::get('/adm/locacoes/create/equipamentos', [AdminController::class, 'ViewCreateLocacaoEquipamentos'])->name('adm.locacao.create.equipamentos');
        Route::get('/adm/locacoes/create/{id}', [AdminController::class, 'ViewCreateLocacao'])->name('adm.locacao.ViewCreate');
        Route::post('/adm/locacoes/create/{id}', [AdminController::class, 'CreateLocacao'])->name('adm.locacao.create');
        Route::get('/adm/locacoes/{id}', [AdminController::class, 'ShowLocacao'])->name('adm.locacao.show');
        Route::delete('/adm/locacoes/{id}', [AdminController::class, 'LocacaoDelete'])->name('adm.locacao.show');
        Route::get('/adm/locacoes/{id}/edit', [AdminController::class, 'ViewEditLocacao'])->name('adm.locacao.ViewEdit');
        Route::patch('/adm/locacoes/edit', [AdminController::class, 'EditLocacao'])->name('adm.locacao.edit');

    });

    Route::middleware([NivelCliMiddleware::class])->group(function () {
        Route::get('home-cli', function () {
            return view("home-cli");
        });

        Route::get('/locacoes', [LocacaoController::class, 'index'])->name('locacoes.index');
        Route::get('/locacoes/show/{id}', [LocacaoController::class, 'show'])->name('locacoes.show');
        Route::get('/locacoes/create/{id}', [LocacaoController::class, 'create'])->name('locacoes.create');
        Route::get('/locacoes/colab/create/{id}', [LocacaoController::class, 'createLocatarioDaLocacao'])->name('locacoes.showAdd');
        Route::post('/locacoes/colab/create/', [LocacaoController::class, 'storeLocatarioDaLocacao'])->name('locacoes.addColab');
        Route::post('/locacoes/{equipamento}', [LocacaoController::class, 'store'])->name('locacoes.store');

        Route::get('/locacoes/avaliar/{id}', [AvaliacaoController::class, 'Create'])->name('locacoes.avaliar');
        Route::post('/locacoes/avaliar/store/', [AvaliacaoController::class, 'Store'])->name('locacoes.avaliar.store');
        //Route::get('/locacoes', [HomeController::class, 'index'])->name('home');
        //Route::get('/anuncios', [HomeController::class, 'index'])->name('home');
    });

});
Route::get('/anuncios/{id}', [AnuncioController::class, 'show'])->name('anuncios.show');