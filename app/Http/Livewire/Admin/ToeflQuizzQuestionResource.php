<?php

namespace App\Http\Livewire\Admin;

use App\Models\QuestionToefl;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

use Livewire\WithFileUploads;

class ToeflQuizzQuestionResource extends Component
{
    use WithFileUploads;
    public $question, $file;

    public function mount(QuestionToefl $question)
    {
        $this->question = $question;
    }

    public function render()
    {
        return view('livewire.admin.toefl-quizz-question-resource');
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

        $url = $this->file->storeAs('public/ToeflQuestions', $this->question->toefl_id.'_'.$this->question->id.'.'.$this->file->getClientOriginalExtension());
        
        $this->question->update(['url' => $this->question->toefl_id.'_'.$this->question->id.'.'.$this->file->getClientOriginalExtension()]);

        $this->question = QuestionToefl::find($this->question->id);
    }

    public function destroy()
    {
        Storage::delete($this->question->url);
        $this->question->update(['url'=>'']);

        $this->question = QuestionToefl::find($this->question->id);
    }
}
