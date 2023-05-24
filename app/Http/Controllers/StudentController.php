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
    public function index($id)
    {
        $course = Course::find($id);
        $path_subject = "public/material/" . $course->name;

        // Retrieve the files uploaded by the uploadFiles method
        $files = Storage::files($path_subject);

        $fileList = [];
        foreach ($files as $file) {
            $originalFileName = pathinfo($file, PATHINFO_FILENAME); // Get the original file name
            $extension = pathinfo($file, PATHINFO_EXTENSION); // Get the file extension

            // Remove the 'public/' prefix from the file path
            $url = str_replace('public/', '', $file);

            // Generate the full URL including the 'storage' directory
            $fullUrl = asset('storage/' . $url);

            array_push($fileList, ['name' => $originalFileName, 'extension' => $extension, 'url' => $fullUrl]);
        }

        return view('material_file', ['files' => $fileList]);
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

    public function registration(){
        $user = Auth::user();
        $unenrolled_courses = Enrollment::where('student_id' ,"!=",$user->id)->get();
        return view('reg_course' , [ 'courses' => $unenrolled_courses, 'item' => $user, ]);
    }

    public function reg_form(Request $requset){
        $formfields = $requset->validate([
            'course_id' => 'required'
           ]);

           $formfields['student_id'] = Auth::user()->id;
           $course = Course::find($formfields['course_id']);
           $student = User::find($formfields['student_id']);
           $x = new Enrollment();
           $enroll = $x->enroll($student, $course);
           if ($enroll) {
              Enrollment::create($formfields);
              return Redirect::route('students.x');
           }
           return \redirect()->back()->with('status', 'You are already enrolled in this course');



    }
}
