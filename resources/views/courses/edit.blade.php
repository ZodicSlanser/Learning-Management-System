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
        <input  class="form-control" type="text"  placeholder="Name" name="name" value="{{$courses ->name }}">
        @error('name')
        <div class="alert alert-danger">
            ${{ $message }}
        </div>
        @enderror
        </div>

        <div>
            <label>Code</label>
            <input  class="form-control" type="text"  placeholder="code" name="code" value="{{$courses ->code}}">
            @error('code')
            <div class="alert alert-danger">    
            {{ $message }}
            </div>

            @enderror
       
        
            <div>
                <label>Department_id</label>

                <select  class="form-control" name="department_id">
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

            <select  class="form-control"  name = "prerequisite_id" >
                <option value="  {{$courses ->prerequisite_id}} ">{{$courses ->course->name}}</option>
            
             @error('record')
                 
             @enderror
            </select>  

    </div>

    <div>
        <label>Professor OF Subjects</label>

        <select  class="form-control" name="professor_id">
            <option value="{{$courses ->professor->id}}">{{$courses ->professor->name}}</option>
         @foreach ($doctors as $doctor)
             <option value=" {{$doctor ->id}} ">{{$doctor ->name}}</option>
         @endforeach
         @error('record')
             
         @enderror
        </select> 
    

</div>

        <div>
            <button  class="btn btn-success" type="submit" >EDiT</button>
        </div>
    </form>
    @endsection
</body>
</html>




