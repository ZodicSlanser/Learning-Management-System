<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{@asset("css/show_students.css")}}" rel="stylesheet">
    <link href="{{@asset("css/sidebar.css")}}" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <title>show student</title>
</head>
<body>
{{-- side bar --}}
<div class="sidebar">
    <div class="logo-details">
        <i class='bx bxl-c-plus-plus icon'></i>
        <div class="logo_name">Stu_Profile</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">


        <li>
            <a href="/professorCourses">
                <i class='bx bx-user' ></i>
                <span class="links_name">showCourses</span>
            </a>
            <span class="tooltip">showCourses</span>
        </li>

        <li>
            <a href="/professorCourses3">
                <i class='bx bx-folder' ></i>
                <span class="links_name">Upload</span>
            </a>
            <span class="tooltip">Upload</span>
        </li>

        <li>
            <a href="/showStudents3">
                <i class='bx bx-chat' ></i>
                <span class="links_name">showStudents</span>
            </a>
            <span class="tooltip">showStudents</span>
        </li>

        <li>
            <a href="/student/edit51/course3">
                <i class='bx bx-heart' ></i>
                <span class="links_name">edit</span>
            </a>
            <span class="tooltip">Edit</span>
        </li>

        <li class="profile">
            <div class="profile-details">
                <img src="image/profile.jpg" alt="profileImg">
                <div class="name_job">
                    <div class="name">@yield('namestudent')</div>
                    <div class="job">@yield('numstudent')</div>
                </div>
            </div>

            <a href="/logout"> <button name="logout"><i class='bx bx-log-out' id="log_out" ></i></button></a>

        </li>
    </ul>
</div>
{{-- End of side bar --}}
<?php
$size = 0;
?>
@foreach ($studentE as $item)
    <div>
        <p class="paragraph">     {{$studentU[$size]->name}} {{$item->grade}} </p>

        <a class="edit"
           href="{{route('student.edit' , ['id' => $item->student_id,
            'course' => $item->course_id])}}">Edit</a>
    </div>
    <br>
        <?php
        $size++;
        ?>
@endforeach
<div class="container">
    <div class="img">
        <img id="photo" src="{{URL("img2/edit.svg")}}">
    </div>
</body>
</html>
