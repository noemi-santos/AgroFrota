@extends('layout')

@section('conteudo')

    <h1>Novo equipamento</h1>
    <form method="post" action="/equipamentos">
        @CSRF

        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="marca" class="form-label">marca:</label>
            <input type="text" id="marca" name="marca" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="modelo" class="form-label">modelo:</label>
            <input type="text" id="modelo" name="modelo" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="ano" class="form-label">ano:</label>
            <input type="text" id="ano" name="ano" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="capacidade" class="form-label">capacidade:</label>
            <input type="text" id="capacidade" name="capacidade" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="preco_periodo" class="form-label">preco_periodo:</label>
            <input type="text" id="preco_periodo" name="preco_periodo" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="disponibilidade_calendario" class="form-label">disponibilidade_calendario:</label>
            <input type="text" id="disponibilidade_calendario" name="disponibilidade_calendario" class="form-control"
                required="">
        </div>
        <div class="mb-3">
            <label for="raio_atendimento" class="form-label">raio_atendimento:</label>
            <input type="text" id="raio_atendimento" name="raio_atendimento" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="exige_operador_certificado" class="form-label">exige_operador_certificado:</label>
            <input type="text" id="exige_operador_certificado" name="exige_operador_certificado" class="form-control"
                required="">
        </div>
        <div class="mb-3">
            <label for="seguro_obrigatorio" class="form-label">seguro_obrigatorio:</label>
            <input type="text" id="seguro_obrigatorio" name="seguro_obrigatorio" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="caucao_obrigatoria" class="form-label">caucao_obrigatoria:</label>
            <input type="text" id="caucao_obrigatoria" name="caucao_obrigatoria" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="locador_id" class="form-label">Selecione o locador:</label>
            <select class="form-select" name="locador_id" id="locador_id">
                @foreach($locador as $c)
                    <option value="{{$c->id}}">{{ $c->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="categoria_id" class="form-label">Selecione a categoria:</label>
            <select class="form-select" name="categoria_id" id="categoria_id">
                @foreach($categorias as $c)
                    <option value="{{$c->id}}">{{ $c->titulo }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

@endsection