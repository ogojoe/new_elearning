<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Course;
use App\Models\Category;
use App\Models\Level;
use App\Models\Price;

use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Leer cursos')->only('index');
        $this->middleware('can:Crear cursos')->only('create','store');
        $this->middleware('can:Actualizar cursos')->only('edit', 'update','goals');
        $this->middleware('can:Eliminar cursos')->only('destroy');
    }

    public function index()
    {
        return view('instructor.courses.index');
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $levels =Level::pluck('name', 'id');
        $prices = Price::pluck('name', 'id');
        return view('instructor.courses.create',compact('categories','levels','prices'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|unique:courses',
            'slug'=>'required',
            'subtitle'=>'required',
            'description'=>'required',
            'category_id'=>'required',
            'level_id'=>'required',
            'price_id'=>'required',
            'file'=>'image'
        ]);

        $course = Course::create($request->all());

        if ($request->file('file')) {
            $url = Storage::put('public/storage/courses',$request->file('file'));
            $course->image()->create([
                'url'=>$url
            ]);
        }

        return redirect()->route('instructor.courses.edit', compact('course'));

    }

    public function show(Course $course)
    {
        return view('instructor.courses.show',compact('course'));
    }

    public function edit(Course $course)
    {
        $this->authorize('dictated', $course);
        $categories = Category::pluck('name', 'id');
        $levels =Level::pluck('name', 'id');
        $prices = Price::pluck('name', 'id');

        return view('instructor.courses.edit',compact('course','categories','levels', 'prices'));
    }

    public function update(Request $request, Course $course)
    {
        $this->authorize('dictated', $course);
        $request->validate([
            'title'=>'required|unique:courses,slug,'.$course->id,
            'slug'=>'required',
            'subtitle'=>'required',
            'description'=>'required',
            'category_id'=>'required',
            'level_id'=>'required',
            'price_id'=>'required',
            'file'=>'image'
        ]);

        $course->update($request->all());
        if ($request->file('file')) {
            $url = Storage::put('public/storage/courses',$request->file('file'));
            if ($course->image) {
                Storage::delete('public/storage/courses',$course->image->url);
                $course->image->update(['url'=>$url]);
            }else{
                $course->image()->create([
                    'url'=>$url
                ]);
            } 
        }

        return redirect()->route('instructor.courses.edit',$course);

    }

    public function destroy(Course $course)
    {
        //
    }

    public function goals(Course $course){
        $this->authorize('dictated', $course);
        return view('instructor.courses.goals',compact('course'));
    }

    public function status(Course $course){
        $course->status = 2;
        $course->save();
        return back();
    }
}
