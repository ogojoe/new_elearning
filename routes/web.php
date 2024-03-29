<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Livewire\CourseStatus;
use App\Http\Livewire\EvaluationStatus;
use App\Http\Livewire\ToeflStatus;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', HomeController::class)->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('cursos', [CourseController::class,'index'])->name('courses.index');

Route::get('cursos/{course}', [CourseController::class, 'show'])->name('courses.show');

Route::post('course/{course}/enrolled',[CourseController::class,'enrolled'])->middleware('auth')->name('courses.enrolled');

Route::get('course-status/{course}', CourseStatus::class)->name('courses.status')->middleware('auth');

Route::get('evaluation-status/{evaluation}', EvaluationStatus::class)->name('evaluation.status')->middleware('auth');

Route::get('toefl-evaluation/{toefl}', ToeflStatus::class)->name('toefl.evaluation.status')->middleware('auth');