<?php

use App\Models\Department
?>
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Restore</title>
</head>
<body>

@foreach($users as $user)
    <h1>{{$user->role}}</h1>
    <h1>{{$user->id}}</h1>
    <h1>{{$user->name}}</h1>
    <h1>{{$user->username}}</h1>
    <button class="btn"><a href="{{ route('user.restore', [ 'id'=> $user->id]) }}">Restore user</a></button>
@endforeach
</body>
</html>
