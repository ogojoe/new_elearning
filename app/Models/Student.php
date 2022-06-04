<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    use HasFactory;
    protected $fillable = [
        'name',
        'lastname',
        'cellphone',
        'nacionality',
        'degree',
        'school_id',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo("App\Models\User");
    }

    public function school(){
        return $this->belongsTo("App\Models\School");
    }

    //Relacion muchos a muchos 
    public function group_enrolled(){
        return $this->belongsToMany("App\Models\Group");
    }


}
