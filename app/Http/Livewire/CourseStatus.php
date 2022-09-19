<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Course;
use App\Models\Evaluation;
use App\Models\Score;
use App\Models\Lesson;
use App\Models\Student;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CourseStatus extends Component
{
    use AuthorizesRequests;

    public $course, $current, $scores=[];

    public function mount(Course $course)
    {
        $this->course = $course;
        
        foreach($course->lessons as $lesson){
            if(!$lesson->completed){
                $this->current = $lesson;
                break;
            }
        }

        if (!$this->current) {
            $this->current = $course->lessons->last();
        }

        /* Se agrego para los examenes del alumno */
        $student = Student::where('user_id',auth()->user()->id)->first();
        $evaluations = Evaluation::where('course_id',$course->id)->get();
        foreach ($evaluations as $evaluation) {
            $score = Score::where('evaluation_id',$evaluation->id)->where('student_id',$student->id)->first();
            if($score) {
                array_push($this->scores,$score);
            }
        }
        
        $this->authorize('enrolled', $course);
    }

    public function render(){
        return view('livewire.course-status');
    }
    
    //Metodos

    public function changeLesson(Lesson $lesson){
        $this->current = $lesson;        
    }

    public function completed()
    {
        if($this->current->completed){
            //Elimina registro
            $this->current->users()->detach(auth()->user()->id);
        }else{
            //Agregar registro
            $this->current->users()->attach(auth()->user()->id);
        }

        $this->current = Lesson::find($this->current->id);
        $this->course = Course::find($this->course->id);
    }

    //Propiedades computadas

    public function getIndexProperty(){
        return $this->course->lessons->pluck('id')->search($this->current->id);
    }

    public function getPreviousProperty(){
        if ($this->index == 0) {
            return null;
        } else {
            return $this->course->lessons[$this->index - 1];
        }
    }

    public function getNextProperty(){
        if ($this->index == $this->course->lessons->count() -1) {
            return null;
        } else {
            return $this->course->lessons[$this->index + 1];
        }
    }

    public function getAdvanceProperty(){
        $i = 0;

        foreach ($this->course->lessons as $lesson) {
            if($lesson->completed){
                $i++;
            }
        }

        $advance =($i * 100)/($this->course->lessons->count());

        return round($advance,0);
    }

    public function download(){
        return response()->download(storage_path('app/'. $this->current->resource->url));
    }

    public function evaluation(Evaluation $evaluation)
    {
        return redirect()->route('evaluation.status', $evaluation);
    }
}
