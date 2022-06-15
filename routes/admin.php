<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TeachersController;
use App\Http\Controllers\Admin\StudentsController;

use App\Http\Controllers\Admin\SchoolController;
use App\Http\Controllers\Admin\School\GroupController;

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\NotificationsContoller;
use App\Http\Controllers\Admin\PriceController;
use App\Http\Controllers\Admin\School\GroupStudentsController;
use App\Http\Controllers\Admin\School\SchoolStudentsController;
use App\Http\Controllers\Admin\School\SchoolTeachersController;


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
| Here register admin routes for application.
|
*/

Route::get('', [HomeController::class, 'index'])->middleware('can:Ver Dashboard')->name('home');

Route::resource('roles', RoleController::class)->names('roles');

Route::resource('users', UserController::class)->only('index','edit','update')->names('users');
Route::post('teacher/setSchool', [TeachersController::class, 'setSchool'])->name('teacher.setSchool');
Route::post('student/setSchool', [StudentsController::class, 'setSchool'])->name('student.setSchool');
Route::prefix('teachers')->group(function () {
    Route::get('', [TeachersController::class, 'index'])->middleware('can:Ver Dashboard')->name('teachers.index');
    
});

Route::prefix('students')->group(function () {
    Route::get('', [StudentsController::class, 'index'])->middleware('can:Ver Dashboard')->name('students.index');
});


Route::resource('schools',SchoolController::class)->names('schools');
Route::get('school/{school}/groups',[GroupController::class,'list'])->name('school.groups.list');
Route::group(['prefix' => '{school}'], function () {
    Route::resource('group', GroupController::class)->names('school.group');
    Route::group(['prefix' => '{group}'], function () {
        Route::resource('alumnos', GroupStudentsController::class)->names('school.group.alumnos');
    });
    Route::resource('students', SchoolStudentsController::class)->names('school.students');
    Route::resource('teachers', SchoolTeachersController::class)->names('school.teachers');
});
    

Route::resource('categories',CategoryController::class)->names('categories');
Route::resource('levels',LevelController::class)->names('levels');
Route::resource('prices',PriceController::class)->names('prices');

Route::get('courses', [CourseController::class, 'index'])->name('courses.index');

Route::get('courses/{course}', [CourseController::class, 'show'])->name('courses.show');

Route::post('courses/{course}/approved', [CourseController::class, 'approved'])->name('courses.approved');

Route::get('courses/{course}/observation', [CourseController::class, 'observation'])->name('courses.observation');

Route::post('courses/{course}/reject', [CourseController::class, 'reject'])->name('courses.reject');

Route::get('solicitudes/get', [NotificationsContoller::class,'getNotificationsData'])->name('solicitudes.get');
Route::get('solicitudes/show', [NotificationsContoller::class,'showSolicitudes'])->name('solicitudes.show');


