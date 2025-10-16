<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AgroFrota</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS customizado -->
    <link rel="stylesheet" href="{{ asset('estilo.css') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container-fluid"><!-- trocado de .container para .container-fluid para caber melhor no mobile -->
            <a class="navbar-brand fw-bold" href="/">AgroFrota</a>
        </div>
    </nav>

    <!-- Conteúdo principal -->
    <div class="container py-4">
        @yield("conteudo")
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>

    <!-- JS customizado -->
    <script src="{{ asset('interacoes.js') }}"></script>
</body>

</html>