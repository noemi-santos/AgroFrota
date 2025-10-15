@extends('layout')

@section('conteudo')

<div class="text-center my-5">
    <h1 class="display-4 fw-bold">Bem-vindo ao AgroFrota - Admin</h1>
    <h5 class="lead text-muted"><strong>Gerencie categorias, equipamentos, locadores e locatários de forma prática e rápida.</strong></h5>
</div>

<div class="container mt-5"> <!-- Adicionei mt-5 para espaçar abaixo do título -->
    <div class="row g-4">
 

        <!-- Card Categorias -->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card-body shadow-sm border-0 rounded-3">
                    <div class="card-body p-3 text-center">
                        <h5 class="card-title fw-semibold mb-3">Categorias</h5>
                        <p class="card-text text-muted">Gerencie todas as categorias disponíveis.</p>
                        <a href="/categorias" class="btn btn-primary btn-sm w-100">Abrir</a>
                    </div>
                </div>
            </div>

        <!-- Card Equipamentos -->
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card-body shadow-sm border-0 rounded-3">
                <div class="card-body p-3 text-center">
                    <h5 class="card-title fw-semibold mb-3">Equipamentos</h5>
                    <p class="card-text text-muted">Visualize, adicione ou edite equipamentos.</p>
                    <a href="/equipamentos" class="btn btn-primary btn-sm w-100">Abrir</a>
                </div>
            </div>
        </div>

        <!-- Card Locadores -->
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card-body shadow-sm border-0 rounded-3">
                <div class="card-body p-3 text-center">
                    <h5 class="card-title fw-semibold mb-3">Locadores</h5>
                    <p class="card-text text-muted">Gerencie informações dos locadores.</p>
                    <a href="/locador" class="btn btn-primary btn-sm w-100">Abrir</a>
                </div>
            </div>
        </div>

        <!-- Card Locatários -->
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card-body shadow-sm border-0 rounded-3">
                <div class="card-body p-3 text-center">
                    <h5 class="card-title fw-semibold mb-3">Locatários</h5>
                    <p class="card-text text-muted">Gerencie informações dos locatários.</p>
                    <a href="/locatario" class="btn btn-primary btn-sm w-100">Abrir</a>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection





