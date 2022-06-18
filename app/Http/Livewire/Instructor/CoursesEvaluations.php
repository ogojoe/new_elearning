<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Course;
use App\Models\Evaluation;
use Livewire\Component;

class CoursesEvaluations extends Component
{
    public $course,$evaluation, $name;

    protected $rules = [
        'evaluation.name'=>'required'
    ];

    public function mount(Course $course)
    {
        $this->course = $course;
    }
    
    public function render()
    {
        $evaluations = $this->course->evaluations()->get();
        return view('livewire.instructor.courses-evaluations', compact('evaluations'))->layout('layouts.instructor',['course' => $this->course]);
    }

    public function store()
    {
        $this->validate([
            'name'=>'required'
        ]);

        Evaluation::create([
            'name'=>$this->name,
            'course_id'=>$this->course->id
        ]);

        $this->reset('name');
        $this->course = Course::find($this->course->id);
    }

    public function destroy(Evaluation $evaluation){
        $evaluation->delete();
        $this->course = Evaluation::find($this->course->id);
    }

}
