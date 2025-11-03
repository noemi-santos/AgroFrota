<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Minha Loja</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#">Minha Loja</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link active" href="#">Início</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Produtos</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Contato</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Carrinho</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <header class="bg-light py-5 text-center">
    <div class="container">
      <h1 class="fw-bold">Bem-vindo à Minha Loja!</h1>
      <p class="lead">Os melhores produtos com os melhores preços</p>
      <a href="#" class="btn btn-primary btn-lg">Ver Ofertas</a>
    </div>
  </header>

  <!-- Produtos -->
  <section class="py-5">
    <div class="container">
      <h2 class="mb-4 text-center fw-semibold">Nossos Produtos</h2>
      <div class="row g-4">

        @foreach($equipamento as $p)
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="card h-100 shadow-sm">
            <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Produto 1">
            <div class="card-body text-center">
              <h5 class="card-title">{{ $p->nome }}</h5>
              <p class="card-text text-muted">{{ number_format($p->valor, 2, ',', '.') }}</p>
              <a href="/carrinho/add/{{$p->id}}" class="btn btn-outline-primary">Comprar</a>
            </div>
          </div>
        </div>

        

      </div>
    </div>
  </section>

  <!-- Rodapé -->
  <footer class="bg-dark text-light py-4 text-center">
    <div class="container">
      <p class="mb-0">&copy; 2025 Minha Loja. Todos os direitos reservados.</p>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>