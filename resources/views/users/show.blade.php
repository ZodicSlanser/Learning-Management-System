<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/users.show.css')}}" rel="stylesheet">
    <link href="{{asset('css/courses.show.css')}}" rel="stylesheet">

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


      <aside class="profile-card">
        <header >
          <!-- here’s the avatar -->
          <a target="_blank" href="#">
            <img src="http://lorempixel.com/150/150/people/" class="hoverZoomLink">
          </a>
      
          <!-- the username -->
          <p>
          <span class="spans"> Name: </span>{{$users->name}}
          </p>
      
          <!-- and role or location -->
            </p>
            <span class="spans"> Departments:</span> @isset($users ->departments ->name)
                
            {{$users ->departments ->name}}   
            
            @else
            {{"Null Departments"}}
            @endisset
        </p>
        <p>
          <span class="spans"> Email:</span> {{$users ->email}}   
       </p>
       <p>
            
        <span class="spans">  password: </span> {{$users ->password}}

     </p>
      
     <p>
      <span class="spans"> Academic_Number:</span> {{$users ->academic_number}}
      
   </p>
       <p>
        <span class="spans"> Gender:</span> @if($users->role=="2")
            {{"Doctors"}}
        @else
        @if($users->role=="3")
            {{"Students"}}
          @else
          {{"Admin"}}  
        @endif
        @endif
       </p>
        </header>
       
      
        <!-- bit of a bio; who are you? -->
        <div class="profile-bio" >
      
        </div>
      
       
      </aside>

@endsection

</body>
</html>
