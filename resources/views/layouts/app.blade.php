<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ImagemCerta')</title>
    <!-- Usando Bootstrap 5 para compatibilidade com ms-auto -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" href="{{ asset('meu_favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard') }}">
                <img src="https://i.imgur.com/qgCIZf2.png" alt="ImagemCerta" style="width: 150px !important;" loading="lazy">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Apenas em telas menores, itens ficam lado a lado -->
                <ul class="navbar-nav me-auto d-flex flex-column flex-lg-row">
                    <li class="nav-item ms-4">
                        <a class="nav-link" href="{{ route('fotos.fotos_aprovadas') }}">Fotos Aprovadas</a>
                    </li>
                    <li class="nav-item ms-4">
                        <a class="nav-link" href="{{ route('fotos.avaliar') }}">Avaliar Fotos</a>
                    </li>
                    @auth
                        <li class="nav-item ms-4">
                            <a class="nav-link" href="{{ route('fotos.create') }}">Enviar Foto</a>
                        </li>
                    @else
                        <li class="nav-item ms-4">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item ms-4">
                            <a class="nav-link" href="{{ route('register') }}">Registrar</a>
                        </li>
                    @endauth
                </ul>
                @auth
                    <!-- Botão Sair alinhado à direita em telas grandes e ao lado dos itens em telas pequenas -->
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item ms-4">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> Sair
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                @endauth
            </div>
        </div>
    </nav>
    <div class="container" style="margin-top: 80px;">
        @yield('content')
    </div>
    <!-- Usando Bootstrap 5 para compatibilidade -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
