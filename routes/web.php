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

// *ezzat routes*
Route::get('/professorCourses', [ProfessorsController::class, 'getCoursesByProfessorId']);
Route::post('/upload{id}',[ProfessorsController::class,'uploadFiles'])->name('upload');
Route::get('/professorCourses{id}',[ProfessorsController::class,'showMatrial'])->name('pr.co');
Route::get('/showStudents{id}',[ProfessorsController::class,'showStudents'])->name('viewStudent');
Route::get('/student/edit{id}/course{course}',[ProfessorsController::class,'edit'])->name('student.edit');
Route::post('/student/edit{id}/course{course}',[ProfessorsController::class,'update'])->name('student.update');
Route::get('/professorCourses{id}/delete{filename}', [ProfessorsController::class,'deleteFile'])->name('delete.file');
// *ezzat routes*
