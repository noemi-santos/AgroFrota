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
    <table class="table table-hover table-striped">
        <thead>
            <tr >
                <th>Categoria</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Locador</th>
                <th class="text-center">Operador Cert.</th>
                <th class="text-center">Seguro</th>
                <th class="text-center">Caução</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($equipamentos as $e)
                <tr class="align-middle">
                    <td>
                        @foreach ($categorias as $c)
                        @if ($e->categoria_id == $c->id)
                        {{ $c->titulo }}
                        @endif
                        @endforeach
                    </td>
                    <td>{{ $e->nome }}</td>
                    
                    <td>{{ $e->preco_periodo }}</td>
                    <td>
                        @foreach ($locador as $l)
                            @if ($e->locador_id == $l->id)
                                {{ $l->nome }}
                            @endif
                        @endforeach
                    </td>
                    <td class="text-center">
                        @if($e->exige_operador_certificado == 0)
                            <img src="{{ asset('images/xmark.svg') }}" width="20rem">
                        @else
                            <img src="{{ asset('images/checkmark.svg') }}" width="20rem">
                        @endif
                    </td>
                    <td class="text-center">
                        @if($e->seguro_obrigatorio == 0)
                            <img src="{{ asset('images/xmark.svg') }}" width="20rem">
                        @else
                            <img src="{{ asset('images/checkmark.svg') }}" width="20rem">
                        @endif
                    </td>
                    <td class="text-center">
                        @if($e->caucao_obrigatoria == 0)
                            <img src="{{ asset('images/xmark.svg') }}" width="20rem">
                        @else
                            <img src="{{ asset('images/checkmark.svg') }}" width="20rem">
                        @endif
                    </td>
                    <td >
                        <div class="btn-group">
                            <a href="/equipamentos/{{ $e->id }}/edit" class="btn btn-sm btn-warning">Editar</a>
                            <a href="/equipamentos/{{ $e->id }}" class="btn btn-sm btn-info">Consultar</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection