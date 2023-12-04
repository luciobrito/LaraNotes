<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('components.style')
    <title>Login</title>
</head>

<body>
    @include('components.logo')


    <div class="container">
        <div class="columns is-centered">
            <div class="box m-5">
                <h2 class=" title is-3">Login</h2>
                <form action="/login" method="POST">
                    @csrf
                    <div class="field">
                        <div class="control">

                            <label class="label" for="email">Email</label>
                            <input class="input" type="email" name="email" placeholder="voce@email.com" value="{{ old('email') }}">
                            <label class="label" for="password">Senha</label>
                            <input class="input" type="password" name="password" placeholder="Sua Senha">

                            <button class="button is-link mt-3 mb-3" type="submit">Entrar</button>
                        </div>
                    </div>

                </form> <a href="/cadastro">Não tem uma conta? Cadastre-se!</a>
                @if ($errors->any())
                    @foreach ($errors->all() as $erro)
                        <div class="notification is-danger mt-3">
                            <p>{{ $erro }}</p>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</body>

</html>
