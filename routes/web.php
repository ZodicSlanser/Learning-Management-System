<?php

use App\Http\Middleware\CheckAdminRole;
use App\Http\Middleware\CheckProfessorRole;
use App\Models\Role;
use App\Models\User;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\GenerateController;
use App\Http\Controllers\ProfessorsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersController;

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('login');
});

Route::get('/login', [UsersController::class, 'loginIndex']);
Route::post('/login/checklogin', [UsersController::class, 'checklogin']);
Route::get('/logout', [UsersController::class, 'logout']);

Route::get('/students' , function (){

    $students = User::where('role', '=' , Role::STUDENT)->get();
   return view('student_list' , ['students'=> $students]);  //pass anything inside ass_array to view as variable
});

Route::get('/students/{id}', function ($id) {
    $item = Enrollment::where('student_id'  , $id)->with('course')->get();
    return view('student_info', [ 'student' => $item ]);
 })->name('/students/{id}.x');

 Route::get('/regcourse/{id}', function ($id) {
    $item = User::find($id);
    $department = $item['department_id'];
    $courses = Course::where( 'department_id', $department )->get();
    return view('reg_course' , [ 'courses' => $courses ] ,[ 'item' => $item ] );
 });


 Route::post('/supcourse', function (Request $requset) {

     $formfields = $requset->validate([
         'course_id' => 'required',
         'student_id' => 'required'
     ]);

     $course = Course::find($formfields['course_id']);
     $student = User::find($formfields['student_id']);
     $enrollemt = new Enrollment();
     return $enrollemt->enroll($student,$course);
   // return Redirect::route('/students');
 });

Route::middleware(CheckProfessorRole::class)->group(function () {
    //professor routes
    // *ezzat routes*
    Route::get('/professorCourses', [ProfessorsController::class, 'getCoursesByProfessorId']);
    Route::post('/upload{id}',[ProfessorsController::class,'uploadFiles'])->name('upload');
    Route::get('/professorCourses{id}',[ProfessorsController::class,'showMatrial'])->name('pr.co');
    Route::get('/showStudents{id}',[ProfessorsController::class,'showStudents'])->name('viewStudent');
    Route::get('/student/edit{id}/course{course}',[ProfessorsController::class,'edit'])->name('student.edit');
    Route::post('/student/edit{id}/course{course}',[ProfessorsController::class,'update'])->name('student.update');
    Route::get('/professorCourses{id}/delete{filename}', [ProfessorsController::class,'deleteFile'])->name('delete.file');
    // *ezzat routes*

});

Route::middleware(CheckAdminRole::class)->group(function () {
    //admin routes
    Route::get('/generate/download/{course_id}', [GenerateController::class, 'download'])->name('generate.download');
    Route::get('/departments-restore', [DepartmentsController::class, 'restore_index'])->name('departments.restore.index');
    Route::get('/departments/restore/do', [DepartmentsController::class, 'restore'])->name('department.restore');
    Route::get('/courses-restore', [CoursesController::class, 'restore_index'])->name('course.restore.index');
    Route::get('/courses/restore/do', [CoursesController::class, 'restore'])->name('course.restore');
    Route::get('/users-restore', [UsersController::class, 'restore_index'])->name('user.restore.index');
    Route::get('/users-restore/do', [UsersController::class, 'restore'])->name('user.restore');
    Route::get('/delete-enrollment', [GenerateController::class, 'deleteEnrollment'])->name('enrollment.delete');
    Route::resource('/courses', CoursesController::class);
    Route::resource('/departments', DepartmentsController::class);
    Route::resource('/users', UsersController::class);
    Route::resource('/generate', GenerateController::class);
});



