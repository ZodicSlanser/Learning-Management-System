<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/generate.css') }}">
    <title>Generate</title>
</head>
<body>

<div class="main-content">
    <div class="title">
        @foreach($courses as $course)
            {{$course->name}}
        @endforeach

    </div>

    <div class="menu-bar">

    </div>
    <div class="icon-bar">
        <div class="icon-bar__clipboard">
            <div class="icon-paste">
                <div class="icon" style="margin-top: -40px">
                    <a href="{{ route('generate.download', ['course_id' => $course->id]) }}" class="btn btn-primary">download</a>

                </div>

            </div>
            <div class="icon icon-cut"></div>
            <div class="icon icon-copy"></div>
            <div class="icon-bar__name">Clipboard</div>
        </div>
        @include('partials._header_generate')
        <div class="icon-bar__cells">
            <div class="cell-insert">
                <div class="icon"></div>
            </div>
            <div class="cell-delete">
                <div class="icon"></div>
            </div>
            <div class="cell-format">
                <div class="icon"></div>
            </div>
            <div class="icon-desc">
            </div>
            <div class="icon-desc"><a href="{{route('courses.index')}}">
                    <button style="background-color: cornflowerblue;cursor: pointer;">courses</button>
                </a>
            </div>
            <div class="icon-desc">Format</div>
            <div class="icon-bar__name">Cells</div>
        </div>
    </div>
    <div class="cell-content">
        <div>fx</div>
        <div></div>
    </div>
    <div class="cells">
        @include('partials._cells')

        @foreach ($enrollments as $enrollment)

            <input class="cells__input" value="{{$enrollment->student->academic_number}}"/>
            <input class="cells__input" value="{{$enrollment->student->name}}"/>

            <button name="delete" type="submit" value="delete"
                    style=" font-weight: bold;cursor: pointer;background-color: rgb(208, 0, 0);text-color: black; width: 127px;height: 25px;border-radius: 10px">
                <a href="{{  route('enrollment.delete', ['enrollment_id' => $enrollment->id, 'course_id'=>$enrollment->course->id]) }}">Delete</a>
            </button>

            <input class="cells__input"/>
            <input class="cells__input"/>
            <input class="cells__input"/>
            <input class="cells__input"/>
            <input class="cells__input"/>
            <input class="cells__input"/>
            <input class="cells__input"/>
            <input class="cells__input"/>
        @endforeach
        @include('partials._input')
    </div>

</div>
</body>
</html>
