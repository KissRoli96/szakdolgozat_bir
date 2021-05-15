@extends('layout')

@section('content')
    <h1>Találati eredmények erre a kifejezésre: {{$name}}</h1>
    <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Tanár neve</th>
            <th scope="col">Tanszék</th>
            <th scope="col">Szakdolgozat neve</th>
        </tr>
        </thead>
        @forelse($result as $thesis)
        <tbody>
                <tr>
                    <td>
                        {{$thesis->user}}
                    </td>
                    <td>
                        {{$thesis->department}}
                    </td>
                    <td>
                        {{$thesis->task_name}}
                    </td>
                </tr>
        </tbody>
    @empty
    <h3>Nics találat</h3>
    @endforelse
    </table>
@endsection
