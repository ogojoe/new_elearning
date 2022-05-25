<?php

namespace App\Http\Livewire\Students;

use Livewire\Component;
use App\Models\Course;
use App\Models\Category;
use App\Models\Level;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Livewire\WithPagination;

class CoursesIndex extends Component
{
    use WithPagination;

    public $category_id;
    public $level_id;

    public function render()
    {
        $categories = Category::all();
        $levels = Level::all();
       
        /* $courses = Course::myCourses(Auth::user()->id)
        ->category($this->category_id)
        ->level($this->level_id)
        ->paginate(8); */
        
        /* $courses = Course::find(Auth::user()->id)->mis_cursos()->get(); */
        $user = User::find(Auth::user()->id);

        /* $courses = User::find(Auth::user()->id); */

        return view('livewire.students.courses-index', compact('user', 'categories', 'levels'));
    }

    public function resetFilters(){
        $this->reset(['category_id', 'level_id']);
    }
    
}
