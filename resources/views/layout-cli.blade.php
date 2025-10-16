<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AgroFrota - cliente</title>

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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Alternar navegação">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown1" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Paginas
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown1">
                            <li><a class="dropdown-item" href="#">Buscar</a></li>
                            <li><a class="dropdown-item" href="#">Anunciar</a></li>
                            <li><a class="dropdown-item" href="#">Minhas Locacoes</a></li>
                            <li><a class="dropdown-item" href="#">Meus Anuncios</a></li>
                            <li><a class="dropdown-item" href="#">Relatórios</a></li>
                            <li><a class="dropdown-item" href="#">Minha Conta</a></li>
                            <li>
                                <form method="POST" action="/logout" class="dropdown-item">
                                    @csrf
                                    <button type="submit" class="dropdown-item" style="background-color: transparent;
                                        border: none; 
                                        padding: 0; 
                                        margin: 0; 
                                        font: inherit; 
                                        color: inherit; 
                                        text-align: inherit;
                                        cursor: pointer;
                                        appearance: none;
                                        border-radius: 0; 
                                        outline: none;
                                        ">Sair</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
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