<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'url', 'iframe', 'section_id'];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    //RELACION MUCHOS A MUCHOS
    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }

    //METODO PARA VER SU UNA LECCION ESTA CULMINA tabla "lesson_user"
    public function getCompletedAttribute()
    {
        return $this->users->contains(auth()->user()->id);
    }
}
