<?php

namespace App\Http\Livewire\Admin;

use App\Models\QuestionToefl;
use App\Models\Toefl;
use Livewire\Component;

class ToeflQuizz extends Component
{

    public $toefl,$question,$name;
    public function mount(Toefl $toefl){
        $this->toefl = $toefl;
        $this->question = new QuestionToefl();
    }

    public function render()
    {
        return view('livewire.admin.toefl-quizz')->layout('layouts.admin',['toefl' => $this->toefl]);
    }

    public function store($skill)
    {
        $this->validate([
            'name'=>'required'
        ]);
        QuestionToefl::create([
            'name'=>$this->name,
            'skill_id'=>$skill,
            'toefl_id'=>$this->toefl->id
        ]);

        $this->reset('name');
        $this->toefl = Toefl::find($this->toefl->id);
    }

    public function edit(QuestionToefl $question)
    {
        $this->resetValidation();
        $this->question = $question;
    }

    public function update(){ 

        $this->validate();
        $this->question->save();
        $this->question = new QuestionToefl();

        $this->toefl = Toefl::find($this->toefl->id);
    }

    public function destroy(QuestionToefl $question)
    {
        $question->delete();
        $this->toefl = Toefl::find($this->toefl->id);
    }

    public function cancel(){
        $this->reset('name');
        $this->toefl = new Toefl();
    }
}
