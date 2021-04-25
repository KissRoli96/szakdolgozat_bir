@extends('layout')

@section('content')
    <h1>
        Userek
    </h1>
    <a class="btn btn-info" href="/user/insert">Új felhasználó létrehozása</a>
    <hr>

    <table class="table table-striped">

        @foreach($users as $user)
            <tr>
                <td>
                    {{$user->name}}
                </td>
                <td>
                    <a href="/user/view/{{$user->id_user}}">Profil</a>
                </td>
            </tr>

        @endforeach

    </table>
@endsection
