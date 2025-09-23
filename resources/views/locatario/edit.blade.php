@extends('layout')

@section('conteudo')

    <h1>Alterar locatário</h1>
    <form method="post" action="/locatario/{{ $locatario->id }}">
        @CSRF
        @METHOD('PUT')

        <div class="mb-3">
            <label for="nome" class="form-label">nome</label>
            <input value="{{$locatario->nome}}" type="text" id="nome" name="nome" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">email</label>
            <input value="{{$locatario->email}}" type="email" id="email" name="email" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="senha" class="form-label">senha</label>
            <input value="{{$locatario->senha}}" type="password" id="senha" name="senha" class="form-control" required="">
        </div><div class="mb-3">
            <label for="telefone" class="form-label">telefone</label>
            <input value="{{$locatario->telefone}}"type="number" id="telefone" name="telefone" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="endereco" class="form-label">endereço</label>
            <input value="{{$locatario->endereco}}"type="text" id="endereco" name="endereco" class="form-control" required="">
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

@endsection