<?php

namespace App\Http\Controllers\Admin\School;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SchoolTeachersController extends Controller
{
    public function index($school)
    {
        $school = School::find($school);
        $teachers = Teacher::where('school_id',$school->id)->paginate(10);
        return view('admin.schools.teachers.index',compact('school','teachers'));
    }

   
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show(School $school,Teacher $teacher)
    {
        return view('admin.schools.teachers.show',compact('teacher'));
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
