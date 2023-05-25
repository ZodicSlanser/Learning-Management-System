<?php

use App\Models\Department
?>

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
            <div class="logo_name">Restore  Courses</div>
            <i class='bx bx-menu' id="btn" ></i>
        </div>
        <ul class="nav-list">
          <li>
            <form action="{{route('departments.restore.search')}}" method="POST">
              @csrf
              @method('POST')
              <button type="submit" name="find" style="cursor: pointer"> <i class='bx bx-search' style="margin-top: 3px;margin-left: 5px"></i></button> 
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
           <a href="{{route("departments.restore.index")}}">
             <i class='bx bx-folder' ></i>
             <span class="links_name">Restore File </span>
           </a>
           <span class="tooltip">Restore-Files</span>
         </li>
         <li>
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

  <img src="{{URL('images/departments.svg')}}" alt="Users" style="width: 150px;margin-left: 615px">

@foreach($departments as $department)


    <div class="container">
    <div class="box">

        <a class="href" href="{{ route('department.restore', [ 'id'=> $department->id]) }}"><img class="restore"src="{{URL('images/restore.png')}}" alt="folder"></a>
        <img class="img" src="{{URL('images/folder (1).png')}}" alt="folder">
        <p style="text-align: center;font-size: 15px;color: blue">
            {{$department->name}}
        </p>
        

    </div>
 </div>
      
</div>
@endforeach
@endsection
</body>
</html>

