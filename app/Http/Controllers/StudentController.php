<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class StudentController extends Controller
{
    public function index($id){
        $course = Course::find($id);
        $path_subject = "public/material/" . $course->name;
        $files =Storage::files($path_subject);                    //retrive all files in directory


        $fileList = [];                                          //new array to contain name and url of each item in directory
        foreach($files as $file) {
            $items_exlast = explode("/", $file);                        //array  -->url to pieces
            $lastItem = $items_exlast[count($items_exlast) - 1];        // last item in array 

            array_push($fileList, ['name' => $lastItem, 'url' => Storage::url($file)]);
        }
        

        return view('material_file' , ['files' => $fileList]);


    }

    public function show_students(){
        $students = User::where('role', '=' , 3)->get();
    
        return view('student_list' , ['students'=> $students]);  //pass anything inside ass_array to view as variable
     
    }

    public function course_ofstudent(){
        $id = Auth::user()->id;

        $item = Enrollment::where('student_id'  , $id)->with('course')->get();
        
        return view('student_info', [ 'student' => $item ]);
     
    }

    public function regestration(){
        $id = Auth::user()->id;
        $item = User::find($id);
        $department = $item['department_id'];
        $en_student = Enrollment::where('student_id' ,$id)->get();
        $courses = Course::where( 'department_id', $department )->get();
        $courses_not_enrolled = [];
    
        foreach($courses as $course) {
          $shouldAddCourse = true;
          foreach($en_student as $subject) {
             if ($subject['course_id'] == $course['id']) {
                $shouldAddCourse = false;
             }
          }
          
          if ($shouldAddCourse == true) {
             array_push($courses_not_enrolled, $course);
          }
        }
    
        return view('reg_course' , [ 'courses' => $courses_not_enrolled, 'item' => $item,  'en_student' => $en_student]);
     
    }

    public function reg_form(Request $requset){
        $formfields = $requset->validate([
            'course_id' => 'required'
           ]);
           $formfields['student_id'] = Auth::user()->id;
        
           $course = Course::find($formfields['course_id']);
           $student = User::find($formfields['student_id']);
        
           $x = new Enrollment();
           $enroll = $x->reg_new_enroll($student, $course);
        
           if ($enroll) {
              Enrollment::create($formfields);
              return Redirect::route('students.x');
           }  else{
              
           return 'Nooooo';
           }
        
         
    }
}
