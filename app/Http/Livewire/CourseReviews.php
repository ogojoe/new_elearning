<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;

class CourseReviews extends Component
{
    public $course_id;

    public function mount(Course $course)
    {
        $this->course_id = $course->id;
    }
    public function render()
    {
        $course = Course::find($this->course_id);
        return view('livewire.course-reviews',compact('course'));
    }
}
