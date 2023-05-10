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
