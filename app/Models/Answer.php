<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    //Relacion uno a muchos inversa
    public function question(){
        return $this->belongsTo("App\Models\Question");
    }


}
