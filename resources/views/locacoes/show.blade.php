@extends($layout)

@section('conteudo')

<section class="container card">
    <h1>Detalhes da Locação</h1>
    <h2>{{ $equipamento->nome }}</h2>

    <div class="row card-body mt-4">
        <div class="col-md-6">
            <h3>Informações do Equipamento</h3>

            <div class="mb-3">
                <p><strong>Marca:</strong> {{ $equipamento->marca }}</p>
            </div>

            <div class="mb-3">
                <p><strong>Modelo:</strong> {{ $equipamento->modelo }}</p>
            </div>

            <div class="mb-3">
                <p><strong>Ano:</strong> {{ $equipamento->ano }}</p>
            </div>

            <div class="mb-3">
                <p><strong>Capacidade:</strong> {{ $equipamento->capacidade }}</p>
            </div>

            <div class="mb-3">
                <p><strong>Valor por período:</strong> R$ {{ number_format($equipamento->preco_periodo, 2, ',', '.') }}</p>
            </div>

            <div class="mb-3">
                <p><strong>Exige operador certificado:</strong> {{ $equipamento->exige_operador_certificado ? 'Sim' : 'Não' }}</p>
            </div>

            <div class="mb-3">
                <p><strong>Seguro obrigatório:</strong> {{ $equipamento->seguro_obrigatorio ? 'Sim' : 'Não' }}</p>
            </div>

            <div class="mb-3">
                <p><strong>Caução obrigatória:</strong> {{ $equipamento->caucao_obrigatoria ? 'Sim' : 'Não' }}</p>
            </div>

            @if($equipamento->image_path)
            <div class="mb-3">
                <p><strong>Imagem:</strong></p>
                <img src="{{ $equipamento->image_path }}" alt="{{ $equipamento->nome }}" class="img-fluid" style="max-width: 300px;">
            </div>
            @endif
        </div>

        <div class="col-md-6">
            <h3>Informações da Locação</h3>

            <div class="mb-3">
                <p><strong>Data de início:</strong> {{ \Carbon\Carbon::parse($locacao->data_inicio)->format('d/m/Y') }}</p>
            </div>

            <div class="mb-3">
                <p><strong>Data de fim:</strong> {{ \Carbon\Carbon::parse($locacao->data_fim)->format('d/m/Y') }}</p>
            </div>

            <div class="mb-3">
                <p><strong>Status do equipamento:</strong> {{ $locacao->status_equipamento }}</p>
            </div>

            <div class="mb-3">
                <p><strong>Tipo de locação:</strong> {{ $locacao->tipo_locacao }}</p>
            </div>

            <div class="mb-3">
                <p><strong>Valor total:</strong> R$ {{ number_format($locacao->valor_total, 2, ',', '.') }}</p>
            </div>

            <div class="mb-3">
                <p><strong>Status do pagamento:</strong>
                    <span class="badge {{ $locacao->status_pagamento == 'pago' ? 'bg-success' : ($locacao->status_pagamento == 'pendente' ? 'bg-warning' : 'bg-danger') }}">
                        {{ ucfirst($locacao->status_pagamento) }}
                    </span>
                </p>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('locacoes.index') }}" class="btn btn-secondary">Voltar</a>
    </div>
</section>

@endsection