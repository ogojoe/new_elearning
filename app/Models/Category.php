<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    //RElacion uno a muchos con cursos
    public function course()
    {
        return $this->hasMany("App\Models\Course");
    }
}
