<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="container col-6">
    <h1 class="text-info text-center">Edit Student</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{route('student.update' , ['id' => $stuD->student_id ,'course' => $stuD->course_id])}}"
                  method="POST">
                @csrf
                <div class="form-group">
                    <label>Grade</label>
                    <input type="number" value="{{$stuD->grade}}" name="stugrade" class="form-control"
                           placeholder="New grade">
                </div>
                <button class="btn btn-warning">Update Data</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
