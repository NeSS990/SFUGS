@extends('layout')
@section('title', 'Tournaments')
<title id ='tournament_id'>{{$tour->title}}</title>
@section('content')
    <h1>Детали турнира</h1>
    <div>
        <strong>Название:</strong> {{$tour->title}}
        @if($parc == true)
        <form  method="post" action="{{ route('create-parc') }}" enctype="multipart/form-data">
            @csrf
            <label for="user_id" class="hidden-element"></label>
            <input type="number" class="hidden-element"  id="user_id" name="user_id" value="{{Auth::user()->id}}">
            <label for="tournament_id" class="hidden-element"></label>
            <input type="number" class="hidden-element" id="tournament_id" name="tournament_id" value="{{$tour->id}}">
            <button type="submit" class="btn btn-primary">Записаться</button>
        </form>
        @elseif(!now()->diff($tour->DateStart)->m < 1 && $parc != true)
            <p>Вы уже записаны</p>
        @elseif($parc != true && $data->first()->confirm == 0 )
            <div class="col-lg-8">
                <button onclick="updateRecord({{$data->first()->id}})">Подтвердить участие</button>
            </div>
        @elseif($parc != true && $data->first()->confirm != 0)
            <strong>Вы подтвердили участие!!!</strong>
            <p>Наслаждайтесь турниром!</p>
        @endif

    </div>
    <style>
        .hidden-element {
            display: none;
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function updateRecord(RecordId) {
            $.ajax({
                type: "POST",
                url: "{{ route('update.record') }}",
                data: {
                    id : RecordId,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                // Обработка успешного ответа от сервера
                    $("#result").html("Запись обновлена успешно!");
                },
                error: function(error) {
                // Обработка ошибки
                    $("#result").html("Ошибка при обновлении записи.");
                }
            });
        }
    </script>
@endsection
