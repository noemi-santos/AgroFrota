<!--
 public function CadastrarUsuario(Request $request)
    {
        try {
            $dados = $request->all();
            $dados["password"] = Hash::make($dados["password"]);
            User::create($dados);
            return redirect()->route("login")->with("Sucesso", "Novo usuario registrado!");
        } catch (\Exception $e) {
            Log::error(
                "Erro ao criar o usuario: " . $e->getMessage(),
                [
                    "stack" => $e->getTraceAsString(),
                    "request" => $request->all()
                ]
            );
        }
    }
-->
@extends('layout')

@section('conteudo')
    <h1>Novo locador</h1>
    <form method="post" action="/locador" enctype="multipart/form-data">
        @CSRF
        <div class="mb-3">
            <label for="nome" class="form-label">nome</label>
            <input type="text" id="nome" name="nome" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">email</label>
            <input type="email" id="email" name="email" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="senha" class="form-label">senha</label>
            <input type="password" id="senha" name="senha" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="telefone" class="form-label">telefone</label>
            <input type="tel" id="telefone" name="telefone" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="endereco" class="form-label">endereço</label>
            <input type="text" id="endereco" name="endereco" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="cpf_cnpj" class="form-label">CPF ou CNPJ</label>
            <input type="text" id="cnpj_cpf" name="cnpj_cpf" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="documentos_validados" class="form-label">Documentos válidos</label>
            <select name="documentos_validados" id="documentos_validados" class="form-control" required="">
                <option value="1">Sim</option>
                <option value="0">Não</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="reputacao_media" class="form-label">Reputação Média</label>
            <select id="reputacao_media" name="reputacao_media" class="form-select" required="">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>

            </select>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

@endsection