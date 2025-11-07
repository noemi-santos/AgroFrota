@extends($layout)

@section('conteudo')

    <h1>Dados do Usuario</h1>
    <form method="post" action="{{ route('adm.user.show', $user->id) }}">
        @CSRF
        @METHOD('DELETE')

        <div class="mb-3">
            <label for="name" class="form-label">Nome:</label>
            <input disabled value="{{$user->name}}" type="text" id="name" name="name" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input disabled value="{{$user->email}}" type="email" id="email" name="email" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="telefone" class="form-label">telefone:</label>
            <input disabled value="{{$user->telefone}}" type="text" id="telefone" name="telefone" class="form-control">
        </div>
        <div class="mb-3">
            <label for="endereco" class="form-label">endereco:</label>
            <input disabled value="{{$user->endereco}}" type="text" id="endereco" name="endereco" class="form-control">
        </div>
        <div class="mb-3">
            <label for="cpf" class="form-label">cpf:</label>
            <input disabled value="{{$user->cpf}}" type="text" id="cpf" name="cpf" class="form-control">
        </div>
        <div class="mb-3">
            <label for="cnpj" class="form-label">cnpj:</label>
            <input disabled value="{{$user->cnpj}}" type="text" id="cnpj" name="cnpj" class="form-control">
        </div>

        <p>Deseja excluir esse registro?</p>
        <button type="submit" class="btn btn-danger">Sim</button>
        <a href="#" class="btn btn-secondary" onClick="history.back()">
            Não
        </a>
    </form>

@endsection