<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    const ACTIVO = 'activo';
    const INACTIVO = 'inactivo';

    protected $fillable = ['title', 'subtitle', 'description', 'status', 'slug', 'area_id', 'user_id'];

    public function areas()
    {
        return $this->belongsToMany(Area::class, 'course_area');
    }

    //RELACION UNO A MUCHOS INVERSA "me retorna al usuario que a dictado el curso"
    public function teacher()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    //RELACION DE MUCHO A MUCHOS "me retorna los estudiantes que se hayan matriculado al curso"
    public function students()
    {
        return $this->belongsToMany('App\Models\User');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'course_user');
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    //
    public function lessons()
    {
        return $this->hasManyThrough('App\Models\Lesson', 'App\Models\Section');
    }

    public function signatures()
    {
        return $this->hasMany(Signature::class); //hasOne para que solo pueda tener una sola firma
    }

    public function advance(Course $course)
    {
        $i = 0;
        foreach ($course->lessons as $lesson) {
            if ($lesson->completed) {
                $i++;
            }
        }

        $advance = ($i * 100) / ($course->lessons->count());
        return round($advance, 2);
    }
}
