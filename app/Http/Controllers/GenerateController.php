<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class GenerateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    

    // Delete the user in table rollments

    if(isset($_POST['delete'])){

        return Redirect::route('generate.index')->with('status','Deleted Sucessfuly .');
    }

    // update the name in table users 

    elseif(isset($_POST['edit'])){
        return Redirect::route('generate.show')->with('status','update Sucessfuly .');

    }
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // old one use the select
       
       /*  $course = $_POST['course'];
           $courses=Enrollment::where('course_id','=',$course)->with('student','course')->get();
           $ncourse = Course::where('id',$course)->get();
           return view('generate.show',['information'=>$courses,'ncourses'=>$ncourse]);}*/

       // new one in click the course show , generate of thes course

           $courses=Enrollment::where('course_id','=',$id)->with('student','course')->get();
           $ncourse = Course::where('id',$id)->get();
           return view('generate.show',['information'=>$courses,'ncourses'=>$ncourse]);
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enrollment $enroll)
    {
        //write this in action           <!--{{route('generate.destroy',$info->academic_number)}}-->
      // $enroll->destroy();
    
    }
}
