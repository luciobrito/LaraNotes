<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ Auth::user()->nome }} - LaraNotes</title>
    @include('components.style')
</head>

<body>
    @include('components.logo')
    <div class="box m-5">

        <h2>Bem vindo(a), {{ Auth::user()->nome }}</h2>
        <h3>Suas Pastas</h3>
        <h3>Suas Anotações</h3>
        <div class="columns">
        <div class="box m-3">

            <h2 class="title is-4">Criar uma nova anotação</h2>
            
                <form action="/criar-anotacao" method="POST">
                    @csrf
                    <label class="label mt-3" for="titulo">Titulo</label>
                    <input class="input mt-3" type="text" name="titulo" placeholder="Titulo">
                    <textarea class="textarea mt-3" name="corpo" id="" cols="30" rows="10" style="resize: none;"></textarea>
                    <button class="button is-success mt-3" type="submit">Criar</button>
                </form>
                @if ($errors->any())
                @foreach ($errors->all() as $erro)
                    <p>{{ $erro }}</p>
                @endforeach
            @endif
            </div>
        </div>
        <form action="/sair" method="POST">
            @csrf
            <button class="button is-danger">Sair</button>
        </form>
    </div>
</body>

</html>
