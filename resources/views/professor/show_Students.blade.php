<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{@asset("css/show_students.css")}}" rel="stylesheet">
    <title>show student</title>
</head>
<body>
<?php
$size = 0;
?>
@foreach ($studentE as $item)
    <div>
            <p class="paragraph">{{$studentU[$size]->name}}
    {{$item->grade}}</p>
    <a class="edit"
           href="{{route('student.edit' , ['id' => $item->student_id,'course' => $item->course_id])}}">Edit</a></div>
    <br>
        <?php
        $size++;
        ?>
@endforeach
    <div class="container">
		<div class="img">
			<img id="photo" src="{{URL("img2/edit.svg")}}">
		</div>
    </div>
</body>
</html>
