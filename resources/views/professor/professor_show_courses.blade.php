<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{@asset("css/profHome.css")}}"  rel="stylesheet">

</head>
<body>
<h1>HERE</h1>
    @foreach ($courses as $item)


        <div class="con" >
            <div class="card">
              <div class="container" >
                <h4> <b>{{$item->name}}</b> </h4>
    <!-- ................................................................. -->
                <div class="dropdown">
                <button class="dropbtn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                    <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                                        </svg>
                </button>
                  <div class="dropdown-content">
                    <a href={{route('pr.co' , $item->id)}}>Upload</a>
                    <a href={{route('viewStudent', $item->id)}}>View</a>

                  </div>
                </div>


              </div>
        </div>
        </div>
  <br>
  @endforeach
</body>
</html>
