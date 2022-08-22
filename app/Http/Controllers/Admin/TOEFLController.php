<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Toefl;
use Illuminate\Http\Request;

class TOEFLController extends Controller
{
    
    public function index()
    {
        $toefls = Toefl::all();
        return view('admin.toefls.index',compact('toefls'));
    }

    public function create()
    {
        return view('admin.toefls.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:toefls'
        ]);

        $toefl = Toefl::create($request->all());

        return redirect()->route('admin.toefls.edit',$toefl)->with('info','El exámen se creó con éxito.');
    }

    public function show($id)
    {
        //
    }

    public function edit(Toefl $toefl)
    {
        return view('admin.toefls.edit',compact('toefl'));
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
