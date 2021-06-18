<!doctype html>
<html land="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Controle de Séries</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/460068d22d.js" crossorigin="anonymous"></script>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-2 d-flex justify-content-between">
            <a class="navbar-brand" href="{{ route('series.index') }}">Home</a>
            
            @auth
                <a href="/sair" class="text-danger">Sair</a>
            @endauth
            @guest
                <a href="/join">Entrar</a>
            @endguest
        </nav>
        
        <div class="container">
            <div class="jumbotron">
                <h1>@yield('header')</h1>
            </div>
            @yield('content')
        </div>
    </body>

</html>