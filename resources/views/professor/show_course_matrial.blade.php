<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{$course->name}}

    <form method="POST" action="{{ route('upload',$course->id) }}" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file">
        <button type="submit">Upload</button>
    </form>

    {{-- if u want do alert --}}
    @if (session('success'))
    {{-- alert --}}
    @endif

    {{-- show all files in folder --}}
    <div class="file-list">
        <?php

        $folderPath = storage_path('app/' . $course->name);

        if (is_dir($folderPath)) {

        $files = scandir($folderPath);
        
        foreach ($files as $file) {

            if ($file === '.' || $file === '..') {
                continue;
            }

            $filePath = asset('storage/' . $file);
            echo '<div class="file-link">';
            echo '<i class="fa fa-file"></i>';
            echo '<a href="' . $filePath . '" download>' . $file . '</a>';
            echo '</div>';

            }

        }

        else 
        {
        echo 'Folder not found.';
        }

        ?>
    </div>

</body>
</html>