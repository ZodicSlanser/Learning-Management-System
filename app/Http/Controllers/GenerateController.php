<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class GenerateController extends Controller
{
    
    //get all students' names and academic numbers write them to a csv then return a response that would download them
    public function download($course_id)
    {
        $students = Enrollment::where('course_id', $course_id)->with('student', 'course')->get();
        $filename = Course::where('id', $course_id)->first()->name . ' students.csv';
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array('Academic Number', 'Name'));
        foreach ($students as $student) {
            fputcsv($handle, array($student->student->academic_number, $student->student->name));
        }
        fclose($handle);
        $headers = array(
            'Content-Type' => 'text/csv',
        );
        return response()->download($filename, $filename, $headers);
    }
}
