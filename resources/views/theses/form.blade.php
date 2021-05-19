<form  method="POST">
    @csrf

    <div class="form-group">
            <label>Tanár:</label>
            <input class="form-control" type="text" name="user" value="{{$thesis->user}}">
    </div>

    <br>

    <div class="form-group">
        <label for="department" >Tanszék: </label>
        <input class="form-control"  type="text" name="department" value="{{$thesis->department}}">
    </div>

    <br>

    <div class="form-group">
        <label for="task_name" >Szakdolgozat neve: </label>
        <input class="form-control"  type="text" name="task_name" value="{{$thesis->task_name}}">
    </div>

    <br>

    <div class="form-group">
        <label for="task_name_en" >Szakdolgozat neve ENG:  </label>
        <input class="form-control"  type="text" name="task_name_en" value="{{$thesis->task_name_en}}">
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

    <div>
        <button type="submit" class="btn btn-success">Létrehozás</button>
    </div>
    <br>
    <div>
        <a class="btn btn-primary" href="/theses/" role="button">Vissza</a>
    </div>
</form>
