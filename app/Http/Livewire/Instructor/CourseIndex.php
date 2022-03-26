<?php

namespace App\Http\Livewire\Instructor;

use Livewire\Component;

use App\Models\Course;
use Livewire\WithPagination;

class CourseIndex extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $courses = Course::where('title','LIKE','%'.$this->search.'%')->where('user_id', auth()->user()->id)
        ->latest('id')
        ->paginate(5);
        
        return view('livewire.instructor.course-index', compact('courses'));
    }

    public function limpiar_page()
    {
        $this->reset('page');
    }
}
