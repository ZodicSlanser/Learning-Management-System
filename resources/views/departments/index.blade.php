<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/departments.index.css')}}" rel="stylesheet">


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
    <div class="sidebar">
        <div class="logo-details">
          <i class='bx bxl-c-plus-plus icon'></i>
            <div class="logo_name">Restore  Courses</div>
            <i class='bx bx-menu' id="btn" ></i>
        </div>
        <ul class="nav-list">
          <li>
            <form action="{{route('departments.search')}}" method="POST">
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


    @foreach ($departments as $department)
    <div class="container">
   
        <div class="box">
               
            
                     <!-- Card: Beach -->
                     <section class="card-section" >
                        <div class="card" style="background-color: black;height: 15rem">
                            <div class="flip-card">
                                <div class="flip-card__container">
                                    <div class="card-front">
                                        <div class="card-front__tp card-front__tp--beach">
                                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewBox="0 0 60 60" style="enable-background:new 0 0 60 60;" xml:space="preserve" class="card-front__icon">
                                       <path d="M57.2,28h-7.4c-0.4-4-2-7.7-4.4-10.6l3.2-3.2c0.8-0.8,0.8-2,0-2.8c-0.8-0.8-2-0.8-2.8,0l-3.2,3.2c-3-2.4-6.6-4-10.6-4.4V2.8
                                           c0-1.1-0.9-2-2-2s-2,0.9-2,2v7.4c-4,0.4-7.7,2-10.6,4.4l-3.2-3.2c-0.8-0.8-2-0.8-2.8,0c-0.8,0.8-0.8,2,0,2.8l3.2,3.2
                                           c-2.4,3-4,6.6-4.4,10.6H2.8c-1.1,0-2,0.9-2,2s0.9,2,2,2h7.4c0.4,4,2,7.7,4.4,10.6l-3.2,3.2c-0.8,0.8-0.8,2,0,2.8
                                           c0.4,0.4,0.9,0.6,1.4,0.6s1-0.2,1.4-0.6l3.2-3.2c3,2.4,6.6,4,10.6,4.4v7.4c0,1.1,0.9,2,2,2s2-0.9,2-2v-7.4c4-0.4,7.7-2,10.6-4.4
                                           l3.2,3.2c0.4,0.4,0.9,0.6,1.4,0.6s1-0.2,1.4-0.6c0.8-0.8,0.8-2,0-2.8l-3.2-3.2c2.4-3,4-6.6,4.4-10.6h7.4c1.1,0,2-0.9,2-2
                                           S58.3,28,57.2,28z M30,45.9c-8.8,0-15.9-7.2-15.9-15.9c0-8.8,7.2-15.9,15.9-15.9c8.8,0,15.9,7.2,15.9,15.9
                                           C45.9,38.8,38.8,45.9,30,45.9z"/>
                                       </svg>
                                       
                                                       <h2 class="card-front__heading" style="text-align: center">
                                                         {{$department->name}}
                                                       </h2>
                                                       <p class="card-front__text-price" style="text-align: center">
                                                           {{$department->code}}
                                                       </p>
                                        </div>
        
                                        <div class="card-front__bt">
                                            <p class="card-front__text-view card-front__text-view--beach">
                                                View me
                                            </p>
                                        </div>
                                    </div>
                                    <div class="card-back">
                                        <video class="video__container" autoplay muted loop>
                                            <source class="video__media" src="https://player.vimeo.com/external/332588783.sd.mp4?s=cab1817146dd72daa6346a1583cc1ec4d9e677c7&profile_id=139&oauth2_token_id=57447761" type="video/mp4">
                                        </video>
                                    </div>
                                </div>
                            </div>
        
                            <div class="inside-page">
                                <div class="inside-page__container">
                                    <h3 class="inside-page__heading inside-page__heading--beach">
                                        For Departments
                                    </h3>
                                    <p class="inside-page__text">
                                       {{$department->id}}
                                       {{$department->name}}

                                    </p>
                                    <a href="{{route('departments.show',$department->id)}}" class="inside-page__btn inside-page__btn--beach">View deals</a>
                                </div>
                            </div>
                        </div>
                    </section>
    

            <div>
                <a href="{{route('departments.edit',$department->id)}}" class="btn btn-info"
                   style="margin-left: 10px;margin-top: 5px;"> EDIT </a>


                <form action="{{route('departments.destroy',$department->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" style="margin-left: 100px;margin-top: -39px;">DELETE</button>
                </form>
            </div>
        </div>
        </div>
    </div>
    @endforeach

    <div style="margin-top: 1000px;margin-left: 980px">  {{ $departments->links() }}</div>
@endsection


</body>
</html>
