@extends('layout')

@section('conteudo')

<h2>Locatários</h2>
    @if(session('sucesso'))
        <p class="text-success">{{ session('sucesso') }}</p>
    @endif
    @if(session('erro'))
        <p class="text-danger">{{ session('erro') }}</p>
    @endif
    <a href="/locatario/create" class="btn btn-success mb-3">Novo Registro</a>

    <div class="table-responsive rounded-3">
        <table class="table table-hover table-striped align-middle">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th class="text-truncate" style="max-width:200px;" >Endereço</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($locatario as $c)
                <tr>
                    <td>{{ $c->nome }}</td>
                    <td>{{ $c->email }}</td>
                    <td>{{ $c->telefone }}</td>
                    <td class="text-truncate" style="max-width:200px;">{{ $c->endereco }}</td>
                    <td class="text-end">
                        <div class="d-flex flex-wrap justify-content-end gap-2">
                            <a href="/locatario/{{ $c->id }}/edit" class="btn btn-sm btn-warning">Editar</a>
                            <a href="/locatario/{{ $c->id }}" class="btn btn-sm btn-info">Consultar</a>
                        </div>
                    </td>
                    </tr>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>  

@endsection