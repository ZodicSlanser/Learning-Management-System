<?php


namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class ProfessorsController extends Controller
{
    //this function return professor courses *ezzat*
    public function getCoursesByProfessorId()
    {
        
        $professorId = auth()->user()->id;

        $courses = Course::where('professor_id', $professorId)->get();
    
        return view("professor.professor_show_courses")->with("courses",$courses);
        
    }

    //this function upload files to courses *ezzat*
    public function uploadFiles(Request $request,$id)
    {

        $course = Course::find($id);
        
        if($request->hasFile('file'))
        {
            $file = $request->file('file');

            $request->validate([
                'file' => 'max:30000',
            ]);
            
            $filePath = $file->storeAs($course->name, $file->getClientOriginalName());

            return back()->with('success', $filePath);
        }
        
        return back()->with('error','something wrong :(');
        
    }

    public function showMatrial($id)
    {

        $course = Course::find($id);
        return view("professor.show_course_matrial")->with("course",$course);

    }
}
