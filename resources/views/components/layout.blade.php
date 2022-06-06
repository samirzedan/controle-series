<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Controle de Séries</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container">
    <div class="container" style="mt-3">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('series.index') }}">Controle de Séries</a>
                @auth
                <div>
                    <i class="fa-solid fa-user me-1"></i>{{  Auth::user()->name  }}
                    <a href="{{ route('logout') }}" class="ms-2">Sair</a>
                </div>
                @endauth
                @guest
                    @if($title !== 'Login' && $title !== 'Cadastro')
                    <a href="{{ route('login') }}">Entrar</a>
                    @endif
                @endguest
            </div>
        </nav>

        <h1>{{ $title }}</h1>
        {{ $slot }}
    </div>
</div>
</body>
</html>
