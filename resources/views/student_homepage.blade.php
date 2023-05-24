@extends('basic')

@section('addition')

    @if(isset(Auth::user()->email))
        <h3 align="center">This is student homepage</h3><br/>

        <div class="alert alert-danger success-block">
            <strong></strong>x
            <strong>Welcome {{ Auth::user()->email }}</strong>
            <strong>Your role is {{ Auth::user()->role }}</strong>
            <br/>
            <a href="{{ url('/logout') }}">Logout</a>
        </div>
    @else
        <script>window.location = "/home";</script>
    @endif

@endsection

@section('namestudent')
    {{Auth::user()->name}}
@endsection

@section('numstudent')
    {{Auth::user()->academic_number}}
@endsection

