<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    public function index()
    {
        return view('admin.teachers.index');
    }

    public function setSchool(Request $request){
        if ($request->school_id) {
            $user = User::find($request->user_id);
            $teacher = Teacher::firstOrCreate(['user_id' => $request->user_id ]);
            $teacher->school_id = $request->school_id;
            $teacher->name = $user->name;
            if($teacher->update()){
                return redirect()->route('admin.teachers.index')->with('info','Escuela asignada con éxito.');
            }
        }else{
            return redirect()->route('admin.teachers.index')->with('info','Favor de seleccionar escuela.');
        }        
    }
}
