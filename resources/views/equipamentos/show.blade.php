@extends('layout')

@section('conteudo')

<h1>Dados do equipamento</h1>
<form method="post" action="/equipamentos/{{ $equipamento->id }}">
    @CSRF
    @METHOD('DELETE')
    
    <div class="mb-3">
        <label for="nome" class="form-label">Nome:</label>
        <input disabled value="{{$equipamento->nome}}" type="text" id="nome" name="nome" class="form-control" required="">
    </div>
    <div class="mb-3">
        <label for="marca" class="form-label">marca:</label>
        <input disabled value="{{$equipamento->marca}}" type="text" id="marca" name="marca" class="form-control" required="">
    </div>
    <div class="mb-3">
        <label for="modelo" class="form-label">modelo:</label>
        <input disabled value="{{$equipamento->modelo}}" type="text" id="modelo" name="modelo" class="form-control" required="">
    </div>
    <div class="mb-3">
        <label for="ano" class="form-label">ano:</label>
        <input disabled value="{{$equipamento->ano}}" type="text" id="ano" name="ano" class="form-control" required="">
    </div>
    <div class="mb-3">
        <label for="capacidade" class="form-label">capacidade:</label>
        <input disabled value="{{$equipamento->capacidade}}" type="text" id="capacidade" name="capacidade" class="form-control" required="">
    </div>
    <div class="mb-3">
        <label for="preco_periodo" class="form-label">preco_periodo:</label>
        <input disabled value="{{$equipamento->preco_periodo}}" type="text" id="preco_periodo" name="preco_periodo" class="form-control" required="">
    </div>
    <div class="mb-3">
        <label for="disponibilidade_calendario" class="form-label">disponibilidade_calendario:</label>
        <input disabled value="{{$equipamento->disponibilidade_calendario}}" type="text" id="disponibilidade_calendario" name="disponibilidade_calendario" class="form-control" required="">
    </div>
    <div class="mb-3">
        <label for="raio_atendimento" class="form-label">raio_atendimento:</label>
        <input disabled value="{{$equipamento->raio_atendimento}}" type="text" id="raio_atendimento" name="raio_atendimento" class="form-control" required="">
    </div>
    <div class="mb-3">
        <label for="exige_operador_certificado" class="form-label">exige_operador_certificado:</label>
        <input disabled value="{{$equipamento->exige_operador_certificado}}" type="text" id="exige_operador_certificado" name="exige_operador_certificado" class="form-control" required="">
    </div>
    <div class="mb-3">
        <label for="seguro_obrigatorio" class="form-label">seguro_obrigatorio:</label>
        <input disabled value="{{$equipamento->seguro_obrigatorio}}" type="text" id="seguro_obrigatorio" name="seguro_obrigatorio" class="form-control" required="">
    </div>
    <div class="mb-3">
        <label for="caucao_obrigatoria" class="form-label">caucao_obrigatoria:</label>
        <input disabled value="{{$equipamento->caucao_obrigatoria}}" type="text" id="caucao_obrigatoria" name="caucao_obrigatoria" class="form-control" required="">
    </div>
    <div class="mb-3">
        <label for="locador_id" class="form-label">locador_id:</label>
        <input disabled value="{{$equipamento->locador_id}}" type="text" id="locador_id" name="locador_id" class="form-control" required="">
    </div>
    <div class="mb-3">
        <label for="categoria_id" class="form-label">categoria_id:</label>
        <input disabled value="{{$equipamento->categoria_id}}" type="text" id="categoria_id" name="categoria_id" class="form-control" required="">
    </div>
    
    <p>Deseja excluir esse registro?</p>
    <button type="submit" class="btn btn-danger">Sim</button>
    <a href="#" class="btn btn-secondary" onClick="history.back()">
        Não
    </a>
</form>

@endsection