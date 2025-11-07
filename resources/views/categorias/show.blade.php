@extends($layout)

@section('conteudo')

<h1>Dados da Categoria</h1>
<form method="post" action="/categorias/{{ $categoria->id }}">
    @CSRF
    @METHOD('DELETE')
    
    <div class="mb-3">
        <label for="id" class="form-label">ID:</label>
        <input disabled value="{{$categoria->id}}" type="text" id="id" name="id" class="form-control" required="">
    </div>
    <div class="mb-3">
        <label for="titulo" class="form-label">Categoria:</label>
        <input disabled value="{{$categoria->titulo}}" type="text" id="titulo" name="titulo" class="form-control" required="">
    </div>

    <p>Deseja excluir esse registro?</p>
    <button type="submit" class="btn btn-danger">Sim</button>
    <a href="#" class="btn btn-secondary" onClick="history.back()">
        Não
    </a>
</form>

@endsection