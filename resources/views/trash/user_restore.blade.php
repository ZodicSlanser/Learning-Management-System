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

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="{{asset('css/courses.restore.css')}}" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
 
    <title>Restore</title>
</head>
<body>
@extends('js')
@section('content')
    <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus icon'></i>
        <div class="logo_name">Restore Users</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
             <form action="{{route('users.restore.search')}}" method="POST">
              
              @csrf
              @method('POST')
              <button type="submit" name="find" style="cursor: pointer"> <i class='bx bx-search' style="margin-top: 10px"></i></button> 
             <input type="text" name="search" placeholder="Search...">
           
             </form>       
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
              <button class="bx bx-user" name="Doctor" style="margin-top: 3px;margin-left: 15px;  "></button>
            
           
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

  <img src="{{URL('images/course.svg')}}" alt="Users" style="width: 170px;margin-left: 608px">
  @foreach($users as $user)

    <div class="container">
    <div class="box">

        <a class="href" href="{{ route('user.restore', [ 'id'=> $user->id]) }}"><img class="restore"src="{{URL('images/restore.png')}}" alt="folder"></a>
        <img class="img" src="{{URL('images/folder (1).png')}}" alt="folder">
        <p style="text-align: center;font-size: 15px;color: blue">
            {{$user->username}}
            {{$user->role}}
        </p>
    </div>
 </div>      
</div>
@endforeach
@endsection
</body>
</html>