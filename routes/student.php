<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\CourseController;

Route::get('', [CourseController::class, 'index'])->middleware('can:Tomar Cursos')->name('courses.index');