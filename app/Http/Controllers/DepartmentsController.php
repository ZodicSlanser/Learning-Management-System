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

        return view('departments.index', ['departments' => Department::paginate(12)]);
    }

    public function restore_index()
    {
        return view('trash.department_restore', ['departments' => Department::onlyTrashed()->get()]);
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

    public function search_departments(Request $request){
        if (isset($_POST['find'])) {
            $find = $_POST['search'];
            $department = Department::where('name',$find)->paginate(12);
    
            return view('departments.index', ['departments'=>$department]);
            
        }
      }


     /* public function search_departments_restore(Request $request){
        if (isset($_POST['find'])) {
            $find = $_POST['search'];
            $department = Department::where('name',$find)->paginate(12);
    
            return view('departments.restore.search', ['departments'=>$department]);
            
        }
      }
*/

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
        $dep_courses = Course::where('department_id', $department->id)->get();
        $department->delete();
        if ($dep_courses) {
            return Redirect::route('departments.index')->with('status', 'Deleted Successfully, but there were courses in this department.');
        } else {
            return Redirect::route('departments.index')->with('status', 'Deleted Successfully.');
        }
    }

    public function restore()
    {
        $id = Request()->id;
        Department::onlyTrashed()->where('id', $id)->first()->restore();
        return Redirect::route('departments.restore.index')->with('status', 'Restored Successfully.');
    }
}
