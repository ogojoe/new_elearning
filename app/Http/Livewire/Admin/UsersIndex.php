<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

use Livewire\WithPagination;


class UsersIndex extends Component
{
    use WithPagination;
    
    protected $paginationTheme ="bootstrap";
    public $search;

    public $solicitudes;//Recibe el parametro desde la vista en showSolicitudes

    public function mount($solicitudes)
    {
        $this->solicitudes = $solicitudes;
    }

    public function render()
    {
        if ($this->solicitudes) {
            $users = User::whereDoesntHave('roles', function ($query) {
                $query->where('name','LIKE', '%'. $this->search .'%')
                ->orWhere('email','LIKE','%'. $this->search .'%');
            })->paginate(8);
            return view('livewire.admin.users-index',compact('users'));
        } else {
            $users = User::where('name','LIKE', '%'. $this->search .'%')
            ->orWhere('email','LIKE','%'. $this->search .'%')
            ->paginate(8);
            return view('livewire.admin.users-index',compact('users'));
        }
        
        
    }

    public function limpiar_page(){
        $this->reset('page');
    }
}
