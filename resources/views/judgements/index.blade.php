@extends('layout')

@section('content')
    <h1>Birálandó Szakdolgozatok</h1>
    <hr>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Meghírdető Neve</th>
                        <th scope="col">Szakdolgozat Neve</th>
                        <th scope="col">Státusz</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($theses as $thesis)
                    <tr>
                        <td>{{$thesis->user}}</td>
                        <td>{{$thesis->task_name}}</td>
                        <td>{{$thesis->getStatusName()}}</td>
                        <td><a class="btn btn-primary" href="/judgement/view/{{$thesis->id}}">Részletek</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
