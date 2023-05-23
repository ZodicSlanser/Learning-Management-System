<?php

use App\Models\User;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProfessorsController;


Route::get('/', function () {
    return view('login');
});

Route::get('/login', [UserController::class, 'index']);
Route::post('/login/checklogin', [UserController::class, 'checklogin']);
Route::get('/home', [UserController::class, 'successlogin']);
Route::get('/logout', [UserController::class, 'logout']);
Route::get('/professorCourses', [ProfessorsController::class, 'getCoursesByProfessorId']);


Route::get('/allstudents' , [StudentController::class , 'show_students']);

Route::get('/crs_student' , [StudentController::class , 'course_ofstudent'])->name('students.x');

Route::get('/regcourse', [StudentController::class , 'regestration']);

Route::post('/supcourse', [StudentController::class ,'reg_form']);

Route::get('/test{id}', [StudentController::class, 'index']);


 

