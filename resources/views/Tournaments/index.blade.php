@extends('layout')
@section('title', 'Tournaments')
<title>Турниры</title>
@section('content')
    <div class="tournaments">
        @foreach ($tournaments as $tournament)
            <div class="tournament">
                <p>{{ $tournament->title }}</p>
                <p><img src="{{asset('storage/img/tournament/thumbnail/'.$tournament->logo) }}" alt="Упс"></p>
                <p>{{ $tournament->DateStart }}</p>
                <a href="{{ route('tournament.show', ['id' => $tournament->id]) }}" class="btn btn-primary">Перейти</a>
            </div>
        @endforeach

    </div>
    @if(Auth::check())
        @if(Auth::user()->hasRole('admin') or Auth::user()->hasRole('org'))
            <button id="addTournamentButton" class="btn btn-primary">Добавить</button>
        @endif
    @endif

    <script>
        document.getElementById('addTournamentButton').addEventListener('click', function() {

            window.location.href = "{{ route('tournaments.create') }}";
        });
    </script>
@endsection
<style>

    .tournaments {
        display: grid;
        grid-template-columns: repeat(3, 1fr); /* Определяем три равные колонки */
        gap: 10px; /* Расстояние между элементами */
    }

    .tournament {
        border: 1px solid #ddd; /* Пример стиля для каждой игры */
        padding: 10px;
        text-align: center;
    }
</style>
