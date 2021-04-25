@extends('layout')

@section('content')

    <h1>Regisztráció</h1>
    <form method="post" >
        @csrf
        <label for="email">Email:</label>
        <input type="email" name="email" id="email">

        <label for="name">Név:</label>
        <input type="text" name="name" id="name">

        <label for="password">Jelszó:</label>
        <input type="password" name="pw" id="password">

        <label for="password_confirm">Jelszó megerősítése:</label>
        <input type="password" name="pw_confirm" id="password_confirm">
        <button class="btn btn-success" type="submit">Regisztráció</button>
    </form>
@endsection
