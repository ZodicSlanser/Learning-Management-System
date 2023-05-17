@extends('basic')

@section('addition')

<form action="/supcourse"  method="POST">
@csrf
    <label>Course : </label>

    <select name="course_id">
        @foreach ($courses as $Course)
        
            <option value="{{$Course['id']}}">{{$Course['name']}}</option>
            
        @endforeach
       
       
    </select>
   <br>

   <label>Student_Id : </label>
   <input type="text" value="{{$item['id']}}" name="student_id">

    <br>
    <button type="submit">Save</button>

</form>
            
   @endsection