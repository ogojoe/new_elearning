<?php

use App\Http\Controllers\Teacher\GroupController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teacher\HomeController;

Route::get('', [HomeController::class, 'indexDocente'])->middleware('role:Docente')->name('home');

Route::get('group/{group}', [GroupController::class, 'index'])->name('group');
Route::post('student/assginEvaluation', [GroupController::class, 'assignEvaluation'])->name('student.assginEvaluation');
