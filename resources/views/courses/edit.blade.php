@php use App\Models\Course; @endphp
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/label.all.css')}}" rel="stylesheet">

    <title>Document</title>

</head>
<body>

@extends('extend')
@section('content')
<div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus icon'></i>
        <div class="logo_name">Restore  Courses</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
          <i class='bx bx-search' ></i>
         <input type="text" placeholder="Search...">
         <span class="tooltip">Search</span>
      </li>
      <li>
        <a href="{{route('departments.index')}}">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Departments</span>
        </a>
         <span class="tooltip">Departments</span>
      </li>
    <li>
     <a href="{{route('users.index')}}">
       <i class='bx bx-user' ></i>
       <span class="links_name">User</span>
     </a>
     <span class="tooltip">User</span>
   </li>
  
   <li>
     <a href="{{route('courses.index')}}">
       <i class='bx bx-pie-chart-alt-2' ></i>
       <span class="links_name">courses</span>
     </a>
     <span class="tooltip">courses</span>
   </li>
   <li>
     <a href="{{route("course.restore.index")}}">
       <i class='bx bx-folder' ></i>
       <span class="links_name">Restore File </span>
     </a>
     <span class="tooltip">Restore-Files</span>
   </li>
       <a href="#">
         <i class='bx bx-cart-alt' ></i>
         <span class="links_name">Order</span>
       </a>
       <span class="tooltip">Order</span>
     </li>
     <li>
       <a href="#">
         <i class='bx bx-heart' ></i>
         <span class="links_name">Saved</span>
       </a>
       <span class="tooltip">Saved</span>
     </li>
     <li>
       <a href="#">
         <i class='bx bx-cog' ></i>
         <span class="links_name">Setting</span>
       </a>
       <span class="tooltip">Setting</span>
     </li>
     <li class="profile">
         <div class="profile-details">
           <img src="profile.jpg" alt="profileImg">
           <div class="name_job">
             <div class="name">Prem Shahi</div>
             <div class="job">Web designer</div>
           </div>
         </div>
        
        <button name="logout"><i class='bx bx-log-out' id="log_out" ></i></button>
      <span class="tooltip_logout">log_out</span>

     </li>
    </ul>
  </div>

    <form action="{{route('courses.update',$courses->id)}}" method="post" style="margin-top:10%;margin-left: 20%;position: absolute; background-color: black ;border: 2px solid rgb(64, 64, 64) ;border-radius: 20px;width: 50%">
        @csrf
        @method('put')
        <div>
            <label>Name</label>
            <input class="form-control" type="text" placeholder="Name" name="name" value="{{$courses->name }}">
            @error('name')
            <div class="alert alert-danger">
                ${{ $message }}
            </div>
            @enderror
        </div>

        <div>
            <label>Code</label>
            <input class="form-control"  type="text" placeholder="code" name="code" value="{{$courses ->code}}">
            @error('code')
            <div class="alert alert-danger">
                {{ $message }}
            </div>

            @enderror

            <div>
                <label>Department_id</label>

                <select class="form-control" name="department_id">
                    <option value=" {{$courses ->department_id}}">{{$courses ->department ->name}}</option>
                    @foreach ($departments as $department)
                        <option value=" {{$department ->id}} ">{{$department ->name}}</option>
                    @endforeach
                    @error('department_id')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </select>

            </div>

            <div>
                <label>prerequisite Subjects</label>
            <select class="form-control" name="prerequisite_id" >
                    @isset($courses->prerequisite_id)
                        @foreach(Course::where('id','!=', $courses->id)->get('name') as $course)
                            @if($course->id == $courses->prerequisite_id)
                                <option value="{{$course->id}}" selected>{{$course->name}}</option>
                            @else
                                <option value="{{$course->id}}">{{$course->name}}</option>
                            @endif
                        @endforeach
                        <option value="null">No Prerequisite</option>
                    @else
                        <option value="null">No Prerequisite</option>
                        @foreach(Course::where('id','!=', $courses->id)->get('name') as $course)
                            <option value="{{$course ->id}}">{{$course->name}}</option>
                        @endforeach

                    @endisset

                    @error('prerequisite_id')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </select>

            </div>

            <div>
                <label>Professor OF Subjects</label>

                <select class="form-control" name="professor_id">
                  @isset($courses ->professor->name)
                        
               <option value="{{$courses->professor->id}} ">
                        {{$courses->professor->name}}
                    </option>
                @else
                <option value="">
                 No professors
              </option>
                 @endisset

                    @foreach ($doctors as $doctor)
                        <option value=" {{$doctor ->id}} ">{{$doctor ->name}}</option>
                    @endforeach
                    @error('professor_id')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </select>

            </div>

            <div>
                <button class="btn btn-success" style="margin-left: 46%;margin-top: 5%" type="submit">EDiT</button>
            </div>
    </form>

@endsection
</body>
</html>



