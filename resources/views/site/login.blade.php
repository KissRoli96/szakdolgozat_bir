@extends('layout')

@section('content')
    <h1>Belépés</h1>
    <form method="post" >
        @csrf
        <div class="form-group">
            <label for="email">Email:</label>
            <input class="form-control" type="text" name="email" id="email">
        </div>

        <div class="form-group">
            <label  for="pw">Jelszó:</label>
            <input class="form-control" type="password" name="pw" id="pw">
        </div>

        <button type="submit" class="btn btn-success">Belépés</button>
    </form>
@endsection
