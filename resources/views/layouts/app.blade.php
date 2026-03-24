<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Carlota Locadora</title>

    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>🎬</text></svg>">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4 shadow">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="/locacoes/novo">

            🎬 Carlota Locadora
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarCadastro" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Cadastro
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarCadastro">
                        <li><a class="dropdown-item" href="/clientes/novo">Cadastro de Clientes</a></li>
                        <li><a class="dropdown-item" href="/fitas/novo">Cadastro de Fitas</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="/locacoes/novo">Nova Locação</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarConsulta" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Consulta
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarConsulta">
                        <li><a class="dropdown-item" href="/clientes">Consultar Clientes</a></li>
                        <li><a class="dropdown-item" href="/fitas">Consultar Filmes</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/locacoes">Filmes Locados</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <strong>Sucesso!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
            <strong>Erro!</strong> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @yield('content')
</div>

<footer class="text-center mt-5 py-3 text-muted">
    <small>Carlota Locadora &copy; 2026</small>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script>
    setTimeout(function() {
        let alertElement = document.querySelector('.alert');
        if (alertElement) {
            let bsAlert = new bootstrap.Alert(alertElement);
            bsAlert.close();
        }
    }, 4000);

    $(document).ready(function(){
        $('input[name="cpf"]').mask('000.000.000-00');
        $('input[name="telefone"]').mask('(00) 00000-0000');
    });
</script>
</body>
</html>
