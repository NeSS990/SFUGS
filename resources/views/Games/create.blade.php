@extends('layout') <!-- Подключаем макет -->

@section('title', 'Добавление игры') <!-- Устанавливаем заголовок страницы -->

@section('content') <!-- Здесь будет контент страницы -->
<div class="container">
    <div class="col-8">
        <h1>Добавить игру</h1>
        <form method="post" action="{{ route('games.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Название игры</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-group">
                <label for="genre_id">Категория</label>
                <select class="form-control" id="genre_id" name="genre_id">
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea name="description" id="description" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="image">Изображение</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>
</div>
@endsection
