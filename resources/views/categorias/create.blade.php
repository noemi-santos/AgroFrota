@extends('layout')

@section('conteudo')

<div class="card shadow-sm p-4 mx-auto" style="max-width: 500px;">
    <h2 class="mb-4 text-center">Nova Categoria</h2>

    <form method="post" action="/categorias">
        @csrf

        <div class="mb-3">
            <label for="titulo" class="form-label">Categoria:</label>
            <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Digite o nome da categoria" required>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success px-4">Enviar</button>
        </div>
    </form>
</div>

@endsection
