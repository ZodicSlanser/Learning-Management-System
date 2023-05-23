@if(isset($showindetails) && $showindetails==true)
            <div>


               Course ID : {{$u->course->id}}

               <br>
                Course Name : {{$u->course->name}}


             </div>

             <br>
@else
    <div>
        <a href='/students/{{ $u->id }}'>
           {{ $u->id }} - {{ $u->name }}
    </div>


@endif
