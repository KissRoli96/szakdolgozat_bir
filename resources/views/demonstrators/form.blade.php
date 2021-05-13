<form method="POST">
    @csrf

    <div class="form-group">
        <label for="neptun_id">H-s azonositó: </label>
        <input type="text" name="neptun_id"  value="{{$course->neptun_id}}">
    </div>

    <div class="form-group">
        <label for="unique_name">Egyedi Kurzus Név: </label>
        <input type="text" name="unique_name" value="{{$course->unique_name}}">
    </div>

    <div class="form-group">
        <label for="full_name">Kurzus Név:</label>
        <input type="text" name="full_name" value="{{$course->full_name}}">
    </div>

    <div class="form-group">
        <label for="type">Kurzus Tipusa:</label>
        <input type="text" name="type" id="type" value="{{$course->type}}" maxlength="5">
    </div>

    <div class="form-group">
        <label for="school">Iskola:</label>
        <input type="text" name="school" id="school" value="{{$course->school}}" maxlength="1">
    </div>

    <div class="form-group">
        <label for="hour">Óra:</label>
        <input type="number" name="hour" id="hour" value="{{$course->hour}}">
    </div>

    <div class="form-group">
        <label for="default_headcount">Alap létszám:</label>
        <input type="number" name="default_headcount" id="default_headcount" value="{{$course->default_headcount}}">
    </div>

    <div class="form-group">
        <label for="department">Tanszék:</label>
        <select name="department" id="department">
            @foreach($departments as $department)
                <option value="{{$department->unique_id}}">{{$department->department}}</option>
            @endforeach

        </select>
    </div>


    <div>
        <button type="submit" class="btn btn-success">Létrehozás</button>
    </div>
    <br>
    <div>
        <a class="btn btn-primary" href="/courses/" role="button">Vissza</a>
    </div>
</form>
