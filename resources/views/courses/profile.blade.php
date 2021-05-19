@extends('layout')

@section('content')

    <h2>
        Kurzus adatai
    </h2>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Neptun Azonósitó</th>
                        <th scope="col">Egyedi Kurzus Név</th>
                        <th scope="col">Kurzus Név</th>
                        <th scope="col">Kurzus Tipusa</th>
                        <th scope="col">Iskola</th>
                        <th scope="col">Óra</th>
                        <th scope="col">Alap létszám</th>
                        <th scope="col">Tanszék</th>
                    </tr>
                </thead>
            <tbody>
                <tr>
                    <td>{{$course->neptun_id}}</td>
                    <td>{{$course->unique_name}}</td>
                    <td>{{$course->full_name}}</td>
                    <td>{{$course->type}}</td>
                    <td>{{$course->school}}</td>
                    <td>{{$course->hour}}</td>
                    <td>{{$course->default_headcount}}</td>
                    <td>{{$course->department}}</td>
                </tr>
            </tbody>
        </table>
        @if(!Auth::hasRole('student') || !Auth::hasRole('teacher'))
        <div class="row">
            <div class="col-2">
                <a class="btn btn-info" href="/courses/update/{{$course->course_id}}">Modositás</a>
            </div>
            <div class="col-9">
                <form method="post" action="/courses/delete/{{$course->course_id}}">
                    @csrf
                    <button class="btn btn-danger" type="submit" onclick="return confirm('Tényleg törölni szeretné?')">Törlés</button>
                </form>
            </div>
        @endif
            <div class="col-1">
                <a class="btn btn-primary" href="/courses/" role="button">Vissza</a>
            </div>
        </div>
    </div>

@endsection
