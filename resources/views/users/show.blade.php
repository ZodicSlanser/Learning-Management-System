<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Document</title>
</head>

<body>
    
    <style>
        body {
       background-color: rgb(226, 226, 226);
     }
       #h{
        color: black;
       }
       #hh{
       color: blue;
       }
   </style>
   
    @extends('extend')
    @section('content')
    @if (session('status'))
<div class="alert alert-success">
      {{ session('status') }}
</div>
@endif

    <h1> SHOW INFORMATION OF USERS</h1>
    <span class="h2" id="h" > NAME-Student :</span> <span class="h3" id="hh"> {{$users->name}} </span>
    <br><br>
    <span class="h2" id="h"> Departments : </span> <span class="h3" id="hh"> {{$users ->departments ->name}}</span>
    <br><br>
    <span class="h2" id="h"> Email : </span> <span class="h3" id="hh">{{$users ->email}}</span>
    <br><br>
    <span class="h2" id="h"> Password : </span> <span class="h3" id="hh"> {{$users ->password}}</span>
    <br><br>
    <span class="h2" id="h"> Acadimic_Number : </span> <span class="h3" id="hh"> {{$users ->academic_number}}</span>
    <br><br>
    <span class="h2" id="h"> Role : </span> <span class="h3" id="hh">{{$users ->role}}</span>
    <br><br>
    <a href="{{route('users.index')}}"><button class="btn btn-success" type="submit"> Back</button> </a>
        @endsection

</body>
</html>