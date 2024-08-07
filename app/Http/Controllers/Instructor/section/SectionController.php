<?php

namespace App\Http\Controllers\instructor\section;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    //

    public function index(Course $course)
    {
        return view('Instructor.section.index', [
            'course' => $course
        ]);
    }
}
