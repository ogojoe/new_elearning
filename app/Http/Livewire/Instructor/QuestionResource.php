<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Question;
use Livewire\Component;

use Livewire\WithFileUploads;

class QuestionResource extends Component
{
    use WithFileUploads;
    public $question, $file;
    
    public function mount(Question $question)
    {
        $this->question = $question;
    }

    public function render()
    {
        return view('livewire.instructor.question-resource');
    }

    public function save($skill_id){
        
        if ($skill_id==1) {
            $this->validate([
            'file'=>'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav'
            ]);
        } else{
            $this->validate([
                'file'=>'required'
            ]);
        }

        $url = $this->file->storeAs('public/questions', $this->question->evaluation->id.'_'.$this->question->id.'.'.$this->file->getClientOriginalExtension());
        
        $this->question->update(['url' => $url]);

        $this->question = Question::find($this->question->id);
    }
}
