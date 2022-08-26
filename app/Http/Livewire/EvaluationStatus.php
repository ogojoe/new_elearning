<?php

namespace App\Http\Livewire;

use App\Models\Answer;
use App\Models\Evaluation;
use App\Models\Question;
use App\Models\Score;

use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

use Livewire\Component;

class EvaluationStatus extends Component
{
    public $evaluation,$inicio, $time, $current, $puntuacion;
    public $answers=[];

    public function mount(Evaluation $evaluation)
    {
        $this->puntuacion = 0;
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

    public function start()
    {
        $this->inicio = Carbon::now();
    }

    public function terminar()
    {
        $score = Score::where('evaluation_id',$this->evaluation->id)->where('student_id',Auth::user()->student->id)->first();

        foreach ($this->answers as $key => $value) {
            $answer = Answer::find($value);
            $answer->is_correct ? $this->puntuacion++ : $this->puntuacion;
        }

        $score->update([
            'score'=>$this->puntuacion,
            'respuestas'=> $this->answers,
            'inicio'=>$this->inicio,
            'fin'=>Carbon::now()
        ]);

        return redirect()->route('student.courses.index')->with('info','Exámen respondido. Comunicate con direccion para obtener resultados. Gracias.');
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
