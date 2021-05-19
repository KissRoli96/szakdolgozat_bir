<form method="POST">
    @csrf

    <div class="form-group">
        <label for="user">Demonstátor email címe: </label>
        <input class="form-control" type="text" name="user" id="user"  value="{{$demonstrator->user}}">
    </div>

    <div class="form-group">
        <label for="specs">Szak</label>
        <select class="form-control" id="specs" name="specs">
            @foreach($specs as $spec)
                <option value="{{$spec->id_specialist}}">{{$spec->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="specialization">Szakírány</label>
        <select class="form-control" id="specialization" name="specialization">
            @foreach($specializations as $specilization)
                <option
                    @if($specilization->id_specialization == $demonstrator->specialization)
                    selected="selected"
                    @endif
                    value="{{$specilization->id_specialization}}"
                >{{$specilization->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="courses">Kurzus</label>
        <select class="form-control" id="courses" name="courses" multiple>
            @foreach($courses as $course)

                <option value="{{$course->unique_name}}">{{$course->full_name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="semester">Évfolyam: </label>
        <input class="form-control" type="number" name="semester" id="semester"  value="{{$demonstrator->semester}}">
    </div>

    <div class="form-group">
        <label for="semester">Aktuális félév: </label>
        <input class="form-control" type="number" name="semester" id="semester"  value="{{$demonstrator->semester}}">
    </div>

    <div class="form-group">
        <label for="min">Minimális Óraszám: </label>
        <input class="form-control" type="number" name="min" id="min"  value="{{$demonstrator->min}}">
    </div>

    <div class="form-group">
        <label for="max">Maximális Óraszám: </label>
        <input class="form-control" type="number" name="max" id="max"  value="{{$demonstrator->max}}">
    </div>

    <div class="form-group">
        <label for="corr">Levelezős óra</label>
        <select class="form-control" id="corr" name="corr">
            <option value="0">Nem válalok</option>
            <option value="1">Válalok</option>
        </select>
    </div>

    <div class="form-group">
        <label for="comment">Megjegyzés</label>
        <textarea class="form-control" id="comment" name="comment" rows="3">
            {{$demonstrator->comment}}
        </textarea>
    </div>



{{--    <div class="form-group">--}}
{{--        <label for="file">Leckekönyv:</label>--}}
{{--        <input type="file"--}}
{{--               id="file" name="file"--}}
{{--               accept="application/pdf">--}}
{{--    </div>--}}

    <div>
        <button type="submit" class="btn btn-success">Létrehozás</button>
    </div>

    <br>
    <div>
        <a class="btn btn-primary" href="/courses/" role="button">Vissza</a>
    </div>
</form>
