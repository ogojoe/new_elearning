<?php

namespace App\Http\Livewire\Admin\School;

use App\Models\Group;
use App\Models\School;
use App\Models\Teacher;
use Livewire\Component;

class ModalGroupsTeacher extends Component
{
    public $group, $school, $teachers, $docente, $teacherSelectedId;

    protected $listeners = ['selectTeacher' => 'update'];

    protected $rules = [
        'docente' => 'required',
    ];

    public function mount(Group $group, School $school)
    {
        $this->group = Group::find($group->id);
        $this->school = School::find($school->id);
        $this->teachers = Teacher::where('school_id',$school->id)->get();
    }
    public function render()
    {
        return view('livewire.admin.school.modal-groups-teacher');
    }

    public function update($prueba){

        $this->docente = $prueba;
        
        $this->validate();

        $group = Group::find($this->group->id);

        $group->teacher_id = $this->docente;
        
        $group->save();

        $this->group = Group::find($this->group->id);
        return redirect()->route('admin.school.groups.list', $this->school->id )->with('info','Docente asignado con éxito.');
    }
}
