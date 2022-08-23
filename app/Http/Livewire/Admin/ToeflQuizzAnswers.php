<?php

namespace App\Http\Livewire\Admin;

use App\Models\AnswersToefl;
use App\Models\QuestionToefl;
use Livewire\Component;

class ToeflQuizzAnswers extends Component
{
    public $question,$answer,$name,$is_correct;

    protected $rules = [
        'answer.name'=> 'required',
        'answer.is_correct'=> 'required'
    ];

    public function mount(QuestionToefl $question)
    {
        $this->question = $question;
        $this->answer = new AnswersToefl();
    }

    public function render()
    {
        return view('livewire.admin.toefl-quizz-answers');
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

        

        AnswersToefl::create([
            'name'=>$this->name,
            'is_correct'=>$this->is_correct,
            'question_toefl_id'=>$this->question->id
        ]);

        $this->reset(['name','is_correct']);
        
        $this->question = QuestionToefl::find($this->question->id);

    }

    public function edit(AnswersToefl $answer)
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
        $this->answer = new AnswersToefl();

        $this->question = QuestionToefl::find($this->question->id);
    }

    public function destroy(AnswersToefl $answer)
    {
        $answer->delete();
        $this->question = QuestionToefl::find($this->question->id);
    }

    public function cancel(){
        $this->answer = new AnswersToefl();
    }
}
