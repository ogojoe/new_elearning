<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index',compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:categories'
        ]);

        $category = Category::create($request->all());

        return redirect()->route('admin.categories.edit',$category)->with('info','El idioma se creó con éxito.');
    }

    public function show(Category $category)
    {
        return view('admin.categories.show',compact('category'));
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit',compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'=>'required|unique:categories,name,'.$category->id
        ]);

        $category->update($request->all());

        return redirect()->route('admin.categories.edit',$category)->with('info','El idioma se actualizó con éxito.');

    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index')->with('info','El idioma se eliminó con éxito.');
    }
}
