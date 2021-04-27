@extends('layout')

@section('content')
    <h2>Szakdolgozat Részletei</h2>
    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead class="thread-dark">
                    <tr>
                        <th scope="col">Tanár</th>
                        <th scope="col">Tanszék</th>
                        <th scope="col">Szakdolgozat Neve</th>
                        <th scope="col">Szakdolgozat Neve ENG</th>
                        <th scope="col">Feladat leírás</th>
                        <th scope="col">Konzulens</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$thesis->user}}</td>
                        <td>{{$thesis->department}}</td>
                        <td>{{$thesis->task_name}}</td>
                        <td>{{$thesis->task_name_en}}</td>
                        <td>{{$thesis->task_description}}</td>
                        <td>{{$thesis->supervisor}}</td>
                    </tr>
                </tbody>
            </table>

            <div>
                <a class="btn btn-primary" href="/theses/" role="button">Vissza</a>
            </div>
        </div>
    </div>

@endsection
