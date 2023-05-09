<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfessorsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/professorCourses',[ProfessorsController::class, 'getCoursesByProfessorId']);
