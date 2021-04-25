<form method="POST" >
    @csrf

    <label>email:</label>
    <input type="email" name="email" value="{{$user->email}}">

    <label>name:</label>
    <input type="text" name="name" value="{{$user->name}}">

    <button type="submit">Mentés</button>
</form>
