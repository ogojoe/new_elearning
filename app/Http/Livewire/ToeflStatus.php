<?php

namespace App\Http\Livewire;

use App\Models\AnswersToefl;
use App\Models\QuestionToefl;
use App\Models\ScoresToefl;
use App\Models\Toefl;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Livewire\Component;

class ToeflStatus extends Component
{
    public $toefl,$inicio, $time, $current, $puntuacion;
    public $answers=[];

    public function mount(Toefl $toefl)
    {
        $this->toefl = $toefl;
        $this->current = $toefl->questions->first();

    }

    public function render()
    {
        return view('livewire.toefl-status');
    }

    /* Metodos */
    public function changeQuestion(QuestionToefl $question){
        $this->current = $question;        
    }

    public function start()
    {
        $this->inicio = Carbon::now();
    }

    public function terminar()
    {
        $score = ScoresToefl::firstOrCreate([
            'toefl_id'=>$this->toefl->id,
            'user_id'=>Auth::user()->student->id,
            'score'=>0
        ]);

        foreach ($this->answers as $key => $value) {
            $answer = AnswersToefl::find($value);
            $answer->is_correct ? $this->puntuacion++ : $this->puntuacion;
        }

        $score->update([
            'score'=>$this->puntuacion,
            'respuestas'=> $this->answers,
            'inicio'=>$this->inicio,
            'fin'=>Carbon::now()
        ]);

        return redirect()->route('student.courses.index')->with('info','Exámen respondido. Comunicate con direccion para conocer tus resultados. Gracias.');
    }


    /* Propiedades computadas */

    public function getIndexProperty(){
        return $this->toefl->questions->pluck('id')->search($this->current->id);
    }

    public function getPreviousProperty(){
        if ($this->index == 0) {
            return null;
        } else {
            return $this->toefl->questions[$this->index - 1];
        }
    }

    public function getNextProperty(){
        if ($this->index == $this->toefl->questions->count() -1) {
            return null;
        } else {
            return $this->toefl->questions[$this->index + 1];
        }
    }
}
