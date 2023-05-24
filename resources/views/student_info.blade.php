@extends('basic')

@section('addition')

    @foreach ($student as $child)
        <x-student-infocomp :u="$child" showindetails="true"/>
    @endforeach

    {{-- <button>
     <a href="/regcourse/{{$child['student_id']}}"  style="text-decoration: none">New Course</a>
    </button> --}}
@endsection

@section('namestudent')
    {{Auth::user()->name}}
@endsection

@section('numstudent')
    {{Auth::user()->academic_number}}
@endsection

