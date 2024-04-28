<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Games</title>

</head>
<body>
@extends('layout')

@section('title', 'Games')

@section('content')
    <h1>Список игр</h1>

        <div class="games">
        @foreach ($games as $game)
            <div class="game">
                <p>{{ $game->title }}</p>
                <p><img src="{{asset('storage/img/games/thumbnail/'.$game->image) }}" alt="Упс"></p>

            </div>
        @endforeach
        </div>
    @if(Auth::check())
        @if(Auth::user()->hasRole('admin'))
            <button id="addGameButton" class="btn btn-primary">Добавить</button>
        @endif
    @endif

    <script>
        document.getElementById('addGameButton').addEventListener('click', function() {

            window.location.href = "{{ route('games.create') }}";
        });
    </script>

@endsection

<style>
    .games {
        display: grid;
        grid-template-columns: repeat(3, 1fr); /* Определяем три равные колонки */
        gap: 10px; /* Расстояние между элементами */
    }

    .game {
        border: 1px solid #eeeeee; /* Пример стиля для каждой игры */
        padding: 10px;
        text-align: center;
    }

</style>

</body>
</html>
