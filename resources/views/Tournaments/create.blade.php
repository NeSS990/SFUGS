@extends('layout')

@section('title', 'Добавление турнира')
@section('content')
    <div class="container">
        <div class="col-8">
            <h1>Создать турнир</h1>
            <form method="post" action="{{ route('tournaments.store') }}" enctype="multipart/form-data">
                @csrf
                <table style="border-collapse: collapse; width: 100%;">
                    <tr>
                        <td style="border: none; padding-right: 20px; width: 50%;">
                            <div class="form-group">
                                <label for="title">Название турнира</label>
                                <input type="text" class="form-control" id="title" name="title">
                            </div>
                            <div class="form-group">
                                <label for="game_id">Игра</label>
                                <select class="form-control" id="game_id" name="game_id">
                                    @foreach($games as $game)
                                        <option value="{{ $game->id }}">{{ $game->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Описание</label>
                                <textarea name="description" id="description" class="form-control" rows="4"></textarea>
                            </div>
                        </td>
                        <td style="border: none; width: 50%;">
                            <div class="form-group">
                                <label for="logo">Лого</label>
                                <input type="file" class="form-control-file" id="logo" name="logo">
                            </div>
                            <div class="form-group">
                                <label for="background">Баннер</label>
                                <input type="file" class="form-control-file" id="background" name="background">
                            </div>
                            <div class="form-group">
                                <label for="dateStart">Дата начала</label>
                                <input type="datetime-local" class="form-control" id="dateStart" name="dateStart">
                            </div>
                        </td>
                    </tr>
                </table>
                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        </div>
    </div>
@endsection
