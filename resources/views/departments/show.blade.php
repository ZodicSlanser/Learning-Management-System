<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="{{asset('css/departments.show.css')}}" rel="stylesheet">
    <title>Document</title>
</head>

<body>


@extends('extend')
@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <h1> SHOW INFORMATION OF DEPARTMENTS</h1>
    <span class="h2" id="h"> NAME :</span> <span class="h3" id="hh"> {{$departments->name}} </span>
    <br><br>
    <span class="h2" id="h"> CODE : </span> <span class="h3" id="hh">{{$departments ->code}}</span>
    <br><br>
    <h1> courses </h1>

    <a href="{{route('departments.index')}}">
        <button class="btn btn-success" type="submit"> Back</button>
    </a>
@endsection

</body>
</html>
