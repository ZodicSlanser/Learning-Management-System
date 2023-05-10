<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $courses = Course::where('prerequisite_id', '!=',"")->paginate(15);
        return view('courses.index',['courses'=>$courses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $doctors  = DB::table('users')->where('role', '=', 2)->get();
        $courses = Course::get();
        $departments = Department::get();
       
        return view('courses.create',['departments' =>$departments,'courses'=>$courses,'doctors'=>$doctors]);

    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $formFields = $request -> validate([
      
            'name'=>'required',
            'code'=>'required',
            'prerequisite_id'=>'required',
            'department_id'=>'required',
            'professor_id'=>'required',
       
    ]);
 
   Course::create($formFields);

   return Redirect::route('courses.index')->with('status',"Create sucessfuly .");
   
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
      
        $course = Course::where('id','=',$id)->with('department','professor','course')->first();
       
        return view( 'courses.show' , [ 'courses' => $course ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
        $doctors  = DB::table('users')->where('role', '=', 2)->get();
        $departments = Department::get();
       
        return view('courses.edit',['departments' =>$departments,'courses'=>$course,'doctors'=>$doctors]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //
        $formFields = $request -> validate([
      
            'name'=>'required',
            'code'=>'required',
            'prerequisite_id'=>'required',
            'department_id'=>'required',
            'professor_id'=>'required',
       
    ]);

    $course->update($formFields);

    return Redirect::route('courses.show', $course->id)->with('status',"Update Successfuly .");
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
         $check = DB::table('courses')->where('prerequisite_id',$course->id)->first(); 
      // $check2 = DB::table('users')->where('department_id',$department->id)->first(); 

       if($check!=""){
        return Redirect::route('courses.index')->with('warning','Warning CanNot Deleted Delete Child First.');

       }
       else{
        $course ->delete();
        return Redirect::route('courses.index')->with('status','Deleted Sucessfuly .');
      }
    }
}
