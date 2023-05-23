@extends('basic')

@section('addition')

<form action="/supcourse"  method="POST">
@csrf
    <label>Course : </label>

    <select name="course_id">
        
            @foreach ($courses as $Course)
                    
                <option value="{{$Course['id']}}">
                    {{$Course['name']}}
                </option> 


            @endforeach

    </select>
   <br>

    <br>
    <button type="submit">Save</button>

</form>
            
   @endsection

   @section('namestudent')
{{Auth::user()->name}}
@endsection

@section('numstudent')
{{Auth::user()->academic_number}}
@endsection

