<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function course()
    {
        return $this->belongsTo("App\Models\Course");
    }


    public function questions()
    {
        return $this->hasMany("App\Models\Question");
    }

    public function scores()
    {
        return $this->hasMany(Score::class);
    }

}
