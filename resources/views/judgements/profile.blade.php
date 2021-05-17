@extends('layout')

@section('content')
    <div class="row">
        <div class="col-9">
            <h3>Szakdolgozat Címe</h3>
            <p>
                {{$thesis->task_name}}
            </p>
        </div>

        <div class="col-3">
            <h3>Létszám</h3>
            <p>
                {{$thesis->headcount}}
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h3>
                Feladat leírása
            </h3>
            <p>
                    {{$thesis->task_description}}
            </p>
        </div>
    </div>

    @if($thesis->status == \App\Models\Theses::STATUS_PENDING)
        <div>
            <form method="post" action="/judgement/approve/{{$thesis->id}}">
                @csrf
                <button class="btn btn-success" type="submit" onclick="return confirm('Tényleg elfogadja? ')">Elfogad</button>
            </form>
        </div>

        <div>
            <form method="post" action="/judgement/deny/{{$thesis->id}}">
                @csrf
                <button class="btn btn-danger" type="submit" onclick="return confirm('Tényleg el utasítja?')">Elutasít</button>
            </form>
        </div>
    @endif
    @if($thesis->status == \App\Models\Theses::STATUS_ACCEPTED || \App\Models\Theses::STATUS_DENIED == $thesis->status)
    <div>
        <form method="post" action="/judgement/archive/{{$thesis->id}}">
            @csrf
{{--            @if($thesis->status == \App\Models\Theses::STATUS_ARCHIVED)--}}
            <button class="btn btn-success" type="submit" onclick="return confirm('Tényleg arhíválja?  ')">Arhíválás</button>
{{--            @endif--}}
        </form>
    </div>
    @endif
@endsection
