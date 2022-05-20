<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class StudentsIndex extends Component
{
    public function render()
    {
        $students = User::role('Alumno')->whereDoesntHave('student')->get();
        return view('livewire.admin.students-index',compact('students'));
    }
}
