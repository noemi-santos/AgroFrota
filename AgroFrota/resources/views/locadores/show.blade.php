@extends ('layout')

@section('conteudo')

<h1>Dados do locador</h1>
<form method="post" action="/locadores/{{ $locador->id }}">
    @CSRF 
    @METHOD('DELETE')
    <div class="mb-3">
        <label for="nome" class="form-label">Informe o nome do locador:</label>
        <input disabled value= "{{$locador->nome}}" type="text" id="nome" name="nome" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Informe o e-mail do locador:</label>
        <input disabled value= "{{$locador->email}}" type="email" id="email" name="email" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="senha" class="form-label">Informe a senha:</label>
        <input disabled value= "{{$locador->senha}}"type="password" id="senha" name="senha" class="form-control" required="">
    </div>
    
    <div class="mb-3">
        <label for="telefone" class="form-label">Informe o telefone:</label>
        <input disabled value= "{{$locador->telefone}}" type="text" id="telefone" name="telefone" class="form-control" required="">
    </div>
    
    <div class="mb-3">
        <label for="endereco" class="form-label">Informe o endereço:</label>
        <input disabled value= "{{$locador->endereco}}" type="text" id="endereco" name="endereco" class="form-control" required="">
    </div>
    
    <div class="mb-3">
        <label for="cnpj_cpf" class="form-label">Informe o CNPJ/CPF:</label>
        <input disabled value= "{{$locador->cnpj_cpf}}"type="text" id="cnpj_cpf" name="cnpj_cpf" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="documentos" class="form-label">Documentos Validados:</label>
        <input disabled value= "{{$locador->documentos}}" type="text" id="documentos" name="documentos" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="reputacao" class="form-label">Média da reputação:</label>
        <input disabled value= "{{$locador->reputacao}}" type="number" id="reputacao" name="reputacao" class="form-control" required="">
    </div>
    <p>Deseja excluir esse registro?</p>
    <button type="submit" class="btn btn-danger">Sim</button>
    <a href="#" class="btn btn-secondary" onClick="history.back()">
        Não
    </a>
</form>

@endsection