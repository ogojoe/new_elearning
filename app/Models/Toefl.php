<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toefl extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function questions()
    {
        return $this->hasMany("App\Models\QuestionToefl");
    }

    //Relacion muchos a muchos
    public function evaluateds(){
        return $this->belongsToMany("App\Models\User",'toefl_user');
    }
}
