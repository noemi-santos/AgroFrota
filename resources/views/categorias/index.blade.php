@extends('layout')

@section('conteudo')

<h2>Categorias</h2>
    @if(session('sucesso'))
        <p class="text-success">{{ session('sucesso') }}</p>
    @endif
    @if(session('erro'))
        <p class="text-danger">{{ session('erro') }}</p>
    @endif
    <a href="/categorias/create" class="btn btn-success mb-3">Novo Registro</a>
    <div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
            <th>ID</th>
            <th>Categoria</th>
            <th >Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $c)
            <tr>
                <td>{{ $c->id }}</td>
                <td>{{ $c->titulo }}</td>
                <td class="d-flex gap-2">
                    <a href="/categorias/{{ $c->id }}/edit" class="btn btn-sm btn-warning">Editar</a>
                    <a href="/categorias/{{ $c->id }}" class="btn btn-sm btn-info">Consultar</a>
                </td>
            </tr>
        </div>
            @endforeach
        </tbody>
    </table>    

@endsection