<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Persona;

class Personasdatoscomponente extends Component
{
    public $persona_id;
    
    //formulario
    public $codigo, $serial, $hogarespatria, $integrantes, $gradodeintruccion, $estudia, $trabaja, $condicionlaboral;

    public function mount($persona_id )
    {
        $this->persona_id = $persona_id;
    }

    public function render()
    {
        $persona = Persona::find($this->persona_id);

        if ($this->hogarespatria == 1 ) {
            $estado = true;
        } else {
            $estado = false;
        } 

        if ($this->trabaja == 1) {
           $estadotrabaja = true;
        } else {
            $estadotrabaja = false;
        }
        
        
        return view('livewire.admin.personasdatoscomponente',[
            'persona' => $persona,
            'estado' => $estado,
            'estadotrabaja' => $estadotrabaja,
        ]);
    }

    protected $rules = [
        'codigo' => 'nullable|string|digits_between:6,8',
        'serial' => 'nullable|string|digits_between:6,8',
        'hogarespatria' => 'required',
        'integrantes' => 'nullable|string|digits_between:1,2',
        'gradodeintruccion' => 'required|string',
        'estudia' => 'required',
        'trabaja' => 'required',
        'condicionlaboral' => 'nullable|string',
    ];

    public function guardardatos()
    {
        $info = $this->validate();
        dd($info);
    }
}
