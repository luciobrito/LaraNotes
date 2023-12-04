<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login</title>
</head>

<body>
    <h1 class="has-text-centered title "> <x-fab-laravel style="height: 20px" /> LaraNotes <x-fab-laravel style="height: 20px" /> </h1>
    
    
        <div class="container">
            <div class="columns is-centered"><div class="box m-5">
                <h2 class=" title is-3">Login</h2>
    <form action="/login" method="POST">
        @csrf
        <div class="field">
            <div class="control">
                
                <label class="label" for="email">Email</label>
                <input class="input" type="email" name="email" placeholder="voce@email.com">
                <label class="label" for="password">Senha</label>
                <input class="input" type="password" name="password" placeholder="Sua Senha">
                
                <button class="button is-link mt-3 mb-3" type="submit">Entrar</button>
            </div>
        </div>

    </form> <a href="/cadastro">Não tem uma conta? Cadastre-se!</a>       @if ($errors->any())
    @foreach ($errors->all() as $erro)
    <div class="notification is-danger mt-3"><p>{{ $erro }}</p></div>
    @endforeach
@endif  </div> </div> </div>
</body>

</html>
