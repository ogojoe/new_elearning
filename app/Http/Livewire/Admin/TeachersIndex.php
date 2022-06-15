<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\School;
use Livewire\Component;

class TeachersIndex extends Component
{

    public function render(){
        $teachers = User::role('Docente')->whereDoesntHave('teacher')->orWhereHas('teacher', function ($query) {
            $query->whereDoesntHave('school');
        })->get();
        $schools = School::all();
        return view('livewire.admin.teachers-index',compact('teachers','schools'));
    }

    
}
