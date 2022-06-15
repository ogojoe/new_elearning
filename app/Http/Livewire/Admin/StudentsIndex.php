<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\School;
use Livewire\Component;

class StudentsIndex extends Component
{
    public function render()
    {
        $students = User::role('Alumno')->whereDoesntHave('student')->orWhereHas('student', function ($query) {
            $query->whereDoesntHave('school');
        })->get();

        $schools = School::all();
        return view('livewire.admin.students-index',compact('students','schools'));
    }
}
