@extends('layout')

@section('conteudo')

<div class="text-center my-5">
    <h1 class="display-4 fw-bold">Bem-vindo ao AgroFrota</h1>
    <p class="lead text-muted">Gerencie categorias, equipamentos, locadores e locatários de forma prática e rápida.</p>
</div>

<div class="row g-4">
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card shadow-sm h-100 border-0 rounded-3 hover-scale">
            <div class="card-body text-center">
                <h5 class="card-title fw-semibold">Categorias</h5>
                <p class="card-text text-muted">Gerencie todas as categorias disponíveis.</p>
                <a href="/categorias" class="btn btn-primary btn-sm btn-block">Abrir</a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card shadow-sm h-100 border-0 rounded-3 hover-scale">
            <div class="card-body text-center">
                <h5 class="card-title fw-semibold">Equipamentos</h5>
                <p class="card-text text-muted">Visualize, adicione ou edite equipamentos.</p>
                <a href="/equipamentos" class="btn btn-primary btn-sm btn-block">Abrir</a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card shadow-sm h-100 border-0 rounded-3 hover-scale">
            <div class="card-body text-center">
                <h5 class="card-title fw-semibold">Locadores</h5>
                <p class="card-text text-muted">Gerencie informações dos locadores.</p>
                <a href="/locador" class="btn btn-primary btn-sm btn-block">Abrir</a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card shadow-sm h-100 border-0 rounded-3 hover-scale">
            <div class="card-body text-center">
                <h5 class="card-title fw-semibold">Locatários</h5>
                <p class="card-text text-muted">Visualize e gerencie os locatários.</p>
                <a href="/locatario" class="btn btn-primary btn-sm btn-block">Abrir</a>
            </div>
        </div>
    </div>
</div>

@endsection


<!-- /* efeito leve ao passar o mouse */
.hover-scale {
    transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
}

.hover-scale:hover {
    transform: translateY(-5px);
    box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
}

/* botões ocupando a largura em telas pequenas */
@media (max-width: 576px) {
    .btn-block {
        display: block;
        width: 100%;
    }
}
} -->