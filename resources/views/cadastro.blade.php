<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('components.style')

    <title>Cadastro</title>
</head>

<body>
    @include('components.logo')


    <div class="container">
        <div class="columns is-centered">
            <div class="box m-5">
                <h2 class=" title is-3">Cadastro</h2>
                <form action="/cadastrar" method="POST">
                    @csrf
                    <div class="field">
                        <div class="control">
                            <label class="label" for="nome">Nome</label>
                            <input class="input" type="text" name="nome" placeholder="Seu Nome" required>
                            <label class="label" for="email">Email</label>
                            <input class="input" type="email" name="email" placeholder="voce@email.com" required>
                            <label class="label" for="password">Senha</label>
                            <input class="input" type="password" name="password" placeholder="Sua Senha" id="senha1"
                                required>
                            <button class="button is-link mt-3 mb-3" type="submit" id="btncad">Cadastrar</button>
                        </div>
                    </div>

                </form> <a href="/login">Já tem uma conta? Faça login!</a>
            </div>
        </div>
    </div>
</body>

</html>
