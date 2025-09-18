@extends('layout')

@section('conteudo')

    <h1>Nova categoria</h1>
    <form method="post" action="/categorias">
        @CSRF

        <div class="mb-3">
            <label for="titulo" class="form-label">Categoria:</label>
            <input type="text" id="titulo" name="titulo" class="form-control" required="">
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

@endsection