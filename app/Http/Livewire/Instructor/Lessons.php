<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Section;
use Livewire\Component;

class Lessons extends Component
{

    //TABLAS
    public $course; //PARA REFREZCAR LOS DATOS 
    public $platforms;
    public $sections;
    public $lessons;


    //CAMPOS DE LA TABLA LESSONS
    public $lesson_id;
    public $name;
    public $url;
    public $section_id;


    public function mount(Course $course)
    {
        $this->course = $course;
        // Asignar valores iniciales si es necesario para que no dea null
        $this->section_id = Section::where('course_id', $this->course->id)->value('id');

        //DATOS DE LA PLATAFORMA Y LAS SECCION DEL CURSO
        $this->sections = Section::where('course_id', '=', $this->course->id)->get();
    }

    public function render()
    {
        return view('livewire.instructor.lessons');
    }

    //METODO PARA CREAR UNA LECCION AL CURSO SELECCIONADO
    public function create()
    {
        $this->validateLesson();

        $lesson = Lesson::create([
            'name' => $this->name,
            'url' => $this->url,
            'iframe' => $this->generateIframe($this->url, 1),
            'section_id' => $this->section_id,
        ]);

        $section = Section::find($lesson->section_id);
        $this->reload($section);
        //DEBUGUEAR LOS CAMPÓS LO PEGAS EN TU COMPONENTE CON LOS DATOS DECLADAROS ARRIBA 
        //@dump($name, $url, $platform_id, $section_id)
    }

    public function edit($id)
    {
        $lesson = Lesson::find($id);
        $this->lesson_id = $lesson->id;
        $this->name = $lesson->name;
        $this->url = $lesson->url;
        $this->section_id = $lesson->section_id;
    }

    public function update()
    {
        $this->validateLesson();

        $lesson = Lesson::find($this->lesson_id);
        $lesson->update([
            'name' => $this->name,
            'url' => $this->url,
            'iframe' => $this->generateIframe($this->url, 1),
            'section_id' => $this->section_id,
        ]);

        $section = Section::find($lesson->section_id);
        $this->reload($section);
    }

    //ELIMINAR UNA LECCION DE LA SECCION DEL CURSO
    public function delete($id)
    {
        $dataLesson =  Lesson::find($id);
        $section = Section::find($dataLesson->section_id);
        if ($section) {
            $this->reload($section);
            $dataLesson->delete();
        }
    }

    public function validateLesson()
    {
        $this->validate([
            'name' => 'required',
            'url' => 'required|url',
            'section_id' => 'required',
        ]);
    }

    public function resetInputFields()
    {
        $this->lesson_id = '';
        $this->name = '';
        $this->url = '';
    }

    //RECARGAR LOS DATOS 
    public function reload($section)
    {
        $course = Course::find($section->course_id);
        $this->course = $course;
        $this->resetInputFields();
    }

    public function generateIframe($url, $platform_id)
    {
        if ($platform_id == 1) {
            // Para YouTube
            $pattern = '/(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com(?:\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)))?([\w-]{10,12})/';
            preg_match($pattern, $url, $matches);
            $videoId = $matches[1] ?? '';

            // Modificar la URL del iframe para agregar autoplay, quitar el banner de videos relacionados y reducir el branding
            $iframeUrl = 'https://www.youtube.com/embed/' . $videoId . '?autoplay=1&rel=0&modestbranding=1';

            return '<iframe width="560" height="315" src="' . $iframeUrl . '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        }
        return ''; // En caso de no ser una plataforma compatible
    }
}
