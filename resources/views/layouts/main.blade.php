<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- BOOTSTRAP -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css" 
        integrity="sha512-oc9+XSs1H243/FRN9Rw62Fn8EtxjEYWHXRvjS43YtueEewbS6ObfXcJNyohjHqVKFPoXXUxwc+q1K7Dee6vv9g==" crossorigin="anonymous" />
        
        <!-- FONT AWESOME -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
        
        <!-- CSS -->
        <link rel="stylesheet" href="/css/styles.css">
    </head>
 
    <body class="antialiased">

        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <a class="navbar-brand" href="#"></a>
                <div>
                    <div class="navbar-nav">
                    <a class="nav-link active" id="home-link" href="/candidatos/dashboard">Candidatos</a>
                    <a class="nav-link active" href="/candidatos/create">Adicionar Candidato</a>
                    </div>
                </div>
            </nav>
        </header>

        <h5 id="main-title"> @yield('title')</h5>
        
        <div class="container-fluid">
            <div class="row">
                @if(session('msg'))
                    <p>{{session('msg')}}</p>
                @endif
                @yield('content') 
            </div>
        </div>

        <footer class="bg-primary text-white text-center py-3">
        <p>Casa de Caritas</p>
    </footer>

    </body>
    
</html>
