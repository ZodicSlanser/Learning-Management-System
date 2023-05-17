@if(isset($showindetails) && $showindetails==true)
            <div> 
               
               
               ID_course : {{$u->course->id}}
              
               <br>
                course : {{$u->course->name}}
             

             </div>

             <br>
@else
    <div>
        <a href='/students/{{ $u->id }}'>
           {{ $u->id }} - {{ $u->name }}  
    </div>


@endif