<?php

use App\Http\Controllers\CoursesController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\GenerateController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('/courses', CoursesController::class);
Route::resource('/departments', DepartmentsController::class);
Route::resource('/users', UsersController::class);
Route::resource('/generate', GenerateController::class);

Route::get('/departments-restore', [DepartmentsController::class, 'restore_index'])->name('departments.restore.index');
Route::get('/departments/restore/do', [DepartmentsController::class, 'restore'])->name('department.restore');

Route::get('/courses-restore', [CoursesController::class, 'restore_index'])->name('course.restore.index');
Route::get('/courses/restore/do', [CoursesController::class, 'restore'])->name('course.restore');

Route::get('/users-restore', [UsersController::class, 'restore_index'])->name('user.restore.index');
Route::get('/users-restore/do', [UsersController::class, 'restore'])->name('user.restore');

Route::get('/delete-enrollment', [GenerateController::class, 'deleteEnrollment'])->name('enrollment.delete');
Route::get('/generate/download/{course_id}', [GenerateController::class, 'download'])->name('generate.download');


