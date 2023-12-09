<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ Auth::user()->nome }} - LaraNotes</title>
    @include('components.style')
</head>

<body>
    <script src="script.js"></script>
    @include('components.logo')
    <div class="box m-5">

        <h2 class="title is-4">Bem vindo(a), {{ Auth::user()->nome }}</h2>
        
        <div class="columns">
        <div class="box m-3" style="background-color:#cfcfcf; ">

            <h2 class="title is-4">Criar uma nova anotação <x-far-sticky-note style="width:20px"/></h2>
            
                <form action="/criar-anotacao" method="POST">
                    @csrf
                    <label class="label mt-3" for="titulo">Titulo</label>
                    <input class="input"  type="text" name="titulo" placeholder="Titulo">
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
        <!-- Anotaçoes-->
        <h3 class="title">Suas Anotações</h3>
        @if ($errors->sucesso)
                    @foreach ($errors->all() as $erro)
                        <div class="notification is-success mt-3" style="width: 50%">
                            <p>{{ $erro }}</p>
                        </div>
                    @endforeach
        @endif
        <div style="display: flex; flex-wrap: wrap; align-items: stretch;">
        <form action="/deletar-nota" method="POST" id="deletar" hidden>@csrf @method('DELETE')</form>
        @foreach($notas as $nota)
            
                
            <div class="box" style="margin:10px; flex:30%"><h4 class="title is-5">{{ $nota->titulo }} </h4> <p>{{ date_format($nota->updated_at, 'd/m/Y H:m') }}</p>
            {{ $nota->corpo }} <br>
            <input type="text" value="{{ $nota->id }}" hidden name="notaid" form="deletar">
            <button class="button is-danger" style="" type="submit" value="" form="deletar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19 4h-3.5l-1-1h-5l-1 1H5v2h14M6 19a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7H6v12Z"/></svg></button>
            </div>
        @endforeach </div>

        
        <form action="/sair" method="POST">
            @csrf
            <button class="button is-danger" >Sair</button>
        </form>

       
    </div>
</body>

</html>
