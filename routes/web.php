<?php

use App\Http\Controllers\ProfessorsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('login');
});

Route::get('/login', [UserController::class, 'index']);
Route::post('/login/checklogin', [UserController::class, 'checklogin']);
Route::get('/home', [UserController::class, 'successlogin']);
Route::get('/logout', [UserController::class, 'logout']);

Route::get('/professorCourses', [ProfessorsController::class, 'getCoursesByProfessorId']);

Route::resource('/courses', CoursesController::class);
Route::resource('/departments', DepartmentsController::class);
Route::resource('/users', UsersController::class);
Route::resource('/generate', GenerateController::class);

Route::get('department-restore/{id}', [DepartmentsController::class, 'delete'])->name('department.delete');

Route::get('course-restore/{id}', [CoursesController::class, 'delete'])->name('course.delete');

Route::get('user/restore/{id}', [UsersController::class, 'restore'])->name('user.restore');

Route::get('delete-enrollment', [GenerateController::class, 'deleteEnrollment'])->name('enrollment.delete');
Route::get('/generate/download/{course_id}', [GenerateController::class, 'download'])->name('generate.download');

