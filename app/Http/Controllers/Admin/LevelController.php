<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Level;

class LevelController extends Controller
{
    public function index()
    {
        $levels = Level::all();
        return view('admin.levels.index',compact('levels'));
    }

    public function create()
    {
        return view('admin.levels.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:levels'
        ]);

        $level = Level::create($request->all());

        return redirect()->route('admin.levels.edit',compact('level'))->with('info','El nivel ha sido creado con éxito');
    }

    public function show(Level $level)
    {
        return view('admin.levels.show',compact('level'));
    }

    public function edit(Level $level)
    {
        return view('admin.levels.edit',compact('level'));
    }

    public function update(Request $request, Level $level)
    {
        $request->validate([
            'name' => 'required|unique:levels,name,'.$level->id
        ]);

        $level->update($request->all());

        return redirect()->route('admin.levels.edit',compact('level'))->with('info','Información actualizada con éxito.');
    }

    public function destroy(Level $level)
    {
        $level->delete();

        return redirect()->route('admin.levels.index')->with('info','El nivel se eliminó con éxito');
    }
}
