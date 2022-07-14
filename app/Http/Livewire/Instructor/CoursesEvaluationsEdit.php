<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Course;
use App\Models\Evaluation;
use App\Models\Question;
use Livewire\Component;

class CoursesEvaluationsEdit extends Component
{
    public $course,$evaluation,$question,$name;

    protected $rules = [
        'question.name'=> 'required',
    ];

    public function mount(Course $course,Evaluation $evaluation)
    {
        $this->course = $course;
        $this->evaluation = $evaluation;
        $this->question = new Question();
    }

    public function render()
    {
        
        return view('livewire.instructor.courses-evaluations-edit')->layout('layouts.instructor',['course' => $this->course]);
    }

    public function store($skill)
    {
        $this->validate([
            'name'=>'required'
        ]);
        Question::create([
            'name'=>$this->name,
            'skill_id'=>$skill,
            'evaluation_id'=>$this->evaluation->id
        ]);

        $this->reset('name');
        $this->evaluation = Evaluation::find($this->evaluation->id);
    }

    public function edit(Question $question)
    {
        $this->resetValidation();
        $this->question = $question;
    }

    public function update(){ 

        $this->validate();
        $this->question->save();
        $this->question = new Question();

        $this->evaluation = Evaluation::find($this->evaluation->id);
    }

    public function destroy(Question $question)
    {
        $question->delete();
        $this->evaluation = Evaluation::find($this->evaluation->id);
    }

    public function cancel(){
        $this->reset('name');
        $this->evaluation = new Evaluation();
    }

}
