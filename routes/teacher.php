<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teacher\HomeController;

Route::get('', [HomeController::class, 'indexDocente'])->middleware('role:Docente')->name('home');
