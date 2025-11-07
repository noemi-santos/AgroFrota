@extends($layout)

@section('conteudo')

    <h1>Nova categoria</h1>
    <form method="post" action="/categorias">
        @CSRF

        <div class="mb-3">
            <label for="titulo" class="form-label">Categoria:</label>
            <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Digite o nome da categoria" required="">
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Voltar</a>
    </form>

@endsection