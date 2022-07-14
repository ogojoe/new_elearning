<?php

namespace App\Http\Livewire;

use App\Models\Evaluation;
use App\Models\Question;
use Livewire\Component;

class EvaluationStatus extends Component
{
    public $evaluation, $time, $current;
    public $selected=[];

    public function mount(Evaluation $evaluation)
    {
        $this->evaluation = $evaluation;
        $this->current = $evaluation->questions->first();

    }

    public function render()
    {
        return view('livewire.evaluation-status');
    }

    /* Metodos */
    public function changeQuestion(Question $question){
        $this->current = $question;        
    }


    /* Propiedades computadas */

    public function getIndexProperty(){
        return $this->evaluation->questions->pluck('id')->search($this->current->id);
    }

    public function getPreviousProperty(){
        if ($this->index == 0) {
            return null;
        } else {
            return $this->evaluation->questions[$this->index - 1];
        }
    }

    public function getNextProperty(){
        if ($this->index == $this->evaluation->questions->count() -1) {
            return null;
        } else {
            return $this->evaluation->questions[$this->index + 1];
        }
    }
}
