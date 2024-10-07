<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- BOOTSTRAP -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css" 
        integrity="sha512-oc9+XSs1H243/FRN9Rw62Fn8EtxjEYWHXRvjS43YtueEewbS6ObfXcJNyohjHqVKFPoXXUxwc+q1K7Dee6vv9g==" crossorigin="anonymous" />
        
        <!-- FONT AWESOME -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" 
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
        
        <!-- CSS -->
        <link rel="stylesheet" href="/css/styles.css">

        <!-- JavaScript para campo de Data -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js"></script>

    </head>

    <body class="antialiased">

        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary py-1">
                <a class="navbar-brand" href="#"></a>
                <div class="navbar-collapse collapse">
                    <div class="navbar-nav">
                        @auth
                            <a class="nav-link active " id="home-link" href="/candidatos/dashboard">Candidatos</a>
                            <a class="nav-link active " href="/candidatos/create">Adicionar Candidato</a>
                            <a class="nav-link active " href="/alunos/dashboard">Alunos</a>
                            <a class="nav-link active " href="/alunos/choose">Adicionar Aluno</a>
                        @endauth
                    </div>

                    <!-- Logout alinhado à direita -->
                    <div class="navbar-nav ml-auto">
                        @auth
                            @if (Auth::user()->email === 'roterdam.junior@gmail.com')
                                <a href="/register" class="nav-link">Registrar</a>
                            @endif

                            <form action="/logout" method="POST">
                                @csrf
                                <a href="/logout" class="nav-link" onclick="event.preventDefault(); 
                                this.closest('form').submit();">
                                    Logout
                                </a>
                            </form>
                        @endauth
                        
                        @guest
                         <a class="nav-link active" href="/login">Login</a>
                        @endguest
                    </div>
                </div>
            </nav>
        </header>

        <h5 id="main-title">@yield('title')</h5>

        <div class="container-fluid">
            @yield('content')        
        </div>

        <footer class="bg-primary text-white text-center py-1"> <p>Casa de Caritas</p> </footer>

    </body>
    
</html>
