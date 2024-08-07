<?php

namespace App\Http\Controllers\instructor\lesson;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    //

    public function index(Course $course)
    {
        return view('Instructor.lesson.index', [
            'course' => $course
        ]);
    }
}
