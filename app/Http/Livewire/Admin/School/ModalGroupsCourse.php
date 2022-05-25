<?php

namespace App\Http\Livewire\Admin\School;

use App\Models\Group;
use App\Models\School;
use App\Models\Course;
use Livewire\Component;

class ModalGroupsCourse extends Component
{
    public $group, $school, $courses, $course;

    protected $rules = [
        'course' => 'required',
    ];

    public function mount(Group $group, School $school)
    {
        $this->group = Group::find($group->id);
        $this->school = School::find($school->id);
        $this->courses = Course::where('category_id', $group->category_id)->get();
        $this->course = $this->courses ? $this->courses->first()->id: "";
    }

    public function render()
    {
        return view('livewire.admin.school.modal-groups-course');
    }

    public function store(){
        
        $this->validate();

        $group = Group::find($this->group->id);

        $group->course_id = $this->course;
        $group->save();

        $course = Course::find($group->course_id);
        $studentsGroup = $group->getStudentsIds();

        $course->students()->syncWithoutDetaching($studentsGroup);

        return redirect()->route('admin.school.groups.list', $this->school->id )->with('info','Curso asignado con éxito.');
    }
}
