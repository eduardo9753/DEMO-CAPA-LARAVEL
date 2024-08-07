<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Area;
use App\Models\Course;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class AreaCourse extends Component
{
    //tabla cursos
    public $courses;
    public $course_id;

    //tabla areas
    public $areas;
    public $area_id;

    //variable que emgrana tanto cursos con areas
    public $coursesTable;

    public function mount()
    {
        $this->courses = Course::all();
        $this->areas = Area::all();
        $this->reload();
        //dd($this->courses);

        //INCIALIZAMOS LOS IDS DE LAS TABLAS PARA QUE NO DE ERROR
        $this->area_id = Area::first()->id;
        $this->course_id = Course::first()->id;
    }

    public function render()
    {
        return view('livewire.instructor.area-course');
    }

    public function create()
    {
        // Verifica que las propiedades estén definidas y tengan valores
        if (isset($this->course_id) && isset($this->area_id)) {
            $isContains = DB::table('course_area')
                ->where('course_id', $this->course_id)
                ->where('area_id', $this->area_id)
                ->exists(); // Cambia get() por exists() para verificar si hay registros

            if ($isContains) {
                //emitir alerta
                $this->emit('alert', 'El curso ya se encuentra asignado al area elegida', 'warning');
            } else {
                $isCorrect = DB::table('course_area')->insert([
                    'course_id' => $this->course_id,
                    'area_id' => $this->area_id
                ]);
                if ($isCorrect) {
                    //emitir alerta
                    $this->emit('alert', 'Datos ingresados correctamente', 'success');
                } else {
                    //emitir alerta
                    $this->emit('alert', 'Datos no ingresados', 'danger');
                }
            }
        } else {
            //emitir alerta
            $this->emit('alert', 'Faltan datos de area_id o course_id', 'danger');
        }
        $this->reload();
    }

    public function reload()
    {
        $this->coursesTable = Course::with('areas')->get();
    }

    public function deleteArea($course_id, $area_id)
    {
        /* Verifica si la relación existe */
        $isContains = DB::table('course_area')
            ->where('course_id', $course_id)
            ->where('area_id', $area_id)
            ->exists();

        if ($isContains) {
            $deleted = DB::table('course_area')
                ->where('course_id', $course_id)
                ->where('area_id', $area_id)
                ->delete();

            if ($deleted) {
                // Emite el evento confirmDelete con los parámetros necesarios
                //$this->emit('confirmDelete', '¿Seguro quiere borrar los datos?', 'warning', $course_id, $area_id);
                $this->emit('alert', 'El registro eliminado', 'success');
            } else {
                $this->emit('alert', 'El registro no existe', 'error');
            }
        }
        $this->reload(); // Recarga la tabla 
    }

    //METODO EN DESUSO, NO CAPTA EL EMIT DESDE EL JSVASCRIP
    public function confirmDeleteCourseArea($course_id, $area_id)
    {
        /* Elimina el registro */
        $deleted = DB::table('course_area')
            ->where('course_id', $course_id)
            ->where('area_id', $area_id)
            ->delete();

        if ($deleted) {
            // Emite una alerta de éxito
            $this->emit('alert', 'El registro ha sido eliminado correctamente', 'success');
        } else {
            $this->emit('alert', 'No se pudo eliminar el registro', 'error');
        }
        $this->reload(); // Recarga la tabla después de eliminar
        //dump($course_id,$area_id);
    }
}
