<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionToefl extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function evaluation()
    {
        return $this->belongsTo("App\Models\Toefl");
    }

    public function answers()
    {
        return $this->hasMany("App\Models\AnswersToefl");
    }
}
