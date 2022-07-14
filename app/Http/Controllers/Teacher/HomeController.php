<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function indexDocente()
    {
        $docente = Teacher::where('user_id',Auth::id())->first();
        $groups = Group::where('teacher_id',$docente->id)->get();

        return view('teacher.index',compact('groups'));
    }
}
