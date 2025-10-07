@extends('layout')

@section('conteudo')

<h2>Locadores</h2>
    @if(session('sucesso'))
        <p class="text-success">{{ session('sucesso') }}</p>
    @endif
    @if(session('erro'))
        <p class="text-danger">{{ session('erro') }}</p>
    @endif
    <a href="/locador/create" class="btn btn-success mb-3">Novo Registro</a>
    <div class="table-responsive rounded-3">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                <th>Nome</th>
                <th class="text-truncate" style="max-width:200px;">Email</th>
                <th class="text-truncate" style="max-width:200px;">Telefone</th>
                <th class="text-truncate" style="max-width:200px;">Endereco</th>
                <th>Documentos Válidos</th>
                <th>Reputação Média</th>
                <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($locador as $c)
                <tr>
                    <td>{{ $c->nome }}</td>
                    <td class="text-truncate" style="max-width:200px;">{{ $c->email }}</td>
                    <td class="text-truncate" style="max-width:200px;">{{ $c->telefone }}</td>
                    <td class="text-truncate" style="max-width:200px;">{{ $c->endereco }}</td>
                    <td>{{ $c->getDocumentosValidadosTextoAttribute() }}</td>
                    <td>{{ $c->reputacao_media }}</td>
                    <td class="text-end">
                    <div class="d-flex flex-wrap justify-content-end gap-2">
                        <a href="/locador/{{ $c->id }}/edit" class="btn btn-sm btn-warning">Editar</a>
                        <a href="/locador/{{ $c->id }}" class="btn btn-sm btn-info">Consultar</a>
                    </div>
                    </td>
                </tr>
            </div>
            @endforeach
        </tbody>
    </table>    

@endsection