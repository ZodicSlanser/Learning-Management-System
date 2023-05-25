<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::paginate(12);
        foreach ($courses as $course) {
            if (!$course->prerequisite_id) {
                $course->prerequisite_id = 'none';
            }
        }
        return view('courses.index', ['courses' => $courses]);
    }

    public function restore_index()
    {
        return view('trash.course_restore', ['courses' => Course::onlyTrashed()->get()]);
    }

    public function search_course(Request $request){
        if (isset($_POST['find'])) {
            $find = $_POST['search'];
            $course = Course::where('name',$find)->paginate(12);

            return view('courses.index', ['courses' => $course]);
        }
      }


      /*public function search_course_restore(Request $request){
        if (isset($_POST['find'])) {
            $find = $_POST['search'];
            $course = Course::where('name',$find)->paginate(12);

            return view('course.restore.index', ['courses' => $course]);
        }
      }*/



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $formFields = $request->validate([

            'name' => 'required|max:255',
            'code' => 'required|unique:departments|max:255',
            'prerequisite_id' => 'required',
            'department_id' => 'required',
            'professor_id' => 'required|nullable',

        ]);
        Storage::disk('local')->makeDirectory($formFields['name']);


        Course::create($formFields);

        return Redirect::route('courses.index')->with('status', "Created successfully .");

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $doctors = DB::table('users')->where('role', '=', Role::PROFESSOR)->get();
        $courses = Course::get();
        $departments = Department::get();

        return view('courses.create', ['departments' => $departments, 'courses' => $courses, 'doctors' => $doctors]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

        $course = Course::where('id', '=', $id)->with('department', 'professor', 'course')->first();

        return view('courses.show', ['courses' => $course]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
        $doctors = User::where('role', '=', Role::PROFESSOR)->get();

        $departments = Department::get();

        return view('courses.edit', ['departments' => $departments, 'courses' => $course, 'doctors' => $doctors]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'code' => 'required',
            'prerequisite_id',
            'department_id' => 'required',
            'professor_id' =>'required|nullable',
        ]);

        $course->update($formFields);

        return Redirect::route('courses.show', $course->id)->with('status', "Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //get all prerequisites of the course
        $prerequisites = Course::where('prerequisite_id', '=', $course->id)->get();

        foreach ($prerequisites as $prerequisite) {
            $prerequisite->prerequisite_id = null;
            $prerequisite->save();
        }

        $course->delete();
        return Redirect::route('courses.index')->with('status', 'Deleted Successfully, all dependant courses are now prerequisite-less');
    }

    public function restore()
    {
        $id = Request()->id;
        Course::onlyTrashed()->where('id', $id)->first()->restore();
        return Redirect::route('course.restore.index')->with('status', 'Restored Successfully.');
    }
}
