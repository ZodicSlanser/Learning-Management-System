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

@foreach($departments as $department)
    <h1>{{$department->code}}</h1>
    <h1>{{$department->name}}</h1>
    <button class="btn"><a href="{{ route('department.restore', [ 'id'=> $department->id]) }}">Restore Department</a>
    </button>
@endforeach
</body>
</html>
