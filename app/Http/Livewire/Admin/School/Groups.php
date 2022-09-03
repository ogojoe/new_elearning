<?php

namespace App\Http\Livewire\Admin\School;

use App\Models\Group;
use App\Models\Teacher;
use Livewire\Component;

class Groups extends Component
{
    public $group, $school,$docentes;
    public function mount(Group $group)
    {
        $this->group = Group::find($group->id);
        $this->docentes = Teacher::all();
    }

    public function render()
    {
        return view('livewire.admin.school.groups');
    }
}
