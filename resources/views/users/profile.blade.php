@extends('layout')

@section('content')
    <h1>User Profile</h1>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Felhasználó</th>
                    <th scope="col">Email</th>
                    <th scope="col">Regisztráció dátuma</th>
                    <th scope="col">Utolsó Módosítás</th>
                </tr>
                </thead>
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->registration_date}}</td>
                    <td>{{$user->last_update}}</td>
                </tr>
            </table>
        </div>
    </div>
        <div class="row">
            <div class="col-2">
                <a class="btn btn-info" href="/user/update/{{$user->id_user}}">Módositás</a>
            </div>
            <div class="col-9">
                <form method="post" action="/user/delete/{{$user->id_user}}">
                    @csrf
                    <button class="btn btn-danger" type="submit" onclick="return confirm('Tényleg törölni szeretné?')">Törlés</button>
                </form>
            </div>

            <div class="col-1">
                <a class="btn btn-primary" href="/user/" role="button">Vissza</a>
            </div>
        </div>
@endsection
