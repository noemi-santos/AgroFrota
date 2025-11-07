@extends($layout)

@section('conteudo')

    <h1>Detalhes do Anúncio</h1>

    <div class="card mt-4">
        <div class="card-body">
            <h3 class="card-title">{{ $anuncio->nome }}</h3>

            <p><strong>Equipamento:</strong> 
                {{ $anuncio->equipamento->nome }} - 
                {{ $anuncio->equipamento->marca }} {{ $anuncio->equipamento->modelo }} ({{ $anuncio->equipamento->ano }})
            </p>

            <p><strong>Categoria:</strong> 
                {{ $anuncio->equipamento->categoria->nome ?? 'Não informada' }}
            </p>

            <p><strong>Valor da Diária:</strong> 
                R$ {{ number_format($anuncio->valor_diaria, 2, ',', '.') }}
            </p>

            <p><strong>Região:</strong> 
                {{ $anuncio->regiao }}
            </p>

            <p><strong>Locador:</strong> 
                {{ $anuncio->equipamento->locador->nome ?? 'Não informado' }}
            </p>

            <p><strong>Criado em:</strong> 
                {{ $anuncio->created_at->format('d/m/Y H:i') }}
            </p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('anuncios.edit', $anuncio->id) }}" class="btn btn-warning">Editar</a>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Voltar</a>
    </div>

@endsection
