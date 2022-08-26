<?php

namespace App\Http\Livewire\Admin\Toefl;

use App\Models\Toefl;
use App\Models\User;
use Livewire\Component;

use Livewire\WithPagination;

class UsersAsignated extends Component
{
    use WithPagination;
    
    protected $paginationTheme ="bootstrap";

    public $toefl;
    public $search;

    public function mount(Toefl $toefl)
    {
        $this->toefl = $toefl;
    }

    public function render()
    {
        $users = User::all();
        $asignateds = User::whereHas('toefl_assigned')->with('toefl_assigned')->paginate(8);
        return view('livewire.admin.toefl.users-asignated',compact('asignateds','users'));
    }

    public function limpiar_page(){
        $this->reset('page');
    }
}
