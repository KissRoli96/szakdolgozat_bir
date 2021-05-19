@extends('layout')

@section('content')

    <h2>
        Osztály terem adatai
    </h2>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Neptun Azonósitó</th>
                    <th scope="col">Egyedi Kurzus Név</th>
                    <th scope="col">Tanterem Neve</th>
                    <th scope="col">Tanterem Tipusa</th>
                    <th scope="col">Kapacítás</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{$classroom->neptun_id}}</td>
                    <td>{{$classroom->unique_name}}</td>
                    <td>{{$classroom->full_name}}</td>
                    <td>{{$classroom->type}}</td>
                    <td>{{$classroom->capacity}}</td>

                </tr>
                </tbody>
            </table>

            <div>
                <a class="btn btn-primary" href="/classrooms/" role="button">Vissza</a>
            </div>
        </div>
    </div>
@endsection
