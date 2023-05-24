<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{@asset("https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css")}}" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
   <link href="{{@asset("css/profHome.css")}}" rel="stylesheet">

</head>
<body>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  <div class="card-columns">
@foreach ($courses as $item)


        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{$item->name}}</h4>
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="moreActionsDropdown" data-toggle="dropdown">More actions
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('pr.co' , $item->id)}}">Upload</a>
                        <a class="dropdown-item" href="{{route('viewStudent', $item->id)}}">View</a>

                    </div>
                </div>



        </div>
    </div>

@endforeach</div>
</body>
</html>
