@extends('layouts.default')

@section('conteudo')

    <h1>Criar Anúncio (Simples)</h1>

    @if(session('sucesso'))
        <div class="alert alert-success">{{ session('sucesso') }}</div>
    @endif

    @if(session('erro'))
        <div class="alert alert-danger">{{ session('erro') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ route('anuncios.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Anúncio</label>
            <input type="text" id="nome" name="nome" class="form-control" value="{{ old('nome') }}" required>
        </div>

        <div class="mb-3">
            <label for="equipamento_id" class="form-label">Equipamento</label>
            <select name="equipamento_id" id="equipamento_id" class="form-select" required>
                <option value="">Selecione um equipamento</option>
                @foreach($equipamentos as $equip)
                    <option value="{{ $equip->id }}" {{ old('equipamento_id') == $equip->id ? 'selected' : '' }}>
                        {{ $equip->nome }} - {{ $equip->marca }} {{ $equip->modelo }} ({{ $equip->ano }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="valor_diaria" class="form-label">Valor da Diária</label>
            <input type="number" step="0.01" id="valor_diaria" name="valor_diaria" class="form-control" value="{{ old('valor_diaria') }}" required>
        </div>

        <div class="mb-3">
            <label for="regiao" class="form-label">Região</label>
            <input type="text" id="regiao" name="regiao" class="form-control" value="{{ old('regiao') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

@endsection
