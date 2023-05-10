<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Courses</title>
</head>
<body>
    @extends('extend')
    @section('content')

    @if (session('status'))
    <div class="alert alert-success">
          {{ session('status') }}
    
</div>
    @endif
    @if (session('warning'))
    <div class="alert alert-danger">
          {{ session('warning') }}
    
</div>
    @endif
    <h1>
        <a href="{{route('courses.create')}}"> ADD NEW SUbJECT
            
        </a>
    </h1>
<br><br>
    @foreach ($courses as $course)
        <div class="d-flex justify-content-between">
            <div>
                <a href= "{{route('courses.show',$course->id)}}">
               {{$course->id}} - {{$course->name}}
    
            </div>

         <div>

            <a href="{{route('courses.edit',$course->id)}}" class="btn btn-info"  style="margin-right: 150px;margin-top: 10px;">EDIT</a>
            <form action="{{route('courses.destroy',$course->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" style="margin-left: 120px;margin-top: -69px;"> DElETE </button>
    
            </form>
        </div>
        
        </div>
    @endforeach
    <a href="{{route('departments.index')}}"class="btn btn-primary">Departments</a>
    <a href="{{route('users.index')}}" class="btn btn-primary">Users</a>
    {{ $courses->links() }}
    @endsection

</body>
</html>