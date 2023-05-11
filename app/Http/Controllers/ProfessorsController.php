<?php


namespace App\Http\Controllers;

use App\Models\Course;

class ProfessorsController extends Controller
{
    //this function return professor courses *ezzat*
    public function getCoursesByProfessorId()
    {
        // when we done login this line will get the id of professor that login.
        //$professorId = auth()->user()->id;

        $professorId = 13;

        // this line will retrive the courses.
        $courses = Course::where('professor_id', $professorId)->get();

        return $courses;
        /*
        we should here return view like this.
        return view("professor.professor_show_courses")->with("courses",$courses);
        but i just test my api.
        */
    }
}
