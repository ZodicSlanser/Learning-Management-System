<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>courses create</title>
</head>
<body>
@extends('extend')
@section('content')

    <form action="/courses" method="post">
        @csrf
        <div>
            <label>Name</label>
            <input class="form-control" type="text" placeholder="Name" name="name" value="{{ old('name') }}">
            @error('name')
            <div class="alert alert-danger">
                {{ $message  }}
            </div>
            @enderror
        </div>

        <div>
            <label>Code</label>
            <input class="form-control" type="text" placeholder="code" name="code" value="{{ old('code') }}">

            @error('code')
            <div class="alert alert-danger">
                {{ $message }}

            </div>

            @enderror
        </div>

        <div>
            <label>Department_id</label>

            <select class="form-control" name="department_id">
                <option value=" . ">departments</option>
                @foreach ($departments as $department)
                    <option value=" {{$department ->id}} ">{{$department ->name}}</option>
                @endforeach
                @error('department_id')

                @enderror
            </select>

        </div>

        <div>
            <label>prerequisite Subjects</label>

            <select class="form-control" name="prerequisite_id">
                <option value=" . ">prerequisite</option>
                @foreach ($courses as $course)
                    <option value=" {{$course ->id}} ">{{$course ->name}}</option>
                @endforeach
                @error('prerequisite_id')

                @enderror
            </select>

        </div>

        <div>
            <label>Professor OF Subjects</label>

            <select class="form-control" name="professor_id">
                <option value=" . ">professor</option>

                @foreach ($doctors as $doctor)
                    <option value=" {{$doctor ->id}} ">{{$doctor ->name}}</option>
                @endforeach
                @error('professor_id')

                @enderror
            </select>


        </div>


        <div>
            <button name="create" class="btn btn-success" type="submit">Save</button>
        </div>
    </form>
@endsection
</body>
</html>
