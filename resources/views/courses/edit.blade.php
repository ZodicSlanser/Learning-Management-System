@php use App\Models\Course; @endphp
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
    <form action="{{route('courses.update',$courses->id)}}" method="post">
        @csrf
        @method('put')
        <div>
            <label>Name</label>
            <input class="form-control" type="text" placeholder="Name" name="name" value="{{$courses->name }}">
            @error('name')
            <div class="alert alert-danger">
                ${{ $message }}
            </div>
            @enderror
        </div>

        <div>
            <label>Code</label>
            <input class="form-control" type="text" placeholder="code" name="code" value="{{$courses ->code}}">
            @error('code')
            <div class="alert alert-danger">
                {{ $message }}
            </div>

            @enderror

            <div>
                <label>Department_id</label>

                <select class="form-control" name="department_id">
                    <option value=" {{$courses ->department_id}}">{{$courses ->department ->name}}</option>
                    @foreach ($departments as $department)
                        <option value=" {{$department ->id}} ">{{$department ->name}}</option>
                    @endforeach
                    @error('record')

                    @enderror
                </select>

            </div>

            <div>
                <label>prerequisite Subjects</label>
                <select class="form-control" name="prerequisite_id">
                    @isset($courses->prerequisite_id)
                        @foreach(Course::where('id','!=', $courses->id)->get('name') as $course)
                            @if($course->id == $courses->prerequisite_id)
                                <option value="{{$course->id}}" selected>{{$course->name}}</option>
                            @else
                                <option value="{{$course->id}}">{{$course->name}}</option>
                            @endif
                        @endforeach
                        <option value="null">No Prerequisite</option>
                    @else
                        <option value="null">No Prerequisite</option>
                        @foreach(Course::where('id','!=', $courses->id)->get('name') as $course)
                            <option value="{{$course ->id}}">{{$course->name}}</option>
                        @endforeach

                    @endisset

                    @error('record')

                    @enderror
                </select>

            </div>

            <div>
                <label>Professor OF Subjects</label>

                <select class="form-control" name="professor_id">
                    <option value="@if($courses ->professor_id=="null")
                        {{'0'}}
                        @else
                        {{$courses ->professor->id}}">
                        @endif
                        @if($courses ->professor->name=="null")
                        {{"not prerequisite"}}
                        @else
                        {{$courses ->professor->name}}
                        @endif</option>
                    @foreach ($doctors as $doctor)
                        <option value=" {{$doctor ->id}} ">{{$doctor ->name}}</option>
                    @endforeach
                    @error('record')

                    @enderror
                </select>


            </div>

            <div>
                <button class="btn btn-success" type="submit">EDiT</button>
            </div>
    </form>
@endsection
</body>
</html>



