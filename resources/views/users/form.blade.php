<form method="POST" >
    @csrf
    <div class="form-group">
    <label>email:</label>
    <input class="form-control" type="email" name="email" value="{{$user->email}}">
    </div>

    <div class="form-group">
        <label>name:</label>
        <input class="form-control" type="text" name="name" value="{{$user->name}}">
    </div>


    <button type="submit" class="btn btn-success" >Mentés</button>
</form>
