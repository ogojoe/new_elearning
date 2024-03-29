<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Instructor\CourseController;
use App\Http\Livewire\Instructor\CoursesCurriculum;
use App\Http\Livewire\Instructor\CoursesEvaluations;
use App\Http\Livewire\Instructor\CoursesEvaluationsEdit;
use App\Http\Livewire\Instructor\CoursesStudents;

Route::redirect('', 'instructor/courses');

Route::resource('courses',CourseController::class)->names('courses');

Route::get('courses/{course}/curriculum', CoursesCurriculum::class)->middleware('can:Actualizar cursos')
->name('courses.curriculum');

Route::get('courses/{course}/goals', [CourseController::class,'goals'])->name('courses.goals');

Route::get('courses/{course}/students', CoursesStudents::class)->middleware('can:Actualizar cursos')
->name('courses.students');

Route::get('courses/{course}/evaluations', CoursesEvaluations::class)->middleware('can:Actualizar cursos')
->name('courses.evaluations');

Route::get('courses/{course}/evaluations/{evaluation}', CoursesEvaluationsEdit::class)->middleware('can:Actualizar cursos')
->name('courses.evaluations.edit');

Route::post('courses/{course}/status', [CourseController::class,'status'])->name('courses.status');

Route::get('courses/{course}/observation', [CourseController::class,'observation'])->name('courses.observation');