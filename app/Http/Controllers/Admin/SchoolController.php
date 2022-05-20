<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index()
    {
        $schools = School::all();
        return view('admin.schools.index',compact('schools'));
    }

    
    public function create()
    {
        return view('admin.schools.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:schools',
            'email'=>'required',
            'country'=>'required',
            'state'=>'required',
            'address'=>'required'
        ]);

        $school = School::create($request->all());

        return redirect()->route('admin.schools.edit',$school)->with('info','La escuela se creó con éxito.');
    }

    public function show(School $school)
    {
        return view('admin.schools.show',compact('school'));
    }

    public function edit(School $school)
    {
        return view('admin.schools.edit',compact('school'));
    }

    
    public function update(Request $request, School $school)
    {
        
        $request->validate([
            'name'=>'required|unique:schools,name'.$school->id,
            'email'=>'required|unique:schools',
            'country'=>'required',
            'state'=>'required',
            'address'=>'required'
        ]);

        $school->update($request->all());

        return redirect()->route('admin.schools.edit',$school)->with('info','La escuela se actualizó con éxito.');

    }

    public function destroy(School $school)
    {
        $school->delete();
        return redirect()->route('admin.schools.index')->with('info','La escuela se eliminó con éxito.');
    }
}
