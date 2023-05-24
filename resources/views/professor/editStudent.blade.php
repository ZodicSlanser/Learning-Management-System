<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{@asset("css/edit_student.css")}}" rel="stylesheet">
    <title>edit</title>
</head>
<body>

        <h1 style="color: aliceblue">Edit Student</h1>

        <div class="container">
            <div class="img">
                <img id="photo" src="{{URL("img2/edit2.svg")}}">
            </div>

                <form action="{{route('student.update' , ['id' => $stuD->student_id ,'course' => $stuD->course_id])}}" method="POST">
                    @csrf
                        <label style="color: aliceblue ;font-size: 20px;" >Grade</label>
                        <input class = "inp" min="0" max="100" type="number" value="{{$stuD->grade}}" name="stugrade" class="form-control" placeholder="New grade">
                        <button class="btn">Update Data</button>
                </form>
        </div>

</body>
</html>
