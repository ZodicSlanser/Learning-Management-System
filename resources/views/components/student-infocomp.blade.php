<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{@asset("css/reg.css")}}" rel="stylesheet">
    <link rel="stylesheet" href="{{@asset("https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css")}}" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="{{@asset("css/student_info.css")}}">
    <title>student</title>
</head>
<body>



@if(isset($showindetails) && $showindetails==true)


    <div class="card-columns">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> Course ID : {{$u->course->id}}</h4>
                <p> <a class="link" href=" {{route("student.material",[ 'id' => $u->course->id]) }} " >  course : {{$u->course->name}}</a></p>

                @if($u->grade == null)
                    Grade : 0
                @else
                    Grade : {{$u->grade}}

                @endif

                @else
                    <div>
                        <a href='/allstudents'>
                            {{ $u->id }} - {{ $u->name }}
                    </div>
                @endif
            </div>
        </div>



    </div>

</body>
</html>
