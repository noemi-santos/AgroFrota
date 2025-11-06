@extends('layouts.admin')

@section('conteudo')

    <h1>Alterar equipamento</h1>
    <form method="post" action="/equipamentos/{{ $equipamento->id }}">
        @CSRF
        @METHOD('PUT')

        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input value="{{$equipamento->nome}}" type="text" id="nome" name="nome" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="marca" class="form-label">Marca:</label>
            <input value="{{$equipamento->marca}}" type="text" id="marca" name="marca" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="modelo" class="form-label">Modelo:</label>
            <input value="{{$equipamento->modelo}}" type="text" id="modelo" name="modelo" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="ano" class="form-label">Ano:</label>
            <input value="{{$equipamento->ano}}" type="number" id="ano" name="ano" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="capacidade" class="form-label">Capacidade:</label>
            <input value="{{$equipamento->capacidade}}" type="text" id="capacidade" name="capacidade" class="form-control"
                required="">
        </div>
        <div class="mb-3">
            <label for="preco_periodo" class="form-label">Preco do Periodo:</label>
            <input value="{{$equipamento->preco_periodo}}" type="number" id="preco_periodo" name="preco_periodo"
                class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="disponibilidade_calendario" class="form-label">Disponibilidade Calendario:</label>
            <input value="{{$equipamento->disponibilidade_calendario}}" type="text" id="disponibilidade_calendario"
                name="disponibilidade_calendario" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="raio_atendimento" class="form-label">Raio de Atendimento (km):</label>
            <input value="{{$equipamento->raio_atendimento}}" type="number" id="raio_atendimento" name="raio_atendimento"
                class="form-control" required="">
        </div>

        <div class="mb-3">
            <input type="hidden" id="hidden_certificado" name="exige_operador_certificado" value="0">
            <input type="checkbox" id="exige_operador_certificado" name="exige_operador_certificado" value="1"
            @if ($equipamento->exige_operador_certificado == 1)
            checked            
            @endif
            >
            <label for="exige_operador_certificado" class="form-label">Operador Certificado</label>
        </div>
        <div class="mb-3">
            <input type="hidden" id="hidden_seguro" name="seguro_obrigatorio" value="0">
            <input type="checkbox" id="seguro_obrigatorio" name="seguro_obrigatorio" value="1"
            @if ($equipamento->seguro_obrigatorio == 1)
            checked            
            @endif
            >
            <label for="seguro_obrigatorio" class="form-label">Seguro Obrigatório</label>
        </div>
        <div class="mb-3">
            <input type="hidden" id="hidden_caucao" name="caucao_obrigatoria" value="0">
            <input type="checkbox" id="caucao_obrigatoria" name="caucao_obrigatoria" value="1" 
            @if ($equipamento->caucao_obrigatoria == 1)
            checked            
            @endif
            >
            <label for="caucao_obrigatoria" class="form-label">Caução Obrigatória</label>
        </div>

        <div class="mb-3">
            <label for="locador_id" class="form-label">Selecione o Locador:</label>
            <select class="form-select" name="locador_id" id="locador_id">
                @foreach($locador as $l)
                    @if ($equipamento->locador_id == $l->id)
                        <option selected value="{{$l->id}}">{{ $l->nome }}</option>
                    @else
                        <option value="{{$l->id}}">{{ $l->nome }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        
        <div class="mb-3">
            <label for="categoria_id" class="form-label">Selecione a Categoria:</label>
            <select class="form-select" name="categoria_id" id="categoria_id">
                @foreach($categorias as $c)
                    @if ($equipamento->categoria_id == $c->id)
                        <option selected value="{{$c->id}}">{{ $c->titulo }}</option>
                    @else
                        <option value="{{$c->id}}">{{ $c->titulo }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

@endsection