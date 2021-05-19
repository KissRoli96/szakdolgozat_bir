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

    @if(!Auth::hasRole('student'))
        <div class="row">
            <div class="col-2">
                <a class="btn btn-info" href="/theses/update/{{$thesis->id}}">Módosítás</a>
            </div>

            <div class="col-9">
                <form method="post" action="/theses/delete/{{$thesis->id}}">
                    @csrf
                    <button class="btn btn-danger" type="submit" onclick="return confirm('Tényleg törölni szeretné?')">Törlés</button>
                </form>
            </div>
    @endif
            <div class="col-1">
                <a class="btn btn-primary" href="/theses/" role="button">Vissza</a>
            </div>
        </div>


@endsection
