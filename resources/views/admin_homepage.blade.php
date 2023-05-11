<!doctype html>
<html lang="en">

<head>
    <title>home</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        .box {
            width: 600px;
            margin: 0 auto;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
<br/>
<div class="container box">
    @if(isset(Auth::user()->email))
        <h3 align="center"><strong>This is admin homepage</strong></h3><br/>

        <div class="alert alert-danger success-block">

            <strong>Welcome {{ Auth::user()->email }}</strong>
            <strong>Your role is {{ Auth::user()->role }}</strong>
            <br/>
            <a href="{{ url('/logout') }}">Logout</a>

        </div>
    @else
        <script>window.location = "/home";</script>
    @endif
    <br/>
</div>
</body>
</html>
