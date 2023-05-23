@if(isset($showindetails) && $showindetails==true)
            <div> 
               
               
               ID_course : {{$u->course->id}}
              
               <br>

              <a href="/test{{$u->course->id}}" >  course : {{$u->course->name}}
              </a>

             </div>

             <br>
@else
    <div>
        <a href='/allstudents'>
           {{ $u->id }} - {{ $u->name }}  
    </div>


@endif