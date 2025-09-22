@extends('layout')

@section('conteudo')

    <h1>Nova locatário</h1>
    <form method="post" action="/locatario">
        @CSRF
        <div class="mb-3">
            <label for="nome" class="form-label">nome</label>
            <input type="text" id="nome" name="nome" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">email</label>
            <input type="email" id="email" name="email" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="senha" class="form-label">senha</label>
            <input type="password" id="senha" name="senha" class="form-control" required="">
        </div><div class="mb-3">
            <label for="telefone" class="form-label">telefone</label>
            <input type="number" id="telefone" name="telefone" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="endereco" class="form-label">endereço</label>
            <input type="text" id="endereco" name="endereco" class="form-control" required="">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

@endsection