<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Jetstream\Role;

class HomeController extends Controller
{
    public function __invoke()
    {
        $courses = Course::where('status',3)->latest('id')->get()->take(12);
        if (Auth::user() && (Auth::user()->hasRole('Alumno')) ) {
            $toefls = User::find(Auth::user()->id)->toefl_assigned;
            return view('welcome',compact('courses','toefls'));
        }
        
        return view('welcome',compact('courses'));
    }

}
