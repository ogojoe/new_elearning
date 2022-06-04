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

    protected $fillable = [
        'name',
        'periodo',
        'school_id',
        'category_id',
        'level_id',
        'teacher_id',
        'course_id'

    ];

    public function school(){
        return $this->belongsTo("App\Models\School");
    }

    public function studentsGroup()
    {
        return $this->belongsToMany("App\Models\Student");
    }

    public function teacher()
    {
        return $this->belongsTo("App\Models\Teacher","id","teacher_id");
    }

    /**
     * Get the maestro that owns the Group
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function maestro()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }


    public function course()
    {
        return $this->hasOne("App\Models\Course","id","course_id");
    }

    public function getStudentsIds()
    {
        return $this->studentsGroup()->pluck('user_id');
    }

}
