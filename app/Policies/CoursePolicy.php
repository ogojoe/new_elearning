<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Course;

use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function enrolled(User $user, Course $course){
        return $course->students->contains($user->id);;
    }

    public function published(?User $user, Course $course)
    {
        if ($course->status == 3) {
            return true;
        }else{
            return false;
        }
    }

    public function dictated(?User $user, Course $course){
        if ($course->user_id == $user->id) {
            return true;
        }else{
            return false;
        }
    }

    public function revision(?User $user, Course $course)
    {
        if ($course->status == 2) {
            return true;
        }else{
            return false;
        }
    }
}