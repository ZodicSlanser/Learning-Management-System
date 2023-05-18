<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@extends('extend')
@section('content')

    <style>
        body {
            background-color: rgb(226, 226, 226);
        }

        #h {
            color: black;
        }

        #hh {
            color: blue;
        }
    </style>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}

        </div>
    @endif

    <h1> SHOW INFORMATION OF SUBJECTS</h1>
    <span class="h2" id="h"> Name  :</span>  <span class="h3" id="hh">{{$courses->name}}</span>
    <br><br>
    <span class="h2" id="h"> Code   :</span>  <span class="h3" id="hh">{{$courses ->code}}</span>
    <br><br>
    <span class="h2" id="h"> Department_Name : </span> <span class="h3" id="hh"> {{$courses ->department ->name}}</span>
    <br><br>

    <span class="h2" id="h"> Depends on the Subject : </span> <span class="h3" id="hh">@if($courses ->prerequisite_id==null)
            {{"not prerequisite"}}

        @else

            {{$courses ->course->name}}

        @endif</span>
    <br><br>
    <span class="h2" id="h"> Professor Subject : </span> <span class="h3" id="hh"> {{$courses ->professor->name}}</span>
    <br><br>
    <a href="{{route('courses.index')}}">
        <button class="btn btn-success" type="submit"> Back</button>
    </a>

@endsection

</body>
</html>
