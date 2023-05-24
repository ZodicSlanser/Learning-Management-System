<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
$size = 0;
?>
@foreach ($studentE as $item)
    {{$studentU[$size]->name}}
    {{$item->grade}}
    <th><a class="btn btn-info"
           href="{{route('student.edit' , ['id' => $item->student_id,'course' => $item->course_id])}}">Edit</a></th>
    <br>
        <?php
        $size++;
        ?>
@endforeach
</body>
</html>
