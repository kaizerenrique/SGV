<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Persona;

class Personasdatoscomponente extends Component
{
    public $persona_id;
    
    //formulario
    public $codigo, $serial, $hogarespatria, $integrantes, $gradodeintruccion, $estudia, $trabaja, $condicionlaboral;
    public $partohumanizado, $lactanciamaterna, $mjgh, $amormayor;
    public $gestacion, $esterilizacion, $discapacidad, $carnetdiscapacidad, $codigocarnetdiscapacidad, $enfermedadcronica;
    public $atencionmedica, $quirurgica, $tipoquirurgica;

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

        if ($this->discapacidad == true) {
            $estado_discapacidad = true;
        } else {
            $estado_discapacidad = false;
        }

        if ($this->carnetdiscapacidad) {
            $estado_carnetdiscapacidad = true;
        } else {
            $estado_carnetdiscapacidad = false;
        }
        
        if ($this->enfermedadcronica == true) {
            $estado_enfermedadcronica = true;
        } else {
            $estado_enfermedadcronica = true;
        }

        if ($this->quirurgica == true) {
            $estado_quirurgica = true;
        } else {
            $estado_quirurgica = false;
        }
               
        
        
        return view('livewire.admin.personasdatoscomponente',[
            'persona' => $persona,
            'estado' => $estado,
            'estadotrabaja' => $estadotrabaja,
            'estado_discapacidad' => $estado_discapacidad,
            'estado_carnetdiscapacidad' => $estado_carnetdiscapacidad,
            'estado_enfermedadcronica' => $estado_enfermedadcronica,
            'estado_quirurgica' => $estado_quirurgica,
        ]);
    }

    protected $rules = [
        'codigo' => 'nullable|string|digits_between:6,8',
        'serial' => 'nullable|string|digits_between:6,8',
        'hogarespatria' => 'required',
        'integrantes' => 'nullable|string|digits_between:1,2',
        'partohumanizado' => 'nullable',
        'lactanciamaterna' => 'nullable',
        'mjgh' => 'nullable',
        'amormayor' => 'nullable',
        'gradodeintruccion' => 'required|string',
        'estudia' => 'required',
        'trabaja' => 'required',
        'condicionlaboral' => 'nullable|string',
        'gestacion' => 'nullable',
        'esterilizacion' => 'nullable',
        'discapacidad' => 'nullable',
        'carnetdiscapacidad' => 'nullable',
        'codigocarnetdiscapacidad' => 'nullable|string',
        'enfermedadcronica' => 'nullable',
        'atencionmedica' => 'nullable',
        'quirurgica' => 'nullable',
        'tipoquirurgica' => 'nullable'
    ];

    public function guardardatos()
    {
        $info = $this->validate();
        dd($info);
    }
}
