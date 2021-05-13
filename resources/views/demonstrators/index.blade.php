@extends('layout')


@section('content')
    <div class="row">
        <div class="col-12">
            <h1>
                Demonstrátorok
            </h1>
                <a class="btn btn-info" href="/demonstrators/insert">Demonstrátor jelentkezés</a>

            <hr>
            <table class="table table-striped">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Demonstrátor neve</th>
                    <th scope="col">Adatai</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                @foreach($demonstrators as $demonstrator)
                    <tr>
                        <td>
                            {{$demonstrator->user}}
                        </td>
                        <td>
                            <a class="btn btn-primary" href="/demonstrators/view/{{$demonstrator->id}}" role="button">Részletek</a>
                        </td>
                    </tr>
                @endforeach
            </table>

        </div>

    </div>

@endsection

