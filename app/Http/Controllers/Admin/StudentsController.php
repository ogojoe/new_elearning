<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

use App\Models\User;

class StudentsController extends Controller
{
    public function index()
    {
        return view('admin.students.index');
    }

    public function setSchool(Request $request){
        if ($request->school_id) {
            $user = User::find($request->user_id);
            $student = Student::firstOrCreate(['user_id' => $request->user_id ]);
            $student->school_id = $request->school_id;
            $student->name = $user->name;
            if($student->update()){
                return redirect()->route('admin.students.index')->with('info','Escuela asignada con éxito.');
            }
        }else{
            return redirect()->route('admin.students.index')->with('info','Favor de seleccionar escuela.');
        }        
    }
}
