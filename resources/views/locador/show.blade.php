@extends('layout')

@section('conteudo')

<h1>Dados do Locador</h1>
<form method="post" action="/locador/{{ $locador->id }}">
    @CSRF
    @METHOD('DELETE')
    
        <div class="mb-3">
            <label for="nome" class="form-label">nome</label>
            <input disabled value="{{$locador->nome}}" type="text" id="nome" name="nome" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">email</label>
            <input disabled value="{{$locador->email}}" type="email" id="email" name="email" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="senha" class="form-label">senha</label>
            <input disabled value="{{$locador->senha}}" type="password" id="senha" name="senha" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="telefone" class="form-label">telefone</label>
            <input disabled value="{{$locador->telefone}}" type="tel" id="telefone" name="telefone" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="endereco" class="form-label">endereço</label>
            <input disabled value="{{$locador->endereco}}" type="text" id="endereco" name="endereco" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="cpf_cnpj" class="form-label">CPF ou CNPJ</label>
            <input disabled value="{{$locador->cnpj_cpf}}" type="text" id="cnpj_cpf" name="cnpj_cpf" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="documentos_validados" class="form-label">Documentos válidos</label>
            <select disabled value="{{$locador->documentos_validados}}" name="documentos_validados" id="documentos_validados" class="form-control" required="">
                <option value="1" {{ $locador->documentos_validados ? 'selected' : '' }}>Sim</option>
                <option value="0" {{ !$locador->documentos_validados ? 'selected' : '' }}>Não</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="reputacao_media" class="form-label">Reputação Média</label>
            <select disabled value="{{$locador->reputacao_media}}"  id="reputacao_media" name="reputacao_media" class="form-select" required="">
                < @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}" {{ $locador->reputacao_media == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
        </div>

        <div class="mb-3">
            <p>Deseja excluir esse registro?</p>
            <button type="submit" class="btn btn-danger">Sim</button>
            <a href="#" class="btn btn-secondary" onClick="history.back()">
                Não
            </a>
        </div>

</form>

@endsection