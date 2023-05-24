<!DOCTYPE html>
<!-- Created by Zead Shalaby-->
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title> Responsive Sidebar Menu | STUDENT_PAGE </title>
    <link rel="stylesheet" href="{{@asset("css/app.css")}}">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="sidebar">
    <div class="logo-details">
        <i class='bx bxl-c-plus-plus icon'></i>
        <div class="logo_name">Stu_Profile</div>
        <i class='bx bx-menu' id="btn"></i>
    </div>
    <ul class="nav-list">
        <li>
            <i class='bx bx-search'></i>
            <input type="text" placeholder="Search...">
            <span class="tooltip">Search</span>
        </li>

        <li>
            <a href="/regcourse">
                <i class='bx bx-user'></i>
                <span class="links_name">Material Registration</span>
            </a>
            <span class="tooltip">Material Registration</span>
        </li>

        <li>
            <a href="/crs_student">
                <i class='bx bx-folder'></i>
                <span class="links_name">Material Content</span>
            </a>
            <span class="tooltip">Material Content</span>
        </li>

        <li>
            <a href="#">
                <i class='bx bx-chat'></i>
                <span class="links_name">Messages</span>
            </a>
            <span class="tooltip">Messages</span>
        </li>

        <li>
            <a href="#">
                <i class='bx bx-heart'></i>
                <span class="links_name">Saved</span>
            </a>
            <span class="tooltip">Saved</span>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-cog'></i>
                <span class="links_name">Setting</span>
            </a>
            <span class="tooltip">Setting</span>
        </li>

        <li class="profile">
            <div class="profile-details">
                <img src="image/profile.jpg" alt="profileImg">
                <div class="name_job">
                    <div class="name">@yield('namestudent')</div>
                    <div class="job">@yield('numstudent')</div>
                </div>
            </div>

            <a href="/logout">
                <button name="logout"><i class='bx bx-log-out' id="log_out"></i></button>
            </a>

        </li>
    </ul>
</div>
<section class="home-section">

    <div class="text">
        @yield('addition')
    </div>

</section>

<script src="js/script.js"></script>

</body>
</html>
