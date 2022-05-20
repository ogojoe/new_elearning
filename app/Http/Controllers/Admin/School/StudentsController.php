<?php

namespace App\Http\Controllers\Admin\School;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    
    public function index($group)
    {
        $group = Group::find($group);
        return view('admin.schools.groups.students.index',compact('group'));
    }
    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
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
