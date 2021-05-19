<form  method="POST">
    @csrf

    <div class="form-group">
            <label>Tanár:</label>
            <input class="form-control" type="text" name="user" value="{{$thesis->user}}">
    </div>

    <br>

    <div class="form-group">
        <label for="department">Tanszék</label>
        <select class="form-control" id="department" name="department">
            <option value="">Kérjük válasszon tanszéket!</option>
            @foreach($departments as $department)
                <option value="{{$department->unique_id}}">{{$department->department}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Szakdolgozat Neve:</label>
        <input class="form-control" type="text" name="task_name" value="{{$thesis->task_name}}">
    </div>

    <div class="form-group">
        <label>Szakdolgozat Neve Angolul:</label>
        <input class="form-control" type="text" name="task_name_en" value="{{$thesis->task_name_en}}">
    </div>

    <br>
    <p>
        <strong>
            Feladat tipusa:
        </strong>
    </p>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="type" value="{{$thesis->type = "S"}}" id="type">
        <label class="form-check-label" for="type">
            Szakdolgozat
        </label>
    </div>

    <div class="form-check">
        <input class="form-check-input" type="radio" name="type" value="{{$thesis->type = "D"}}" id="type">
        <label class="form-check-label" for="type">
            Diplomamunka
        </label>
    </div>

    <hr>

    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="day" value="{{$thesis->day = 1}}" id="day">
        <label class="form-check-label" for="day">
            Nappalis
        </label>
    </div>

    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="corr" value="{{$thesis->corr = 1}}" id="corr">
        <label class="form-check-label" for="corr">
            Levelezős
        </label>
    </div>
    <br>
    <p>Milyen szakos hallgatók jelentkezhetnek:</p>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="mi" value="{{$thesis->mi = 1}}" id="mi">
        <label class="form-check-label" for="mi">
            Mérnökinformatikus
        </label>
    </div>

    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="pti" value="{{$thesis->pti= 1}}" id="pti">
        <label class="form-check-label" for="pti">
            Programtervező Informatikus
        </label>
    </div>

    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="gi" value="{{$thesis->gi = 1}}" id="gi">
        <label class="form-check-label" for="gi">
            Gazdaságinformatikus
        </label>
    </div>

    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="ibi" value="{{$thesis->ibi = 1}}" id="ibi">
        <label class="form-check-label" for="ibi">
            Info-Bionika
        </label>
    </div>

    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="it" value="{{$thesis->it = 1}}" id="it">
        <label class="form-check-label" for="it">
            Informatika-Tanár
        </label>
    </div>
    <br>
    <div class="form-group">
        <label for="headcount" >Létszám</label>
        <input class="form-control"  type="number" name="headcount" value="{{$thesis->headcount}}">
    </div>


    <div class="form-group">
        <label for="task_description">Feladat leírás</label>
        <textarea class="form-control" id="task_description" name="task_description"  rows="4">
            {{$thesis->task_description}}
        </textarea>
    </div>

    <br>

    <div class="form-group">
        <label for="task_description">Feladat leírás angolul</label>
        <textarea class="form-control" id="task_description" name="task_description"  rows="4">
            {{$thesis->task_description_en}}
        </textarea>
    </div>

    <div class="form-group">
        <label for="preschool">Előismeret</label>
        <select class="form-control" id="preschool" name="preschool">
            <option value="">Kérjük válasszon előismeretet!</option>
            @foreach($courses as $course)
                <option value="{{$course->unique_name}}">{{$course->full_name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Irodalom:</label>
        <input class="form-control" type="text" name="knowledge" id="knowledge" value="{{$thesis->knowledge}}">
    </div>



    <br>

    <div>
        <button type="submit" class="btn btn-success">Létrehozás</button>
    </div>
    <br>
    <div>
        <a class="btn btn-primary" href="/theses/" role="button">Vissza</a>
    </div>
</form>
