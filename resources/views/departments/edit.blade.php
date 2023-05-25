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

    <form action="{{route('departments.update',$departments->id)}}" method="post" style="margin-top:10%;margin-left: 20%;position: absolute; background-color: black ;border: 2px solid rgb(64, 64, 64) ;border-radius: 20px;width: 50%">
        @csrf
        @method('put')
        <div>
            <label>Name</label>
            <input class="form-control" type="text" placeholder="Name" name="name" value="{{$departments ->name }}">
            @error('name')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div>
            <label>Code</label>
            <input class="form-control" type="text" placeholder="code" name="code" value="{{$departments ->code}}">
            @error('code')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
        </div>


        <div>
            <button class="btn btn-success" style="margin-left: 46%;margin-top: 5%"type="submit">EDiT</button>
        </div>
    </form>
@endsection
</body>
</html>
