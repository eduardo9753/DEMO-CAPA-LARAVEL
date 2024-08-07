<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //PARA VERTIFICAR SI EL USUARIO ESTA MATRICUALDO EN EL CURSO
    public function enrolled(User $user, Course $course)
    {
        return $course->students->contains($user->id);
    }
}
