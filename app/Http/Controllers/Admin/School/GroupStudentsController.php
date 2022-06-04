<?php

namespace App\Http\Controllers\Admin\School;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Group;
use App\Models\School;
use App\Models\Student;
use Illuminate\Http\Request;

class GroupStudentsController extends Controller
{
    
    public function index($school, $group)
    {
        $group = Group::find($group);
        return view('admin.schools.groups.students.index',compact('group','school'));
    }
    
    public function create($school, $group)
    {
        $group = Group::find($group);
        $school = School::find($school);
        $students = Student::where('school_id',$school->id)->get();

        $group_students_id = $group->studentsGroup()->pluck('student_id');

        return view('admin.schools.groups.students.asignar',compact('students','school','group','group_students_id'));
    }

    
    public function store(Request $request,$school,$group)
    {
        $request->validate([
            'students'=>'required'
        ]);
        $group = Group::find($group);
        $group->studentsGroup()->sync($request->students);
        if ($group->course_id) {
            $users=[];
            $course = Course::find($group->course_id);
            foreach ($request->students as $student) {
                $student = Student::find($student);               
                array_push($users, $student->user_id);
            }
            $course->students()->sync($users);
        } 
        return view('admin.schools.groups.students.index',compact('group','school'));
    }

   
    public function show($id)
    {
        //
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
