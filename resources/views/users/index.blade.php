<?php

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index of Users</title>
</head>
<body>
<h1>
    Userek
</h1>
<a href="/user/insert">Új felhasználó létrehozása</a>
<hr>

<table>

    @foreach($users as $user)
        <tr>
            <td>
                {{$user->name}}
            </td>
            <td>
                <a href="/user/view/{{$user->id_user}}">Profil</a>
            </td>
        </tr>

    @endforeach

</table>





</body>
</html>
