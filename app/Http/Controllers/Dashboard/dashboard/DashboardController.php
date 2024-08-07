<?php

namespace App\Http\Controllers\Dashboard\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function __construct()
    {
        //auth
    }

    public function index()
    {
        // Obtener el usuario autenticado
        $user = auth()->user();

        // Obtener las áreas del usuario
        $areaId = $user->area_id;

        //obtener los cursos asociados al area del usuario
        $courses = Course::whereHas('areas', function($query) use ($areaId) {
              $query->where('area_id', $areaId);
        })->get();

        //dd($courses);

        return view('dashboard.index', [
            'courses' => $courses
        ]);
    }

    //PARA FIRMAR EL CURSO
    public function show(Course $course)
    {
        return view('dashboard.show', [
            'course' => $course
        ]);
    }
}
