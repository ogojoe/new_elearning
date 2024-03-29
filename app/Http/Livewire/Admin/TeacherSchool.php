<?php

namespace App\Http\Livewire\Admin;
use App\Models\User;
use App\Models\Teacher;
use App\Models\School;
use Livewire\Component;

class TeacherSchool extends Component
{
    public $user, $escuela_id ,$name ;
    public $schools=[];

    public Teacher $teacher;

    protected $rules = [
        'name'=> 'required',
        'user_id'=>'required',
        'escuela_id'=>'required',
    ];

    public function mount(User $user)
    {
        $this->user = User::find($user->id);
        $teacher = Teacher::where('user_id',$user->id)->get();
        $teacher ? $this->teacher = $teacher: $this->teacher = new Teacher();
        $this->name = $user->name;
        $this->schools = School::all();
    }

    public function render(){
        
        return view('livewire.admin.teacher-school');
    }

    public function store(){
        $rules = [
            'name'=> 'required',
            'user.id' => 'required',
            'escuela_id'=> 'required'
        ];

        $this->validate($rules);

        Teacher::create([
            'name'=>$this->name,
            'user_id'=>$this->user->id,
            'school_id'=>$this->escuela_id
        ]);
        
        $this->reset(['name','escuela_id']);

        redirect()->route('admin.teachers.index')->with('info','Escuela asignada con éxito.');
        
    }


}
