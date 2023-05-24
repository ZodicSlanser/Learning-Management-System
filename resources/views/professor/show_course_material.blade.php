<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>{{ $course->name }}</h1>

<form method="POST" action="{{ route('upload', $course->id) }}" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file">
    <button type="submit">Upload</button>
</form>

@if (session('success'))
    <div class="alert">
        {{ session('success') }}
    </div>
@endif

@foreach ($files as $file)
    <div class="file-link">
        <i class="fa fa-file"></i>
        <a href="{{ $file['url'] }}" download>{{ $file['name'] }}</a>
        <form action="{{ route('delete.file', ['id' => $course->id, 'filename' => $file['name'], 'extension' => $file['extension']]) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
@endforeach

@if (empty($files))
    Folder not found.
@endif
</body>
</html>
