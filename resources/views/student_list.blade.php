@extends('basic')

@section('addition')
    @foreach ($students as $child)
        <x-student-infocomp :u="$child"/>

    @endforeach

@endsection
