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
            <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Marca</th>
            <th>modelo</th>
            <th>ano</th>
            <th>capacidade</th>
            <th>preco_periodo</th>
            <th>disponibilidade_calendario</th>
            <th>raio_atendimento</th>
            <th>exige_operador_certificado</th>
            <th>seguro_obrigatorio</th>
            <th>caucao_obrigatoria</th>
            <th>locador_id</th>
            <th>categoria_id</th>
            <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($equipamentos as $c)
            <tr>
                <td>{{ $c->id }}</td>
                <td>{{ $c->nome }}</td>
                <td>{{ $c->marca }}</td>
                <td>{{ $c->modelo }}</td>
                <td>{{ $c->ano }}</td>
                <td>{{ $c->capacidade }}</td>
                <td>{{ $c->preco_periodo }}</td>
                <td>{{ $c->disponibilidade_calendario }}</td>
                <td>{{ $c->raio_atendimento }}</td>
                <td>{{ $c->exige_operador_certificado }}</td>
                <td>{{ $c->seguro_obrigatorio }}</td>
                <td>{{ $c->caucao_obrigatoria }}</td>
                <td>{{ $c->locador_id }}</td>
                <td>{{ $c->categoria_id }}</td>
                <td class="d-flex gap-2">
                    <a href="/equipamentos/{{ $c->id }}/edit" class="btn btn-sm btn-warning">Editar</a>
                    <a href="/equipamentos/{{ $c->id }}" class="btn btn-sm btn-info">Consultar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>    

@endsection