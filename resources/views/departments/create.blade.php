<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <title>Document</title>
</head>
<body>

    @extends('extend')
    @section('content')
    <!--slide_par-->
    <div class="sidebar">
        <div class="logo-details">
          <i class='bx bxl-c-plus-plus icon'></i>
            <div class="logo_name">Adm_Profile</div>
            <i class='bx bx-menu' id="btn" ></i>
        </div>
        <ul class="nav-list">
          <li>
              <i class='bx bx-search' ></i>
             <input type="text" placeholder="Search...">
             <span class="tooltip">Search</span>
          </li>
          <li>
            <a href="#">
              <i class='bx bx-grid-alt'></i>
              <span class="links_name">Dashboard</span>
            </a>
             <span class="tooltip">Dashboard</span>
          </li>
          <li>
           <a href="#">
             <i class='bx bx-user' ></i>
             <span class="links_name">User</span>
           </a>
           <span class="tooltip">User</span>
         </li>
         <li>
           <a href="#">
             <i class='bx bx-chat' ></i>
             <span class="links_name">Messages</span>
           </a>
           <span class="tooltip">Messages</span>
         </li>
         <li>
           <a href="#">
             <i class='bx bx-pie-chart-alt-2' ></i>
             <span class="links_name">Analytics</span>
           </a>
           <span class="tooltip">Analytics</span>
         </li>
         <li>
           <a href="#">
             <i class='bx bx-folder' ></i>
             <span class="links_name">File Manager</span>
           </a>
           <span class="tooltip">Files</span>
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
              <img src="image/profile.jpg" alt="profileImg">
              <div class="name_job">
                 <div class="name">Prem Shahi</div>
                 <div class="job">Web designer</div>
               </div>
             </div>
            
             <a href="file:///D:/idea%20not%20field/Project_SW2/login2.html"> <button name="logout"><i class='bx bx-log-out' id="log_out" ></i></button></a>
    
         </li>
        </ul>
      </div>
      

<!--form create-->

    <form action="/departments" method="post">
        @csrf
        <div>
        <label>Name</label>
        <input class="form-control" type="text"  placeholder="Name" name="name" value="{{ old('name') }}">
        @error('name')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
        </div>

        <div>
            <label>Code</label>
            <input class="form-control" type="text"  placeholder="code" name="code" value="{{ old('code') }}">
            
            @error('code')
            <div class="alert alert-danger">
            {{ $message }}
            </div>
            @enderror

        </div>


        <div>
            <button class="btn btn-success" type="submit" >Supmit</button>
        </div>
    </form>
    @endsection
</body>
</html>