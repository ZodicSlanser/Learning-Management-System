<?php


namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    //this function find Course that i clicked on it *ezzat*
    public function showMatrial($id)
    {

        $course = Course::find($id);
        return view("professor.show_course_matrial")->with("course",$course);

    }

    //this function return all students that in this course i clicked *ezzat*
    public function showStudents($id)
    {
        $studentsEnreolment = Enrollment::where('course_id', $id)->get();
        $size = 0;
        foreach($studentsEnreolment as $item)
        {
            $studentid = $item->student_id;
            $studentname[$size] = User::find($studentid);
            $size++;
        }
        return view('professor.show_Students')->with("studentE",$studentsEnreolment)->with("studentU",$studentname);
    }

    //this function return student i want edit on it *ezzat*
    public function edit($id,$course)
    {
        $studegre = Enrollment::where('student_id', $id)
                                ->where('course_id',$course)
                                ->first();

        return view('professor.editStudent')->with("stuD",$studegre);
        //return dd($studegre);
    }

    //this function update the grade of student *ezzat*
    public function update(Request $request, $id, $course)
    {
        $validatedData = $request->validate([
            'stugrade' => 'required|numeric|between:0,100',
        ]);

        DB::table('enrollments')
            ->where('student_id', $id)
            ->where('course_id', $course)
            ->update(['grade' => $validatedData['stugrade']]);

        return redirect('/professorCourses');
    }

    //this function Delete the file *ezzat*
    public function deleteFile($id, $filename)
    {
        $course = Course::find($id);
        $filePath = storage_path('app/' . $course->name . '/' . $filename);

        if (file_exists($filePath)) {
            unlink($filePath);
            return back()->with('success', 'File deleted successfully :)');
        }

        return back()->with('error', 'File not found :(');
    }
}
