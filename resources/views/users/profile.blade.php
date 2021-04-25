@extends('layout')

@section('content')
    <h1>User Profile</h1>
        Email: {{$user->email}}
        <br>
        name: {{ $user->name }}

    <form method="post" action="/user/delete/{{$user->id_user}}">
        @csrf
        <button type="submit">Törlés</button>
    </form>

    <hr>
    <a href="/user/update/{{$user->id_user}}">Modositás</a>
@endsection
