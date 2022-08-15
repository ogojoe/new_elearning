<?php

namespace App\Http\Controllers\Admin\School;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\School;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class SchoolStudentsController extends Controller
{
    
    public function index($school)
    {
        $school = School::find($school);
        $students = Student::where('school_id',$school->id)->paginate(10);
        return view('admin.schools.students.index',compact('school','students'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(School $school, Student $student)
    {
        $user = User::find($student->user_id);
        $courses = $user->mis_cursos;
        $group = $student->group_enrolled()->where('status',1)->get();
        return view('admin.schools.students.show',compact('school','student','courses','group'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
