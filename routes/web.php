<?php

use App\Http\Controllers\CoursesController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\GenerateController;
use App\Http\Controllers\ProfessorsController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\CheckAdminRole;
use App\Http\Middleware\CheckProfessorRole;
use App\Http\Middleware\CheckStudentRole;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect('/logout');
});

Route::get('/login', [UsersController::class, 'loginIndex']);
Route::post('/login/checklogin', [UsersController::class, 'checklogin']);
Route::get('/login/checklogin',function (){redirect(route('logout'));});
Route::get('/logout', [UsersController::class, 'logout']);


Route::middleware(CheckStudentRole::class)->group(function () {
    Route::get('/allstudents', [StudentController::class, 'show_students']);
    Route::get('/crs_student', [StudentController::class, 'course_ofstudent'])->name('students.x');
    Route::get('/regcourse', [StudentController::class, 'registration']);
    Route::post('/supcourse', [StudentController::class, 'reg_form']);
    Route::get('/crs_student/material', [StudentController::class, 'index'])->name('student.material');
    Route::get('/download-file/{path}/{filename}/{courseId}', [StudentController::class, 'download'])->name('student.download');
});


Route::middleware(CheckProfessorRole::class)->group(function () {
    //professor routes
    // *ezzat routes*
    Route::get('/professorCourses', [ProfessorsController::class, 'getCoursesByProfessorId']);
    Route::post('/upload{id}', [ProfessorsController::class, 'uploadFiles'])->name('upload');
    Route::get('/professorCourses{id}', [ProfessorsController::class, 'showMaterial'])->name('pr.co');
    Route::get('/showStudents{id}', [ProfessorsController::class, 'showStudents'])->name('viewStudent');
    Route::get('/student/edit{id}/course{course}', [ProfessorsController::class, 'edit'])->name('student.edit');
    Route::post('/student/edit{id}/course{course}', [ProfessorsController::class, 'update'])->name('student.update');
    Route::delete('/delete-file/{id}/{filename}', [ProfessorsController::class, 'deleteFile'])->name('delete.file');
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




Route::Post('/search-user',[UsersController::class,'search_user'])->name('users.search');
Route::Post('/search-courses',[CoursesController::class,'search_course'])->name('courses.search');
Route::Post('/search-departments',[DepartmentsController::class,'search_departments'])->name('departments.search');


Route::Post('/search-restore-user',[UsersController::class,'search_user_restore'])->name('users.restore.search');
Route::Post('/search-restore-courses',[CoursesController::class,'search_course_restore'])->name('courses.restore.search');
Route::Post('/search-restore-departments',[DepartmentsController::class,'search_departments_restore'])->name('departments.restore.search');


Route::Post('/students-user',[UsersController::class,'Student'])->name('students');
Route::Post('/doctors-user',[UsersController::class,'Doctor'])->name('doctors');
Route::Post('/admin-user',[UsersController::class,'Admin'])->name('admins');
