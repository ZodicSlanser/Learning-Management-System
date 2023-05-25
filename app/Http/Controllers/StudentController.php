<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $student = Auth::user();
        $courseId = $request->id;
        $course = Course::findOrFail($courseId);

        if (!$student->has_enrolled_in($course)) {
            abort(403, 'Unauthorized');
        }

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


    public function show_students()
    {
        $students = User::where('role', '=', 3)->get();

        return view('student_list', ['students' => $students]);  //pass anything inside ass_array to view as variable

    }

    public function course_ofstudent()
    {
        $id = Auth::user()->id;
        $item = Enrollment::where('student_id', $id)->with('course')->get();
        return view('student_info', ['student' => $item]);

    }

    public function registration()
    {
         $user = Auth::user();
         $eligableCourese = User::get_eligable_courses($user->id);
        return view('reg_course', ['courses' => $eligableCourese, 'item' => $user,]);
    }

    public function reg_form(Request $requset)
    {
        $formfields = $requset->validate([
            'course_id' => 'required'
        ]);

        $formfields['student_id'] = Auth::user()->id;
        $course = Course::find($formfields['course_id']);
        $student = User::find($formfields['student_id']);
        $x = new Enrollment();
        $enroll = $x->enroll($student, $course);
        if ($enroll) {
            return Redirect::route('students.x');
        }
        return \redirect()->back()->with('status', 'Cannot enroll in course');


    }
}
