@extends('layout')

@section('content')
    <h2>Szakdolgozat Részletei</h2>

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

    <div class="row">
        <div class="col">
            <h3>
                Feladat leírása angolul
            </h3>
            <p>
                @if(empty($thesis->task_description_en))
                    Nincs angol leírása
                @else
                    {{$thesis->task_description_en}}
                @endif
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <h3>Meghirdető</h3>
            <p>
                {{$thesis->user}}
            </p>

            <h3>Felügyelő</h3>
            <p>
                {{$thesis->supervisor}}
            </p>
        </div>
        <div class="col-6">
            <h3>Kiknek</h3>
            @if($thesis->mi == true)
                <p>Mérnökinformatikus</p>
            @endif
            @if($thesis->pti == true)
                <p>Programtervezőinformatikus</p>
            @endif
            @if($thesis->gi == true)
                <p>Gazdaság informatikus</p>
            @endif
            @if($thesis->ibi == true)
                <p>Info Bionika</p>
            @endif

            @if($thesis->it == true)
                <p>Info Tanári</p>
            @endif

            <h3>Feladat tipusa </h3>
            @if($thesis->type == "S")
                <p>Szakdolgozat</p>
            @elseif($thesis->type == "D")
                <p>Diplomamunka</p>
            @endif
        </div>
        <div class="row">
            <div class="col-6">
                <h3>Nappalis</h3>
                @if($thesis->day = 1)
                    <td>Igen</td>
                @elseif($thesis->day = NULL)
                    <td>Nem</td>
                @endif
            </div>

            <div class="col-6">
                <h3>Levelezős</h3>
                @if($thesis->corr = 1)
                    <td>Igen</td>
                @elseif($thesis->corr = NULL)
                    <td>Nem</td>
                @endif
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-sm">
            <h4>Előismeret</h4>
            @if(empty($thesis->preschool))
                <p>Nem szükséges</p>
            @else
                {{$thesis->preschool}}
            @endif
        </div>
        <div class="col-sm">
            <h4>Irodalom</h4>
            {{$thesis->knowledge}}
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
            <button class="btn btn-success" type="submit" onclick="return confirm('Tényleg arhíválja?  ')">Archiválás</button>
{{--            @endif--}}
        </form>
    </div>
    @endif
@endsection
