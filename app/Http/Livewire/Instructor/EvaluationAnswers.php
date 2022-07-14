<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Answer;
use App\Models\Question;
use Livewire\Component;

class EvaluationAnswers extends Component
{
    public $question,$answer,$name,$is_correct;

    protected $rules = [
        'answer.name'=> 'required',
        'answer.is_correct'=> 'required'
    ];

    public function mount(Question $question)
    {
        $this->question = $question;
        $this->answer = new Answer();
    }

    public function render()
    {
        return view('livewire.instructor.evaluation-answers');
    }

    public function store()
    {
        if ($this->is_correct == 1) {
            foreach ($this->question->answers as $answer) {
                $answer->update(['is_correct' => 0]);
            }
        }else {
            $this->is_correct = 0;
        }

        $rules = [
            'name'=> 'required',
            'is_correct'=> 'required',
        ];

        $this->validate($rules);

        

        Answer::create([
            'name'=>$this->name,
            'is_correct'=>$this->is_correct,
            'question_id'=>$this->question->id
        ]);

        $this->reset(['name','is_correct']);
        
        $this->question = Question::find($this->question->id);

    }

    public function edit(Answer $answer)
    {
        $this->resetValidation();
        $this->answer = $answer;
    }

    public function update(){

        $this->validate();

        if ($this->answer->is_correct == 1) {
            foreach ($this->question->answers as $respuestita) {
                $respuestita->update(['is_correct' => 0]);
            }
        }

        $this->answer->save();

        $this->reset(['name','is_correct']);
        $this->answer = new Answer();

        $this->question = Question::find($this->question->id);
    }

    public function destroy(Answer $answer)
    {
        $answer->delete();
        $this->question = Question::find($this->question->id);
    }

    public function cancel(){
        $this->answer = new Answer();
    }

}
