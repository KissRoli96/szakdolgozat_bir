@extends('layout')

@section('content')
    <h2>Jelentkezett Demonstártor  Adatai</h2>
    <div class="row">
        <div class="col-12">
            <table class="table dark">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Név</th>
                    <th scope="col">Szak</th>
                    <th scope="col">Szakírány</th>
                    <th scope="col">Kurzusok</th>
                    <th scope="col">Évfolyam</th>
                    <th scope="col">Aktuális félév</th>
                    <th scope="col">Minimális Óraszám</th>
                    <th scope="col">Maximális Óraszám</th>
                    <th scope="col">Levelezős Óra</th>
                    <th scope="col">Megyjegyzés</th>

                </tr>
                </thead>
                <tbody>
                <tr>

                    <td>{{$demonstrator->user}}</td>
                    @foreach($specs as $spec)
                        @if($spec->id_specialist == $demonstrator->specs)
                    <td>{{$spec->name}}</td>
                        @endif
                    @endforeach
                    @foreach($specializations as $special)
                        @if($special->id_specialization ==  $demonstrator->specialization )
                                    <td>{{$special->name}}</td>
                        @endif
                    @endforeach
                    <td>{{$demonstrator->courses}}</td>
                    <td>{{$demonstrator->semester}}</td>
                    <td>{{$demonstrator->grades}}</td>
                    <td>{{$demonstrator->min}}</td>
                    <td>{{$demonstrator->max}}</td>
                    @if($demonstrator->corr == true)
                        <td>Igen vállalt</td>
                    @else
                        <td>Nem vállalt</td>
                    @endif
                    <td>{{$demonstrator->comment}}</td>
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
