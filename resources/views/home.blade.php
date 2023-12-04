<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ Auth::user()->nome }} - LaraNotes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<body>
    <div class="is-justify-content-center">
        <h1 class="has-text-centered title "> <x-fab-laravel style="height: 20px" /> LaraNotes <x-fab-laravel
            style="height: 20px" /> </h1>
        <h2>Bem vindo(a), {{ Auth::user()->nome }}</h2>
        <h3>Suas Pastas</h3>
        <h3>Suas Anotações</h3>

        <form action="/sair" method="POST">
            @csrf
        <button class="button is-danger">Sair</button>
        </form>
        </div>
</body>
</html>