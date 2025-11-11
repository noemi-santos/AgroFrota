@extends($layout)

@section('conteudo')

    <h1>Dados da Locação</h1>
    <form method="post" action="">
        @CSRF
        <div class="mb-3">
            <label class="form-label">{{ $equipamento->nome }}</label>
        </div>
        <div class="mb-3">
            <label class="form-label">{{ $equipamento->marca }}</label>
        </div>
        <div class="mb-3">
            <label class="form-label">{{ $equipamento->modelo }}</label>
        </div>
        <div class="mb-3">
            <label class="form-label">{{ $equipamento->image_path }}</label>
        </div>
        <div class="mb-3">
            <label class="form-label">{{ $equipamento->ano }}</label>
        </div>
        <div class="mb-3">
            <label class="form-label">{{ $equipamento->capacidade }}</label>
        </div>
        <div class="mb-3">
            <label class="form-label">{{ $equipamento->preco_periodo }}</label>
        </div>
        <div class="mb-3">
            <label class="form-label">{{ $equipamento->exige_operador_certificado }}</label>
        </div>
        <div class="mb-3">
            <label class="form-label">{{ $equipamento->seguro_obrigatorio }}</label>
        </div>
        <div class="mb-3">
            <label class="form-label">{{ $equipamento->caucao_obrigatoria }}</label>
        </div>
        <div class="mb-3">
            <label class="form-label">{{ $locacao->data_inicio }}</label>
        </div>
        <div class="mb-3">
            <label class="form-label">{{ $locacao->data_fim }}</label>
        </div>
        <div class="mb-3">
            <label class="form-label">{{ $locacao->status_equipamento }}</label>
        </div>
        <div class="mb-3">
            <label class="form-label">{{ $locacao->tipo_locacao }}</label>
        </div>
        <div class="mb-3">
            <label class="form-label">{{ $locacao->valor_total }}</label>
        </div>
        <div class="mb-3">
            <label class="form-label">{{ $locacao->status_pagamento }}</label>
        </div>
    </form>

@endsection