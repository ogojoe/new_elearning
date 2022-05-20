<?php

namespace App\Http\Livewire\Admin;
use App\Models\User;
use App\Models\Student;
use App\Models\School;
use Livewire\Component;

class StudentSchool extends Component
{
    public $user, $school_id = 1 ,$name ,$schools;
    public Student $student;

    protected $rules = [
        'name'=> 'required',
        'user_id'=>'required',
        'school_id'=>'required',
    ];

    public function mount(User $user)
    {
        $this->user = User::find($user->id);
        $this->student = new student();
        $this->name = $user->name;
        $this->schools = School::all();
    }

    public function render(){
        
        return view('livewire.admin.student-school');
    }

    public function store(){
        $rules = [
            'name'=> 'required',
            'user.id' => 'required',
            'school_id'=> 'required'
        ];

        $this->validate($rules);

        Student::create([
            'name'=>$this->name,
            'user_id'=>$this->user->id,
            'school_id'=>$this->school_id
        ]);
        
        $this->reset(['name','school_id']);

        redirect()->route('admin.students.index')->with('info','Escuela asignada con éxito.');
        
    }

}
