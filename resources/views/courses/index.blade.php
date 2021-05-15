@extends('layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>
                Kurzusok
            </h1>
            @if(!Auth::hasRole('student'))
            <a class="btn btn-info" href="/courses/insert">Új kurzus felvétele</a>
            @endif
            <hr>

            <table class="table table-striped">
                <thead class="thead-dark">
                        <tr>
                            <th scope="col">Kurzus Név</th>
                            <th scope="col"></th>
                        </tr>
                </thead>
                <tbody>
                @foreach($courses as $course)
                        <tr>
                            <td>
                                {{$course->full_name}}
                            </td>
                            <td>
                                <a class="btn btn-primary" href="/courses/view/{{$course->course_id}}" role="button">Részletek</a>
                            </td>
                        </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
