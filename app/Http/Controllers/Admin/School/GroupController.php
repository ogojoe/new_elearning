<?php

namespace App\Http\Controllers\Admin\School;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\School;
use App\Models\Category;
use App\Models\Course;
use App\Models\Level;
use App\Models\Teacher;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function list(School $school)
    {
        $groups = Group::where('school_id', $school->id)->get();
        $teachers = Teacher::where('school_id',$school->id)->pluck('id','name');
        return view('admin.schools.groups.list',compact('school','groups','teachers'));
    }

    public function index()
    {
        //
    }

    public function create(School $school)
    {
        $categories = Category::pluck('name', 'id');
        $levels =Level::pluck('name', 'id');
        return view('admin.schools.groups.create',compact('categories','levels','school'));
    }

    public function store(Request $request,$school)
    {
        $request->validate([
            'name'=>'required',
            'periodo'=>'required',
            'category_id'=>'required',
            'level_id'=>'required',
        ]);

        $curso = Course::where('category_id',$request->category_id)->where('level_id',$request->level_id)->first();

        if ($curso) {
            Group::create(array_merge($request->all(), ['school_id' => $school,'course_id' => $curso->id]));
        } else {
            Group::create(array_merge($request->all(), ['school_id' => $school]));
        }
        
        return redirect()->route('admin.schools.show',$school)->with('info','El grupo se creó con éxito');

    }

    public function show(School $school, Group $group)
    {
        return view('admin.schools.groups.show',compact('group'));
    }

    public function edit(School $school,Group $group)
    {
        $categories = Category::pluck('name', 'id');
        $levels =Level::pluck('name', 'id');
        return view('admin.schools.groups.edit',compact('categories','levels','school','group'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function asignarTeacher(Request $request){
        
        $group = Group::find($request->group_id);

        $group->teacher_id = $request->docente_id;
        
        $group->save();

        return redirect()->route('admin.school.groups.list', $request->school_id )->with('info','Docente asignado con éxito.');
    }
}
