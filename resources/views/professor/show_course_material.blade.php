<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{@asset("css/show_course.css")}}" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <h2 style="color: #fff;">{{$course->name}} </h2>
	<div class="container">
		<div class="img">
			<img id="photo" src="{{URL("img2/uploading1.svg")}}">
		</div>
		
        <form class="form1" method="POST" action="{{ route('upload',$course->id) }}" enctype="multipart/form-data">
            @csrf
           <input  type="file" name="file" id="file">
            <button class="btn" type="submit">Upload</button>
        </form>
       
    @if (session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif
    
    @foreach ($files as $file)
        <div class="file-link">
            <i class="fa fa-file"></i>
            <a class="show_files" href="{{ $file['url'] }}" download>{{ $file['name'] }}</a>
            <form class="form1" action="{{ route('delete.file', ['id' => $course->id, 'filename' => $file['name'], 'extension' => $file['extension']]) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button class="btn2" type="submit">Delete</button>
            </form>
        </div>
    @endforeach
    
    @if (empty($files))
        Folder not found.
    @endif
    </div>











    {{-- <form method="POST" action="{{ route('upload',$course->id) }}" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file">
        <button type="submit">Upload</button>
    </form> --}}

    {{-- if u want do alert --}}
    {{-- @if (session('success'))
    <div class="alert">
        {{ session('success') }}
    </div>
@endif

@foreach ($files as $file)
    <div class="file-link">
        <i class="fa fa-file"></i>
        <a href="{{ $file['url'] }}" download>{{ $file['name'] }}</a>
        <form
            action="{{ route('delete.file', ['id' => $course->id, 'filename' => $file['name'], 'extension' => $file['extension']]) }}"
            method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
@endforeach

@if (empty($files))
    Folder not found.
@endif --}}

</body>
</html>