@extends($layout)

@section('conteudo')
    <h1>Novo User</h1>
    <form method="post" action="/cadastrar" enctype="multipart/form-data">
        @CSRF
        <div class="mb-3">
            <label for="name" class="form-label">Nome Completo</label>
            <input placeholder="Rodrigo Felipe" type="text" id="name" name="name" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input placeholder="email@email.com" type="email" id="email" name="email" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input placeholder="123 é uma ótima senha!" type="password" id="password" name="password" class="form-control" required="">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

@endsection