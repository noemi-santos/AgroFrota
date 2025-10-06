@extends('layout')

@section('conteudo')

    <h2>Equipamentos</h2>
    @if(session('sucesso'))
        <p class="text-success">{{ session('sucesso') }}</p>
    @endif
    @if(session('erro'))
        <p class="text-danger">{{ session('erro') }}</p>
    @endif
    <a href="/equipamentos/create" class="btn btn-success mb-3">Novo Registro</a>
    <div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Marca</th>
                <th>modelo</th>
                <th>Locador</th>
                <th>Categoria</th>
                <th>Ano</th>
                <th>Capacidade</th>
                <th>Preço/Período</th>
                <th>Disponibilidade</th>
                <th>Raio</th>
                <th>Operador Cert.</th>
                <th>Seguro</th>
                <th>Caução</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($equipamentos as $e)
                <tr class="text-center">
                    <td>{{ $e->id }}</td>
                    <td>{{ $e->nome }}</td>
                    <td>{{ $e->marca }}</td>
                    <td>{{ $e->modelo }}</td>
                    <td>
                        @foreach ($locador as $l)
                            @if ($e->locador_id == $l->id)
                                {{ $l->nome }}
                            @endif
                        @endforeach
                    </td>
                    <td>
                        @foreach ($categorias as $c)
                            @if ($e->categoria_id == $c->id)
                                {{ $c->titulo }}
                            @endif
                        @endforeach
                    </td>
                    <td>{{ $e->ano }}</td>
                    <td>{{ $e->capacidade }}</td>
                    <td>{{ $e->preco_periodo }}</td>
                    <td>{{ $e->disponibilidade_calendario }}</td>
                    <td>{{ $e->raio_atendimento }}</td>
                    <td>
                        @if($e->exige_operador_certificado == 0)
                            <img src="{{ asset('images/xmark.svg') }}" width="20rem">
                        @else
                            <img src="{{ asset('images/checkmark.svg') }}" width="20rem">
                        @endif
                    </td>
                    <td>
                        @if($e->seguro_obrigatorio == 0)
                            <img src="{{ asset('images/xmark.svg') }}" width="20rem">
                        @else
                            <img src="{{ asset('images/checkmark.svg') }}" width="20rem">
                        @endif
                    </td>
                    <td>
                        @if($e->caucao_obrigatoria == 0)
                            <img src="{{ asset('images/xmark.svg') }}" width="20rem">
                        @else
                            <img src="{{ asset('images/checkmark.svg') }}" width="20rem">
                        @endif
                    </td>
                    <td class="d-flex gap-2">
                        <a href="/equipamentos/{{ $e->id }}/edit" class="btn btn-sm btn-warning">Editar</a>
                        <a href="/equipamentos/{{ $e->id }}" class="btn btn-sm btn-info">Consultar</a>
                    </td>
                </tr>
            </div>
            @endforeach
        </tbody>
    </table>

@endsection