@extends('basic')

@section('addition')
    @foreach ($files as $file)
        <a href="{{ $file['url'] }}" download>{{ $file['name'] }}</a>
        <br>
    @endforeach
@endsection

@section('namestudent')
    {{ Auth::user()->name }}
@endsection

@section('numstudent')
    {{ Auth::user()->academic_number }}
@endsection
