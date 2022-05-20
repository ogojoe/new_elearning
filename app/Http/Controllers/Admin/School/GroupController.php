<?php

namespace App\Http\Controllers\Admin\School;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\School;
use App\Models\Category;
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
            'year'=>'required',
            'category_id'=>'required',
            'level_id'=>'required',
        ]);

        Group::create(array_merge($request->all(), ['school_id' => $school]));

        return redirect()->route('admin.schools.show',$school)->with('info','El grupo se creó con éxito');

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
