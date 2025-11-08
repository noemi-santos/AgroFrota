@extends($layout)

@section('conteudo')

    <h2>Locacoes</h2>
    @if(session('sucesso'))
        <p class="text-success">{{ session('sucesso') }}</p>
    @endif
    @if(session('erro'))
        <p class="text-danger">{{ session('erro') }}</p>
    @endif
    <div class="table-responsive rounded-3">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Marca</th>
                    <th>Inicio</th>
                    <th>Fim</th>
                    <th>Compartilhada</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Pagamento</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

                @foreach($locacoes as $l)
                    <div>
                        <tr class="align-middle">
                            @foreach ($equipamentos as $e)
                                @if ($e->id == $l->equipamento_id)
                                    <td>
                                        {{ $e->nome }}
                                    </td>
                                    <td>
                                        {{ $e->marca }}
                                    </td>
                                @endif
                            @endforeach

                            <td>{{ $l->data_inicio }}</td>
                            <td>{{ $l->data_fim }}</td>
                            <td>{{ $l->tipo_locacao }}</td>
                            <td>{{ $l->valor_total }}</td>
                            <td>{{ $l->status_equipamento }}</td>
                            <td>{{ $l->status_pagamento }}</td>

                            <td class="text-end">
                                <div class="d-flex flex-wrap justify-content-end gap-2">
                                    <a href="{{ route('locacoes.avaliar', $l->id) }}" class="btn btn-sm btn-warning">Avaliar</a>
                                    <a href="{{ route('locacoes.showAdd', $l->id) }}" class="btn btn-sm btn-warning">ADD</a>
                                    <a href="{{ route('locacoes.show', $l->id) }}" class="btn btn-sm btn-info">Consultar</a>
                                </div>
                            </td>
                        </tr>
                    </div>
                @endforeach
            </tbody>
        </table>

@endsection