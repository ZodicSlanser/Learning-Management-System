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
        <a href="{{route('departments.create')}}"> ADD NEW DEPARTMENTS
            
        </a>
    </h1>
<br><br>
     @foreach ($departments as $department)
       <div class="d-flex justify-content-between">
            <div>
            <a href= "{{route('departments.show',$department->id)}}">
                {{$department->id}}-{{$department->name}} 

            </a>
            </div>

         <div>
            <a href="{{route('departments.edit',$department->id)}}" class="btn btn-info" style="margin-right: 150px;margin-top: 10px;"> EDIT </a>

            <form action="{{route('departments.destroy',$department->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" style="margin-left: 120px;margin-top: -69px;">DELETE</button>
            </form>
        </div>
        </div>
    @endforeach
   <a href="{{route('courses.index')}}" class="btn btn-primary">Courses</a>
   {{ $departments->links() }}
   <a href="{{route('users.index')}}" class="btn btn-primary">Users</a>
   {{ $departments->links() }}
    @endsection
    

</body>
</html>