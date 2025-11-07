@extends($layout)

@section('conteudo')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Buscar Equipamentos</h4>
                </div>

                <div class="card-body">
                    <!-- Formulário de Busca -->
                    <form action="{{ route('buscar') }}" method="GET" class="mb-4">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="termo" class="form-label">Nome</label>
                                    <input type="text" class="form-control" id="termo" name="termo" 
                                           placeholder="Digite o que procura..." value="{{ request('termo') }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="categoria" class="form-label">Categoria</label>
                                    <select class="form-select" id="categoria" name="categoria">
                                        <option value="">Todas as Categorias</option>
                                        @foreach($categorias as $categoria)
                                            <option value="{{ $categoria->id }}" 
                                                {{ request('categoria') == $categoria->id ? 'selected' : '' }}>
                                                {{ $categoria->titulo }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="bi bi-search"></i> Buscar
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Resultados da Busca -->
                    @if(request()->has('termo') || request()->has('categoria'))
                        <h5 class="mb-3">Resultados da busca</h5>
                    @endif

                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        @forelse($equipamentos as $equipamento)
                            <div class="col">
                                <div class="card h-100">
                                    @if($equipamento->image_path)
                                        <img src="{{ asset('storage/' . $equipamento->image_path) }}" 
                                             class="card-img-top" alt="{{ $equipamento->name }}">
                                    @endif
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $equipamento->name }}</h5>
                                        <p class="card-text">
                                            <strong>Categoria:</strong> {{ optional($equipamento->categoria)->name }}<br>
                                            <strong>Valor:</strong> R$ {{ number_format($equipamento->valor, 2, ',', '.') }}
                                        </p>
                                        <a href="{{ route('equipamentos.show', $equipamento->id) }}" 
                                           class="btn btn-primary">Ver Detalhes</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="alert alert-info">
                                    Nenhum equipamento encontrado com os critérios informados.
                                </div>
                            </div>
                        @endforelse
                    </div>

                    <!-- Paginação -->
                    <div class="mt-4">
                        {{ $equipamentos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection