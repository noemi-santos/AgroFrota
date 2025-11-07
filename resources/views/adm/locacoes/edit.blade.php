@extends($layout)

@section('conteudo')

    <h1>Atualizar Locacao</h1>
    <form method="post" action="{{ route('adm.locacao.edit') }}">
        @CSRF
        @METHOD('PATCH')
        <input type="hidden" value="{{ $locacao->id }}" id="id" name="id">

        <div class="mb-3">
            <h3>{{ $equipamento->nome }}</h3>
            <p><strong>Valor por dia:</strong> R$ {{ number_format($equipamento->preco_periodo, 2, ',', '.') }}</p>
        </div>

        <div class="mb-3">
            <label for="data_inicio" class="form-label">data_inicio:</label>
            <input value="{{$locacao->data_inicio}}" type="date" id="data_inicio" name="data_inicio" class="form-control"
                required="">
        </div>
        <div class="mb-3">
            <label for="data_fim" class="form-label">data_fim:</label>
            <input value="{{ $locacao->data_fim }}" type="date" id="data_fim" name="data_fim" class="form-control"
                required="">
        </div>

        <div class="mb-3">
            <h3>Total: R$ <span id="valor_total">0.00</span></h3>
        </div>

        <div class="mb-3">
            <label for="tipo_locacao" class="form-label">tipo_locacao:</label>
            <input type="hidden" id="tipo_locacao" name="tipo_locacao" value="0">
            <input type="checkbox" id="tipo_locacao" name="tipo_locacao" value="1" {{ $locacao->tipo_locacao == "1" ? 'checked' : '' }}>
        </div>
        <div class="mb-3">
            <label for="status_equipamento" class="form-label">status_equipamento:</label>
            <select name="status_equipamento" id="status_equipamento" class="form-select" required>
                <option value="Aguardando" {{ $locacao->status_equipamento == "Aguardando" ? 'selected' : '' }}>
                    Aguardando
                </option>
                <option value="Em Transporte" {{ $locacao->status_equipamento == "Em Transporte" ? 'selected' : '' }}>
                    Em Transporte
                </option>
                <option value="Em Uso" {{ $locacao->status_equipamento == "Em Uso" ? 'selected' : '' }}>
                    Em Uso
                </option>
            </select>
        </div>

        <div class="mb-3">
            <label for="status_pagamento" class="form-label">status_pagamento:</label>
            <select name="status_pagamento" id="status_pagamento" class="form-select" required>
                <option value="Incompleto" {{ $locacao->status_pagamento == "Incompleto" ? 'selected' : '' }}>
                    Incompleto
                </option>
                <option value="Parcial" {{ $locacao->status_pagamento == "Parcial" ? 'selected' : '' }}>
                    Parcial
                </option>
                <option value="Completo" {{ $locacao->status_pagamento == "Completo" ? 'selected' : '' }}>
                    Completo
                </option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <script>
        const valorDia = {{ $equipamento->preco_periodo }};

        function calcularTotal() {
            const inicio = document.getElementById('data_inicio').value;
            const fim = document.getElementById('data_fim').value;
            const totalSpan = document.getElementById('valor_total');

            if (inicio && fim) {
                const dataInicio = new Date(inicio);
                const dataFim = new Date(fim);

                // Difference in milliseconds → days
                const diffTime = dataFim - dataInicio;
                const diffDias = diffTime / (1000 * 60 * 60 * 24);

                if (diffDias >= 0) {
                    const total = (diffDias + 1) * valorDia;
                    totalSpan.textContent = total.toFixed(2);
                } else {
                    totalSpan.textContent = "0.00";
                }
            }
        }

        document.getElementById('data_inicio').addEventListener('change', calcularTotal);
        document.getElementById('data_fim').addEventListener('change', calcularTotal);
    </script>

@endsection