<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
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

    public function group(){
        return $this->belongsTo("App\Models\Group");
    }

    /**
     * Get all of the groups for the Teacher
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function groups()
    {
        return $this->hasMany(Group::class, 'teacher_id', 'id');
    }

  
}
