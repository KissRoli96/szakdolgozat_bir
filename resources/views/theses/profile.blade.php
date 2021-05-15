@extends('layout')

@section('content')
    <h2>Szakdolgozat Részletei</h2>
    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Tanár/Konzulens</th>
                        <th scope="col">Tanszék</th>
                        <th scope="col">Szakdolgozat Neve</th>
                        <th scope="col">Szakdolgozat Neve ENG</th>
                        <th scope="col">Feladat leírás</th>
                        <th scope="col">Supervisor</th>
                        <th scope="col">Létszám</th>
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
                        <td>{{$thesis->headcount}}</td>
                    </tr>
                </tbody>
            </table>

            @if(!Auth::hasRole('student'))
            <div class="col-12">
                <a class="btn btn-info" href="/theses/update/{{$thesis->id}}">Módosítás</a>
                <form method="post" action="/theses/delete/{{$thesis->id}}">
                    @csrf
                    <button class="btn btn-danger" type="submit" onclick="return confirm('Tényleg törölni szeretné?')">Törlés</button>
                </form>
            </div>
            @endif
            <div>
                <a class="btn btn-primary" href="/theses/" role="button">Vissza</a>
            </div>
        </div>
    </div>

@endsection
