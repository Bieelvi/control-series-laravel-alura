<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Séries</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3 d-flex justify-content-between">
        <div class="container-fluid">
            <a class="navbar navbar-expand-lg" href="/series">Home</a>
            @auth <a href="/sair" class="text-danger">Sair</a> @endauth
            
            @guest <a href="/login">Entrar</a> @endguest
        </div>
    </nav>

    <div class="container">
        <div class="jumbotron p-5 bg-secondary">
            <h1>@yield('header')</h1>
        </div>
        @yield('content')
    </div>
</body>
</html>