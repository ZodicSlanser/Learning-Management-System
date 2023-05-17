<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@extends('extend')
@section('content')

    <form action="{{route('departments.update',$departments->id)}}" method="post">
        @csrf
        @method('put')
        <div>
            <label>Name</label>
            <input class="form-control" type="text" placeholder="Name" name="name" value="{{$departments ->name }}">
            @error('name')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div>
            <label>Code</label>
            <input class="form-control" type="text" placeholder="code" name="code" value="{{$departments ->code}}">
            @error('code')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
        </div>


        <div>
            <button class="btn btn-success" type="submit">EDiT</button>
        </div>
    </form>
@endsection
</body>
</html>
