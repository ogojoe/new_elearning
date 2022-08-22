<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Evaluation;
use App\Models\Group;
use App\Models\Score;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index(Group $group){
        $evaluations = [];
        if ($group->course_id) {
            $evaluations = Evaluation::where('course_id',$group->course_id)->get();
        }

        return view('teacher.group.index',compact('group','evaluations'));
    }


    public function assignEvaluation(Request $request)
    {
        $score = Score::where('evaluation_id',$request->evaluation_id)->where('student_id',$request->student_id)->first();

        if($score){
            return back()->with('info', 'Error: el exámen ya fue asignado a este alumno.'); 
        }else{
            Score::create([
                'evaluation_id' => $request->evaluation_id,
                'student_id' => $request->student_id,
                'chance'=>1
            ]);
            return back()->with('info', 'El exámen se asigno con éxito.');
        }




    }

    
}
