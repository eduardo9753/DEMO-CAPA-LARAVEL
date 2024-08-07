<?php

namespace App\Http\Controllers\Instructor\Course;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // lista de cursos
    public function index()
    {
        $courses = Course::all();

        return view('Instructor.course.index', [
            'courses' => $courses
        ]);
    }

    //formulario para crear los cursos
    public function create()
    {
        return view('Instructor.course.create');
    }

    //para guardar los datos
    public function store(Request $request)
    {
        //dd($request);
        $request->request->add(['slug' => Str::slug($request->title)]); //PONER EN MINUSCULA Y LOS ESPACION LO RELLENA CON "-"

        $this->validate($request, [
            'title' => 'required|unique:courses',
            'subtitle' => 'required',
            'description' => 'required',
        ]);

        $course = Course::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'status' => Course::INACTIVO,
            'slug' => $request->slug,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('instructor.course.edit', $course);
    }

    public function edit(Course $course)
    {
        return view('Instructor.course.edit', [
            'course' => $course
        ]);
    }

    public function update(Request $request, Course $course)
    {
        $request->request->add(['slug' => Str::slug($course->title)]); //PONER EN MINUSCULA Y LOS ESPACION LO RELLENA CON "-"

        $this->validate($request, [
            'title' => 'required',
            'subtitle' => 'required',
            'description' => 'required',
        ]);

        $course->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'slug' => $request->slug,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('instructor.course.edit', $course);
    }

    //para asignar los cursos a diferentes areas
    public function asignar()
    {
        return view('Instructor.course.asignar');
    }
}
