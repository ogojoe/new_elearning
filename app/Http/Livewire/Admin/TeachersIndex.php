<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class TeachersIndex extends Component
{
    
    public function render(){
        $teachers = User::role('Docente')->whereDoesntHave('teacher')->get();
        return view('livewire.admin.teachers-index',compact('teachers'));
    }

    
}
