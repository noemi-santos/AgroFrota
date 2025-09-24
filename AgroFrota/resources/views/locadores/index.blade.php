@extends('layout')

@section('conteudo')

    
<h2>Locadores</h2>
    @if(session('sucesso'))
        <p class="text-success">{{ session('sucesso') }}</p>
    @endif

    @if(session('erro'))
        <p class="text-danger">{{ session('erro') }}</p>
    @endif

    <a href="/locadores/create" class="btn btn-success mb-3">Novo locador</a>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Senha</th>
            <th>Telefone</th>
            <th>Endereço</th>
            <th>CNPJ/CPF</th>
            <th>Documentos Validados</th>
            <th>Reputação Média</th>
            <th>Ações</th>
            </tr>
        </thead>
    <tbody>   
        @foreach($locadores as $ld)    
        <tr>
            <td>{{ $ld->id }}</td>
            <td>{{ $ld->nome }}</td>
            <td>{{ $ld->email }}</td>
            <td>{{ $ld->senha }}</td>
            <td>{{ $ld->telefone }}</td>
            <td>{{ $ld->endereco }}</td>
            <td>{{ $ld->ecnpj_cpf }}</td>
            <td>{{ $ld->documentos }}</td>
            <td>{{ $ld->reputacao }}</td>
            <td class="d-flex gap-2">
            <a href="/locadores/{{ $c->id }}/edit" class="btn btn-sm btn-warning">Editar</a>
            <a href="/locadores/{{ $c->id }}" class="btn btn-sm btn-info">Consultar</a>
            </td>
        </tr>
        @endforeach        
    </tbody>
</table>
        

@endsection