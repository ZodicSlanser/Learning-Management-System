<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit User</title>
</head>
<body>
@extends('extend')
@section('content')

    <form action="{{route('users.update',$users->id)}}" method="post">
        @csrf
        @method('put')
        @csrf
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">@</span>
            <input class="form-control" type="text" placeholder="name" name="name" value="{{ $users->name }}">
            @error('name')
            <div class="alert alert-danger">
                {{ $message  }}
            </div>
            @enderror
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"> $</i></span>
            <input class="form-control" type="text" placeholder="username" name="username"
                   value="{{ $users->username }}">
            @error('username')
            <div class="alert alert-danger">
                {{ $message  }}
            </div>
            @enderror
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"> $</i></span>
            <input class="form-control" type="email" placeholder="email" name="email" value="{{ $users->email }}">
            @error('email')
            <div class="alert alert-danger">
                {{ $message  }}
            </div>
            @enderror
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"> $</i></span>
            <input class="form-control" type="password" placeholder="password" name="password"
                   value="{{ $users->password }}">
            @error('password')
            <div class="alert alert-danger">
                {{ $message  }}
            </div>
            @enderror
        </div>


        <div>


        </div>
        <select class="form-control" name="department_id">
            <option value=" {{$users ->department_id}} ">{{$users ->departments->name}}</option>
            @foreach ($departments as $department)
                <option value=" {{$department ->id}} ">{{$department ->name}}</option>
            @endforeach
            @error('record')

            @enderror
        </select>
        <br>
        <div>
            <input class="form-control" name="academic_number" type="text" value="{{$users->academic_number}}"> </span>
            @error('academic_number')
            <div class="alert alert-danger">
                {{ $message  }}
            </div>
            @enderror
        </div>
        <div>
            <br>
            <span><input name="role" type="radio" value="{{$users->role}}" checked> @if($users->role=="2")
                    {{"Doctors"}}
                @else
                    {{"Students"}}
                @endif
            </span>

            @error('role')
            <div class="alert alert-danger">
                {{ $message  }}
            </div>
            @enderror
        </div>

        <br><br>
        <button name="edit" class="btn btn-success" type="submit">update</button>


    </form>
@endsection

</body>
</html>
