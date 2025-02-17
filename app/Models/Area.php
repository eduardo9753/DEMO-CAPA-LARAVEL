<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_area');
    }
}
