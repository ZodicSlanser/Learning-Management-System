<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <style>
        .container{
            margin-top: 250px;
            margin-left: 150px;
        }
    </style>
    <div class="container">
    <form action="/generate" method="post">
    @csrf
    <select name="course" class="form-control">
        @foreach ($courses as $course)
            <option  value="{{$course->id}}">{{$course->name}}</option>
        @endforeach
    </select>  
    <button name="show"class="btn btn-success">Generate</button>

    <br>      <br>      <br>      <br>      <br>  

    </form>
    <a href="{{route('courses.index')}}" class="btn btn-primary">Courses</a>
    <a href="{{route('users.index')}}" class="btn btn-primary">Generate</a>
    <a href="{{route('departments.index')}}" class="btn btn-primary">Departments</a>
    </div>
</body>
</html>