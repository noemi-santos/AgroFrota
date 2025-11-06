@extends('layouts.admin')

@section('conteudo')

    <h1>Alterar categoria</h1>
    <form method="post" action="/categorias/{{ $categoria->id }}">
        @CSRF
        @METHOD('PUT')

        <div class="mb-3">
            <label for="id" class="form-label">ID:</label>
            <input disabled value="{{$categoria->id}}" type="text" id="id" name="id" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="titulo" class="form-label">Categoria:</label>
            <input value="{{$categoria->titulo}}" type="text" id="titulo" name="titulo" class="form-control" required="">
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

@endsection