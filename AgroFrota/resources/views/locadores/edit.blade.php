@extends ('layout')

@section('conteudo')

<h1>Alterar locador</h1>
<form method="post" action="/locadores/{{ $locador->id }}">
    @CSRF 
    @METHOD('PUT')
    <div class="mb-3">
        <label for="nome" class="form-label">Informe o nome do locador:</label>
        <input value= "{{$locador->nome}}" type="text" id="nome" name="nome" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Informe o e-mail do locador:</label>
        <input value= "{{$locador->email}}" type="email" id="email" name="email" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="senha" class="form-label">Informe a senha:</label>
        <input value= "{{$locador->senha}}"type="password" id="senha" name="senha" class="form-control" required="">
    </div>
    
    <div class="mb-3">
        <label for="telefone" class="form-label">Informe o telefone:</label>
        <input value= "{{$locador->telefone}}" type="text" id="telefone" name="telefone" class="form-control" required="">
    </div>
    
    <div class="mb-3">
        <label for="endereco" class="form-label">Informe o endereço:</label>
        <input value= "{{$locador->endereco}}" type="text" id="endereco" name="endereco" class="form-control" required="">
    </div>
    
    <div class="mb-3">
        <label for="cnpj_cpf" class="form-label">Informe o CNPJ/CPF:</label>
        <input value= "{{$locador->cnpj_cpf}}"type="text" id="cnpj_cpf" name="cnpj_cpf" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="documentos" class="form-label">Documentos Validados:</label>
        <input value= "{{$locador->documentos}}" type="text" id="documentos" name="documentos" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="reputacao" class="form-label">Média da reputação:</label>
        <input value= "{{$locador->reputacao}}" type="number" id="reputacao" name="reputacao" class="form-control" required="">
    </div>

<button type="submit" class="btn btn-primary">Enviar</button>
</form>

@endsection