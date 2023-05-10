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
    @if (session('status'))
    <div class="alert alert-success">
          {{ session('status') }}
</div>
@endif

@if (session('statu'))
<div class="alert alert-danger">
    {{ session('statu') }}
</div>
    @endif

    <h1>
        <a href="{{route('users.index')}}"> Login NOW
            
        </a>
    </h1>
    <div>
        <form action="/users" method="post">
            @csrf
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">@</span>
            <input class="form-control" type="text"  placeholder="name" name="name" value="{{ old('name') }}">
            @error('name')
            <div class="alert alert-danger">
              {{ $message  }}
            </div>
        @enderror       
            </div>
    
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"> $</i></span>
            <input class="form-control" type="text"  placeholder="username" name="username" value="{{ old('username') }}">
            @error('username')
            <div class="alert alert-danger">
              {{ $message  }}
            </div>
        @enderror
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"> $</i></span>
            <input class="form-control" type="email"  placeholder="email" name="email" value="{{ old('email') }}">
            @error('email')
            <div class="alert alert-danger">
              {{ $message  }}
            </div>
        @enderror
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"> $</i></span>
            <input class="form-control" type="password"  placeholder="password" name="password" value="{{ old('password') }}">
            @error('password')
            <div class="alert alert-danger">
              {{ $message  }}
            </div>
        @enderror
          </div>
         
          
          <div>
      
            <select  class="form-control" name="department_id">
                <option value="  ">departments</option>
             @foreach ($departments as $department)
                 <option value=" {{$department ->id}} ">{{$department ->name}}</option>
             @endforeach
             @error('record')
                 
             @enderror
            </select>  
      
      </div>
    <div>
    <span><input name="role" type="radio"  value="2"{{old('role')=='2' ? 'checked' : ''}}  /> Doctor</span>
    <span><input name="role" type="radio"  value="3"{{old('role')=='3' ? 'checked' : ''}} /> Student</span>

    @error('role')
            <div class="alert alert-danger">
              {{ $message  }}
            </div>
        @enderror
    </div>
   
<br><br>
    <button name= "createD" class="btn btn-success" type="submit" >Create</button>
        </form>

<!--Student
/*
        <form action="/users" method="post">
            @csrf
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">@</span>
            <input class="form-control" type="text"  placeholder="Email" name="email" value="{{ old('email') }}">
            @error('email')
            <div class="alert alert-danger">
              {{ $message  }}
            </div>
        @enderror       
            </div>
    
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"> $</i></span>
            <input class="form-control" type="password"  placeholder="Password" name="pass" value="{{ old('pass') }}">
            @error('pass')
            <div class="alert alert-danger">
              {{ $message  }}
            </div>
        @enderror
          </div>
    <div>
    <span><input name="gender" type="checkbox"  value="3"{{old('gender')=='3' ? 'checked' : ''}} checked/> Student</span>
    @error('gender')
            <div class="alert alert-danger">
              {{ $message  }}
            </div>
        @enderror
    </div>
    <br><br>
    <button  name= "createS" class="btn btn-success" type="submit" >Create</button>
        </form>

    </div>*/-->
@endsection
</body>
</html>


