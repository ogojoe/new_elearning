<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    const BORRADOR = 1;
    const ACTIVO = 2;
    const FINALIZADO = 3;

    

}
