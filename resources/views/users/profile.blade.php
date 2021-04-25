@extends('layout')

@section('content')
    <h1>User Profile</h1>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped">
                <tr>
                    <td>
                        Name
                    </td>
                    <td>
                        {{$user->name}}
                    </td>
                </tr>

                <tr>
                    <td>
                        email
                    </td>
                    <td>
                        {{$user->email}}
                    </td>
                </tr>
            </table>
        </div>

        <div class="col-12">
            <a class="btn btn-info" href="/user/update/{{$user->id_user}}">Modositás</a>
            <form method="post" action="/user/delete/{{$user->id_user}}">
                @csrf
                <button class="btn btn-danger" type="submit" onclick="return confirm('Tényleg törölni szeretné?')">Törlés</button>
            </form>
        </div>
    </div>
@endsection
