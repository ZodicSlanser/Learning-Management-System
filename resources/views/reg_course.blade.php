@extends('basic')

@section('addition')
    <html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="{{@asset("css/reg.css")}}" rel="stylesheet">
        <title>edit</title>
    </head>
    <body>

    <form action="/supcourse"  method="POST">
        @csrf
        <label class="n">Course : </label>

        <select class="sel" name="course_id">

            @foreach ($courses as $Course)

                <option value="{{$Course->id}}">
                    {{$Course->name}}

                </option>


            @endforeach

        </select>
        <br>

        <br>
        <button class="btn" type="submit">Save</button>
        <div class="img">
            <img id="photo" src="{{URL("css/img/save.svg")}}">
        </div>

    </form>
    </body>
    </html>
@endsection

@section('namestudent')
    {{Auth::user()->name}}
@endsection

@section('numstudent')
    {{Auth::user()->academic_number}}
@endsection
