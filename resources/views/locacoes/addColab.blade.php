@extends('layouts.layout-cli')

@section('conteudo')

    <h1>Adicionar Colaborador</h1>
    <form method="post" action="{{ route('locacoes.addColab') }}">
        @CSRF

        <input type="hidden" id='locacao_id' name='locacao_id' value="{{ $locacao->id }}">

        <div class="mb-3">
            <label for="id_colab" class="form-label">Selecione o Locatario:</label>
            <select class="form-select" name="id_colab" id="id_colab">
                @foreach($locadores as $l)
                    <option value="{{$l->id}}">{{ $l->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="data_inicio" class="form-label">data_inicio:</label>
            <input type="date" id="data_inicio" name="data_inicio" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="data_fim" class="form-label">data_fim:</label>
            <input type="date" id="data_fim" name="data_fim" class="form-control" required="">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

@endsection