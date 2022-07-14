<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//Asigna, guarda calificacion e intentos de evaluaciones.
class Score extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function evaluation()
    {
        return $this->belongsTo(Evaluation::class);
    }

}
