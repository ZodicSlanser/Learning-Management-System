<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $departments = Department::paginate(9);

        return view('departments.index', ['departments' => $departments]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $formFields = $request->validate([

            'name' => 'required',
            'code' => 'required',

        ]);

        Department::create($formFields);

        return Redirect::route('departments.index')->with('status', 'Created Successfully');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('departments.create');

    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {

        return view('departments.show', ['departments' => $department]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        return view('departments.edit', ['departments' => $department]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        //
        $formFields = $request->validate([

            'name' => 'required',
            'code' => 'required',

        ]);

        $department->update($formFields);

        return Redirect::route('departments.show', $department->id)->with('status', 'Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $courses = Course::where('department_id', '=', $department->id)->first();
        if ($courses) {
            foreach ($courses as $course) {
                $course->department_id = $_POST['department_id'];
            }
            $department->delete();
            return Redirect::route('departments.index')->with('status', 'Deleted Successfully, but there were courses in this department.');
        } else {
            $department->delete();
            return Redirect::route('departments.index')->with('status', 'Deleted Successfully.');
        }
    }

    public function resotore($id)
    {
        $department = Department::onlyTrashed()->where('id', $id)->first();
        $department->restore();
        return Redirect::route('departments.index')->with('status', 'Restored Successfully.');
    }
}
