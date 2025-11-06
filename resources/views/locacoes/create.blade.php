@extends('layouts.layout-cli')

@section('conteudo')

    <h1>Nova Locacao</h1>
    <form method="post" action="/locacoes" enctype="multipart/form-data">
        @CSRF

        <div class="mb-3">
            <label for="equipamento_id" class="form-label">{{ $equipamento->nome }}</label>
            <input type="hidden" id="equipamento_id" name="equipamento_id" value="{{$equipamento->id}}">
        </div>

        <div class="mb-3">
            <label for="data_inicio" class="form-label">data_inicio:</label>
            <input type="date" id="data_inicio" name="data_inicio" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="data_fim" class="form-label">data_fim:</label>
            <input type="date" id="data_fim" name="data_fim" class="form-control" required="">
        </div>
        <div class="mb-3">
            <input type="hidden" id="hidden_tipo" name="tipo_locacao" value="0">
            <input type="checkbox" id="tipo_locacao" name="tipo_locacao" value="1" class="form-control">
            <label for="tipo_locacao" class="form-label">tipo_locacao:</label>
        </div>
        <div class="mb-3">
            <label for="valor_total" class="form-label">valor_total:</label>
            <input type="number" id="valor_total" name="valor_total" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="status_equipamento" class="form-label">status_equipamento:</label>
            <input type="text" id="status_equipamento" name="status_equipamento" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="status_pagamento" class="form-label">status_pagamento:</label>
            <input type="text" id="status_pagamento" name="status_pagamento" class="form-control" required="">
        </div>


        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

@endsection