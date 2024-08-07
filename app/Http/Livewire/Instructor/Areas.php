<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Area;
use Livewire\Component;

class Areas extends Component
{

    //TABLA AREA
    public $areas;

    //CAMPOS DE LA TABLA AREA
    public $area_id;
    public $name;

    public function mount()
    {
        $this->reload();
    }

    public function render()
    {
        return view('livewire.instructor.areas');
    }

    //INSERTAR NUEVA AREA
    public function create()
    {
        $this->validate(['name' => 'required']);

        $area = Area::create([
            'name' => $this->name,
        ]);
        $this->reload();
    }

    public function edit($id)
    {
        $area = Area::find($id);
        $this->area_id = $area->id;
        $this->name = $area->name;
    }

    public function update()
    {
        $this->validate(['name' => 'required']);
        $area = Area::find($this->area_id); //BUSCA EL PRIMARY KEY DE LA TABLA
        $area->update(['name' => $this->name,]);
        $this->reload();
    }

    //ELIMINAR UNA SECCION DEL CURSO
    public function delete($id)
    {
        $area = Area::find($id);
        $area->delete();
        $this->reload();
    }

    //LIMPIAR CAJAS
    public function resetInputFields()
    {
        $this->name = '';
        $this->area_id = '';
    }

    public function reload()
    {
        $this->areas = Area::all();
        $this->resetInputFields();
    }
}
