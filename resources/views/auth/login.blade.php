<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css">
</head>
<body>

<p>
@auth
    <p>Bem-vindo, {{ Auth::user()->name }}!</p>
@endauth

<!-- Verifica se o usuário não está autenticado -->
@guest
    <p>Você não está autenticado. <a href="/login">Login</a></p>
@endguest
</p>

    <div class="container">
        <h2>Login</h2>
        <form action="/login" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" required>
                @if ($errors->has('email'))
                    {{$errors->first('email')}}
                @endif
            </div>
            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" name="password" id="password" class="form-control" required>
                @if ($errors->has('password'))
                    {{$errors->first('password')}}
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>
</html>
