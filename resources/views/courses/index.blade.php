<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/courses.index.css')}}" rel="stylesheet">
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
    <div class="sidebar">
        <div class="logo-details">
          <i class='bx bxl-c-plus-plus icon'></i>
            <div class="logo_name">Restore  Courses</div>
            <i class='bx bx-menu' id="btn" ></i>
        </div>
        <ul class="nav-list">
          <li>
            <form action="{{route('courses.search')}}" method="POST">
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
         <a href="{{route("course.restore.index")}}">
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


    @foreach ($courses as $course)
    <div class="container">
   
        <div class="box">
            <div class="d-flex justify-content-between">

                <div>
                    <a href="{{route('courses.show',$course->id)}}">
            
                      
            
                                <div class="back0">
                                    <div class="back_content">
                                        <div class="card-box">
                                            <span> {{$course->id}} - {{$course->name}}</span>
                                            <div style="border-radius: 50%;border: #000000;margin-top: ">
                                                <img
                                                    style="position: relative; margin-left: -15px;margin-top: -20%;border-radius: 50%;border: #000000;"
                                                    src="{{URL("images/course.svg")}}" alt="course">
                                            </div>
                                        </div>
                                    </div>
                                </div>
            
                                <div class="card_box0">
                                    <a href="{{route('generate.show',$course->id)}}" style="" class="btn btn-dark">Generate</a>
            
                                    <a href="{{route('courses.edit',$course->id)}}" class="btn btn-dark"
                                       style="margin-left: -27px;margin-top: -100px;">EDIT</a>
            
                                    <form action="{{route('courses.destroy',$course->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-dark"
                                                style="margin-left: 100px;margin-top: -69px;"> DElETE
                                        </button>
                                    </form>
            
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            </div>
        </div>
    </div>
    @endforeach
    
    <br>
  <div style="margin-top: 1000px;margin-left: 980px">  {{ $courses->links() }}</div>
@endsection


</body>
</html>
