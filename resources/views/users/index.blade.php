<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link href="{{asset('css/courses.index.css')}}" rel="stylesheet">

    <title>Document</title>
</head>
<body>
<style>

</style>
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
        <a href="{{route('users.create')}}"> ADD NEW ACCOUNT

        </a>
    </h1>
    <br>

    <div class="sidebar">
        <div class="logo-details">
          <i class='bx bxl-c-plus-plus icon'></i>
            <div class="logo_name">Restore Courses</div>
            <i class='bx bx-menu' id="btn" ></i>
        </div>
        <ul class="nav-list">
          <li>
             <form action="{{route('users.search')}}" method="POST">
              
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
              <button class="bx bx-user" name="Doctor" style="margin-top: 3px;margin-left: 15px"></button>
            
           
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

    @foreach ($users as $user)
    <div class="container">
   
        <div class="box">
        <div class="card">
            <div class="content">
                <div class="back">
                    <div class="back-content">
                        <div class="card_box">
                            <span>@isset($users ->departments ->name)
                
                              {{$users ->departments ->name}}   
                              
                              @else
                              {{"Null Departments"}}
                              @endisset</span>
                        </div>
                        <svg stroke="#ffffff"
                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" height="50px" width="50px"
                             fill="#ffffff">

                            <g stroke-width="0" id="SVGRepo_bgCarrier"></g>

                            <g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier"></g>


                            <g id="SVGRepo_iconCarrier">
                             
                              <img src="{{URL("images/courses.svg")}}" style="width: 90px;margin-top: -10px;" alt="users">

                                
                            </g>

                        </svg>
                        <strong>  {{$user->id}}-{{$user->name}} </strong>

                        <strong style="margin-top: -10px;">  {{$user->academic_number}} </strong>

                    </div>

                </div>

                <div class="front">

                    <div class="img">
                        <div class="circle">
                        </div>
                        <div class="circle" id="right">
                        </div>
                        <div class="circle" id="bottom">
                        </div>
                    </div>

                    <div class="front-content">
                        <small class="badge">@if($user->role==2)
                        {{"Doctors"}}
                        @else
                        @if($user->role==3)
                        {{"Student"}}
                        @else
                        {{"Admin"}}
                        @endif
                        @endif
                        </small>
                        <div class="description">
                            <div class="title">
                                <p class="title">
                                    <strong></strong>
                                    <a href="{{route('users.show',$user->id)}}">
                                        {{$user->id}}-{{$user->name}}

                                    </a>
                                </p>
                                <svg fill-rule="nonzero" height="15px" width="15px" viewBox="0,0,256,256"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <g style="mix-blend-mode: normal" text-anchor="none" font-size="none"
                                       font-weight="none" font-family="none" stroke-dashoffset="0" stroke-dasharray=""
                                       stroke-miterlimit="10" stroke-linejoin="miter" stroke-linecap="butt"
                                       stroke-width="1" stroke="none" fill-rule="nonzero" fill="#20c997">
                                        <g transform="scale(8,8)">
                                            <path d="M25,27l-9,-6.75l-9,6.75v-23h18z"></path>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <p class="card-footer">
                                30 Mins &nbsp; | &nbsp; 1 Serving
                                <span ><div style="margin-top: 80px"><a href="{{route('users.edit',$user->id)}}" style="margin-left: 98px;margin-top: 0px" class="btn btn-info"> EDIT </a></div>
                <form action="{{route('users.destroy',$user->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" style="margin-top:-63px ">DELETE</button>
                </form>
            </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div></div>
        

    @endforeach
     <div style="margin-top: 1000px;margin-left: 800px"> {{ $users->links() }}</div>
@endsection

</body>
</html>
