@extends('layout')
@section('title', 'Participations')
<title>Ваши турниры</title>
@section('content')
    <h1>Ваши турниры</h1>
    @foreach($parc as $parc1)

        @if(Auth::user()->id == $parc1->user_id)
            <a href="tournament/{{$parc1->tournament->id}}">{{$parc1->tournament->title}}</a>
        @endif
    @endforeach
@endsection
