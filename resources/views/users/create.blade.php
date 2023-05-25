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
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if (session('statu'))
        <div class="alert alert-danger">
            {{ session('statu') }}
        </div>
    @endif

    <h1>
        <a href="{{route('users.index')}}"> Login NOW

        </a>
    </h1>
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
           <a href="{{route("user.restore.index")}}">
             <i class='bx bx-folder' ></i>
             <span class="links_name">Restore File </span>
           </a>
           <span class="tooltip">Restore-Files</span>
         </li>
         <li>
          <a href="#">
            
            <form action="{{route('students')}}" method="POST">
              @csrf
              @method('POST')
              <button class="bx bx-user" name="Student" style="margin-top: 3px;margin-left: 15px"></button>
            
           
             </form>  
            <span class="links_name">Students</span>
          </a>
          <span class="tooltip">Students</span>
        </li>
         <li>
           <a href="#">
            <form action="{{route('doctors')}}" method="POST">
              @csrf
              @method('POST')
              <button class="bx bx-user" name="Doctor" style="margin-top: 3px;margin-left: 15px; back "></button>
            
           
             </form>  
             <span class="links_name">Doctors</span>
           </a>
           <span class="tooltip">Doctors</span>
         </li>
         <li>
           <a href="#">
            
            <form action="{{route('admins')}}" method="POST">
              @csrf
              @method('POST')
              <button class="bx bx-user" name="Admin" style="margin-top: 3px;margin-left: 15px"></button>
            
           
             </form>              
              <span class="links_name">Admin</span>
           </a>
           <span class="tooltip">Admin</span>
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

        <form action="/users" method="post" style="margin-top:10%;margin-left: 20%;position: absolute; background-color: black ;border: 2px solid rgb(64, 64, 64) ;border-radius: 20px;width: 50%">
            @csrf
            <div class="input-group mb-3" style="margin-top: 50px">
                <span class="input-group-text" id="basic-addon1">@</span>
                <input class="form-control" type="text" placeholder="name" name="name" value="{{ old('name') }}">
                @error('name')
                <div class="alert alert-danger">
                    {{ $message  }}
                </div>
                @enderror
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"> username </span>
                <input class="form-control" type="text" placeholder="username" name="username"
                       value="{{ old('username') }}">
                @error('username')
                <div class="alert alert-danger">
                    {{ $message  }}
                </div>
                @enderror
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">email</span>
                <input class="form-control" type="email" placeholder="email" name="email" value="{{ old('email') }}">
                @error('email')
                <div class="alert alert-danger">
                    {{ $message  }}
                </div>
                @enderror
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"> password</span>
                <input class="form-control" type="password" placeholder="password" name="password"
                       value="{{ old('password') }}">
                @error('password')
                <div class="alert alert-danger">
                    {{ $message  }}
                </div>
                @enderror
            </div>


            <div>

                <select class="form-control" name="department_id">
                    <option value="  ">departments</option>
                    @foreach ($departments as $department)
                        <option value=" {{$department ->id}} ">{{$department ->name}}</option>
                    @endforeach
                    @error('record')

                    @enderror
                </select>

            </div>
            <div style="margin-left: 35%;margin-top: 1% ;padding: 10px">
                <span class="gender"><input name="role" type="radio" value="2"{{old('role')=='2' ? 'checked' : ''}}   /> Doctor</span>
                <span class="gender"><input name="role" type="radio" value="3"{{old('role')=='3' ? 'checked' : ''}}  /> Student</span>
                <span class="gender"><input name="role" type="radio" value="1"{{old('role')=='1' ? 'checked' : ''}} /> Admin</span>

                @error('role')
                <div class="alert alert-danger">
                    {{ $message  }}
                </div>
                @enderror
            </div>

            <br><br>
            <button name="createD" class="btn btn-success" type="submit" style="margin-left: 46%;margin-top:-10%">Create</button>
        </form>

    
@endsection
</body>
</html>


