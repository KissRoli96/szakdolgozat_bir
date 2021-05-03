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

        <div>
            <a class="btn btn-primary" href="/courses/" role="button">Vissza</a>
        </div>
    </div>
</div>

@endsection
