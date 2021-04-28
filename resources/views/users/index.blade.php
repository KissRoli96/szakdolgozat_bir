@extends('layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>
                Felhasználók
            </h1>

            <a class="btn btn-info" href="/user/insert">Új felhasználó létrehozása</a>

            <hr>

            <table class="table table-striped">
                <thead class="thead-dark">
                        <tr>
                            <th scope="col">Felhasználó</th>
                            <th scope="col"></th>
                        </tr>
                </thead>
                @foreach($users as $user)
                    <tr>
                        <td>
                            {{$user->name}}
                        </td>
                        <td>
                            <a class="btn btn-primary" href="/user/view/{{$user->id_user}}" role="button">Profil</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

@endsection
