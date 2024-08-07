<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Course;
use App\Models\Section;
use Livewire\Component;

class Sections extends Component
{

    //TABLA COURSE
    public $course; //PARA REFREZCAR LOS DATOS 

    //CAMPOS DE LA TABLA SECTION
    public $section_id;
    public $titulo;

    public function mount(Course $course)
    {
        $this->course = $course;
    }

    public function render()
    {
        return view('livewire.instructor.sections');
    }

    //INSERTAR UNA NUEVA SECCION DEL CURSO
    public function create()
    {
        $this->validate(['titulo' => 'required',]);
        $section = Section::create([
            'titulo' => $this->titulo,
            'course_id' => $this->course->id
        ]);
        $this->reload($section);
    }

    //EDITAR LA SECCION DEL CURSO
    public function edit($id)
    {
        $section = Section::find($id);
        $this->titulo = $section->titulo;
        $this->section_id = $section->id;
    }

    //ACTUALIZAR LA SECCION DEL CURSO
    public function update()
    {
        $this->validate(['titulo' => 'required']);
        $section = Section::find($this->section_id); //BUSCA EL PRIMARY KEY DE LA TABLA
        $section->update(['titulo' => $this->titulo]);
        $this->reload($section);
    }

    //ELIMINAR UNA SECCION DEL CURSO
    public function delete($id)
    {
        $section = Section::find($id);
        if ($section) {
            $data = $section;
            $section->delete();
            $this->reload($data);
        }
    }

    //LIMPIAR CAJAS
    public function resetInputFields()
    {
        $this->titulo = '';
        $this->section_id = '';
    }

    //RECARGAR LOS DATOS 
    public function reload($section)
    {
        $course = Course::find($section->course_id); //BUSCA EL PRIMARY KEY DE LA TABLA
        $this->course = $course;
        $this->resetInputFields();
    }
}
