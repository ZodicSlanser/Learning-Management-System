<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Courses</title>
</head>
<body>
<style>

    .container {
        align-items: center;
        justify-content: center;
    }

    .card-box {
        width: 200px;
        height: 250px;
        border-radius: 20px;
        background: linear-gradient(170deg, rgba(58, 56, 56, 0.623) 0%, rgb(31, 31, 31) 100%);
        position: relative;
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.55);
        cursor: pointer;
        transition: all .3s;
    }

    .car {
        position: relative;
        cursor: pointer;
        transition: all .3s;
    }

    .car:hover {
        transform: scale(0.92);
    }


    .card_box0 {
        margin-top: -55px;
        position: relative;
        cursor: pointer;
        transition: all .3s;
    }


    .card-box span {
        position: absolute;
        overflow: hidden;
        width: 150px;
        height: 150px;
        top: -10px;
        left: -10px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .card-box span {
        position: absolute;
        width: 150%;
        height: 40px;
        top: 58px;
        margin-left: -58px;
        background-image: linear-gradient(45deg, #ff6547 0%, #ffb144 51%, #ff7053 100%);
        transform: rotate(-45deg) translateY(-20px);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-weight: 600;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.23);
    }

    .card-box span::after {
        content: '';
        position: absolute;
        width: 10px;
        bottom: 0;
        left: 0;
        height: 10px;
        z-index: -1;
        box-shadow: 140px -140px #cc3f47;
        background-image: linear-gradient(45deg, #FF512F 0%, #F09819 51%, #FF512F 100%);
    }


    .back0 {
        width: 95%;
        height: 100%;
        justify-content: center;
        display: flex;
        border-radius: 20px;
        align-items: center;
        overflow: hidden;
        background-color: #151515;

    }


</style>
@extends('extend')
@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}

        </div>
    @endif
    @if (session('warning'))
        <div class="alert alert-danger">
            {{ session('warning') }}

        </div>
    @endif
    <h1>
        <a href="{{route('courses.create')}}"> ADD NEW SUbJECT

        </a>
    </h1>
    <br><br>
    @foreach ($courses as $course)
        <div class="d-flex justify-content-between">

            <div>
                <a href="{{route('courses.show',$course->id)}}">

                    <div class="container">
                        <div class="car">

                            <div class="back0">
                                <div class="back_content">
                                    <div class="card-box">
                                        <span> {{$course->id}} - {{$course->name}}</span>
                                        <div style="border-radius: 50%;border: #000000;margin-top: ">
                                            <img
                                                style="position: relative; margin-left: 70px;margin-top: 50%;border-radius: 50%;border: #000000;"
                                                src="ca.png" alt="course">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card_box0">
                                <a href="{{route('generate.show',$course->id)}}" style="" class="btn btn-primary">Generate</a>

                                <a href="{{route('courses.edit',$course->id)}}" class="btn btn-info"
                                   style="margin-left: -27px;margin-top: -100px;">EDIT</a>

                                <form action="{{route('courses.destroy',$course->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                            style="margin-left: 100px;margin-top: -69px;"> DElETE
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                </a>
            </div>


        </div>
    @endforeach
    <a href="{{route('departments.index')}}" class="btn btn-primary">Departments</a>
    <a href="{{route('generate.index')}}" class="btn btn-primary">Generate</a>
    <a href="{{route('users.index')}}" class="btn btn-primary">Users</a>
    {{ $courses->links() }}
@endsection

</body>
</html>
