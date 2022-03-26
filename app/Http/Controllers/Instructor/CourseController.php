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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('instructor.courses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $levels =Level::pluck('name', 'id');
        $prices = Price::pluck('name', 'id');
        return view('instructor.courses.create',compact('categories','levels','prices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
            $url = Storage::put('courses',$request->file('file'));
            $course->image()->create([
                'url'=>$url
            ]);
        }

        return redirect()->route('instructor.courses.edit', compact('course'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  Course $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('instructor.courses.show',compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Course $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $categories = Category::pluck('name', 'id');
        $levels =Level::pluck('name', 'id');
        $prices = Price::pluck('name', 'id');

        return view('instructor.courses.edit',compact('course','categories','levels', 'prices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Course $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
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
            $url = Storage::put('courses',$request->file('file'));
            if ($course->image) {
                Storage::delete('courses',$course->image->url);
                $course->image->update(['url'=>$url]);
            }else{
                $course->image()->create([
                    'url'=>$url
                ]);
            } 
        }

        return redirect()->route('instructor.courses.edit',$course);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Course $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}
