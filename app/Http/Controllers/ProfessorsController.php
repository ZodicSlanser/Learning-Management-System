<?php


namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProfessorsController extends Controller
{
    //this function return professor courses *ezzat*
    public function getCoursesByProfessorId()
    {

        $professorId = auth()->user()->id;

        $courses = Course::where('professor_id', $professorId)->get();

        return view("professor.professor_show_courses")->with("courses", $courses);

    }

    //this function upload files to courses *ezzat*
    public function uploadFiles(Request $request, $id)
    {
        $course = Course::find($id);

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $request->validate([
                'file' => 'max:30000|mimes:doc,docx,pdf,jpeg,png,jpg',
            ]);

            $path_subject = "material/" . $course->name; // Update the storage path
            $originalFileName = $file->getClientOriginalName(); // Get the original filename
            $extension = $file->getClientOriginalExtension(); // Get the file extension

            $fileName = Str::slug(pathinfo($originalFileName, PATHINFO_FILENAME)) . '.' . $extension; // Generate the filename with slug and extension

            $file->storeAs($path_subject, $fileName, 'public'); // Store the file in the specified directory with the generated filename

            $files = Storage::files($path_subject); // Retrieve all files in the directory

            $fileList = [];
            foreach ($files as $file) {
                $items_exlast = explode("/", $file);
                $lastItem = $items_exlast[count($items_exlast) - 1];
                array_push($fileList, ['name' => $lastItem, 'url' => Storage::url($file)]);
            }
            return back()->with('success', 'File uploaded successfully')->with('files', $fileList);
        }

        return back()->with('error', 'Something went wrong :(');
    }


    //this function find Course that i clicked on it *ezzat*
    public function showMaterial($id)
    {
        $course = Course::find($id);

        $path_subject = "public/material/" . $course->name; // Update the storage path

        $files = Storage::files($path_subject); // Retrieve all files in the directory

        $fileList = [];
        foreach ($files as $file) {
            $originalFileName = pathinfo($file, PATHINFO_FILENAME); // Get the original file name
            $extension = pathinfo($file, PATHINFO_EXTENSION); // Get the file extension

            array_push($fileList, ['name' => $originalFileName, 'extension' => $extension, 'url' => Storage::url($file)]);
        }

        return view("professor.show_course_material")
            ->with("course", $course)
            ->with("files", $fileList);
    }


    //this function return all students that in this course i clicked ezzat
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
    public function edit($id, $course)
    {
        $studegre = Enrollment::where('student_id', $id)
            ->where('course_id', $course)
            ->first();

        return view('professor.editStudent')->with("stuD", $studegre);
        //return dd($studegre);
    }

    //this function update the grade of student *ezzat*
    public function update(Request $request, $id, $course)
    {

        $validatedData = $request->validate([
            'stugrade' => 'required|numeric',
        ]);

        if ($validatedData['stugrade'] > 100 || $validatedData['stugrade'] < 0) {
            return back()->with('error', 'the grade should be between 0 and 100 :(');
        } else {
            DB::table('enrollments')
                ->where('student_id', $id)
                ->where('course_id', $course)
                ->update(['grade' => $validatedData['stugrade']]);
        }
        return redirect('/professorCourses');
    }

    //this function Delete the file *ezzat*
    public function deleteFile($id, $filename, Request $request)
    {
        $course = Course::find($id);
        $path_subject = "material/" . $course->name; // Update the storage path
        $filePath = $path_subject . '/' . $filename . '.' . $request->extension;

        if (Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
            return back()->with('success', 'File deleted successfully :)');
        }

        return back()->with('error', 'File not found :(');
    }


}
