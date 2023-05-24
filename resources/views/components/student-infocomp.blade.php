@if(isset($showindetails) && $showindetails==true)
    <div>


        Course ID : {{$u->course->id}}

        <br>

        <a href=" {{route("student.material",[ 'id' => $u->course->id]) }} "> course : {{$u->course->name}}</a>
        <br>
        @if($u->grade == null)
            Grade : 0
        @else
            Grade : {{$u->grade}}

        @endif
    </div>

    <br>
@else
    <div>
        <a href='/allstudents'>
            {{ $u->id }} - {{ $u->name }}
    </div>

@endif
