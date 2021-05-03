@extends('layout')


@section('content')
    <div class="row">
        <div class="col-12">
            <h1>
                Szakdolgozatok
            </h1>
            @auth
            <a class="btn btn-info" href="/theses/insert">Új szakdolgozat felvétele</a>
            @endauth
            <hr>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Tanár</th>
                        <th scope="col">Szakdolgozat címe</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                @foreach($theses as $thesis)
                    <tr>
                        <td>
                            {{$thesis->user}}
                        </td>
                        <td>
                            {{$thesis->task_name}}
                        </td>
                        <td>
                            <a class="btn btn-primary" href="/theses/view/{{$thesis->id}}" role="button">Részletek</a>
                        </td>
                    </tr>
                @endforeach
            </table>

        </div>

    </div>

@endsection
