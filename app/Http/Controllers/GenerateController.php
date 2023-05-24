<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class GenerateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('generate/show');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $enrollment = Enrollment::where('course_id', '=', $id)->with('student', 'course')->get();
        $courses = Course::where('id', $id)->get();
        return view('generate.show', ['enrollments' => $enrollment, 'courses' => $courses]);

    }

    /**
     * Show the form for editing the specified resource.
     */

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

    public function deleteEnrollment()
    {
        $enrollment = Enrollment::where('id', '=', request()->enrollment_id)->first();
        $enrollment->delete();
        return Redirect::route('generate.show', request()->course_id)->with('status', "Deleted successfully .");
    }

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
