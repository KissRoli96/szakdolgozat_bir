@extends('layout')

@section('content')
    <h2>Jelentkezett Demonstártor  Adatai</h2>
    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead class="thread-dark">
                <tr>
                    <th scope="col">Név</th>
                    <th scope="col">Szak</th>
                    <th scope="col">Szakírány</th>
                    <th scope="col">Kurzusok</th>
                    <th scope="col">Évfolyam</th>
                    <th scope="col">Aktuális félév</th>
                    <th scope="col">Létszám</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    {{$demonstrator}}
{{--                    <td>{{$thesis->user}}</td>--}}
{{--                    <td>{{$thesis->department}}</td>--}}
{{--                    <td>{{$thesis->task_name}}</td>--}}
{{--                    <td>{{$thesis->task_name_en}}</td>--}}
{{--                    <td>{{$thesis->task_description}}</td>--}}
{{--                    <td>{{$thesis->supervisor}}</td>--}}
{{--                    <td>{{$thesis->headcount}}</td>--}}
                </tr>
                </tbody>
            </table>

{{--            <div class="col-12">--}}
{{--                <a class="btn btn-info" href="/theses/update/{{$thesis->id}}">Módosítás</a>--}}
{{--                <form method="post" action="/theses/delete/{{$thesis->id}}">--}}
{{--                    @csrf--}}
{{--                    <button class="btn btn-danger" type="submit" onclick="return confirm('Tényleg törölni szeretné?')">Törlés</button>--}}
{{--                </form>--}}
{{--            </div>--}}

            <div>
                <a class="btn btn-primary" href="/demonstrators/" role="button">Vissza</a>
            </div>
        </div>
    </div>

@endsection
