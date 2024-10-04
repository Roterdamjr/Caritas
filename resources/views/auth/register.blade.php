<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css">
</head>
<body>
    <p>Tela de login. <a href="/login">Login</a></p>

    <div class="container">
        <h2>Cadastro de Usuários</h2>
        
        <form action="/register" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="fullname">Nome:</label>
                <input type="fullname" name="fullname" id="fullname" class="form-control" required>
                @if ($errors->has('fullname'))
                    {{$errors->first('fullname')}}
                @endif
            </div>

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
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>

    <div class="container">
        <p class="mt-5">  Usuários Cadastrados</p>
        <div class="form-group">
            <ul class="list-group">
                @foreach($users as $user)
                    <li class="list-group-item">{{$user->name}}</li>
                @endforeach
            </ul>
        </div>
    </div>

</div>



</body>
</html>
