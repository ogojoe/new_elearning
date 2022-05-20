<?php

namespace App\Http\Livewire\Admin\School;

use App\Models\Group;
use Livewire\Component;

class Groups extends Component
{
    public $group, $school;
    public function mount(Group $group)
    {
        $this->group = Group::find($group->id);
        
    }

    public function render()
    {
        return view('livewire.admin.school.groups');
    }
}
