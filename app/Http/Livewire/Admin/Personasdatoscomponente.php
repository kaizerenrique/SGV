<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Persona;
use App\Models\Carnetdelapatria;
use App\Models\Educacion;
use App\Models\Laboral;

class Personasdatoscomponente extends Component
{
    public $persona_id;
    
    //formulario
    public $codigo, $serial, $hogarespatria, $integrantes, $gradodeintruccion, $estudia, $trabaja, $condicionlaboral;
    public $partohumanizado, $lactanciamaterna, $mjgh, $amormayor;
    public $gestacion, $esterilizacion, $discapacidad, $carnetdiscapacidad, $codigocarnetdiscapacidad, $enfermedadcronica;
    public $atencionmedica, $quirurgica, $tipoquirurgica;

    public $modalMensaje = false;
    public $titulo , $mensaje;

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
        'codigo' => 'nullable|string|min:8|max:12|unique:carnetdelapatrias',
        'serial' => 'nullable|string|min:8|max:12|unique:carnetdelapatrias',
        'hogarespatria' => 'required',
        'integrantes' => 'nullable|string|in:1 Integrante,2 Integrante,3 Integrante,4 Integrante,5 Integrante,Más de 6 Integrante',
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
        'codigocarnetdiscapacidad' => 'nullable|string|min:8|max:12|unique:discapacidads',
        'enfermedadcronica' => 'nullable',
        'atencionmedica' => 'nullable',
        'quirurgica' => 'nullable',
        'tipoquirurgica' => 'nullable'
    ];

    public function guardardatos()
    {
        $info = $this->validate();

        $persona = Persona::find($this->persona_id);

        $carnetdelapatria = $persona->datospatria()->create([
            'codigo' => $info['codigo'],
            'serial' => $info['serial'],
            'hogarespatria' => $info['hogarespatria'],
            'integrantes' => $info['integrantes'],
            'partohumanizado' => $info['partohumanizado'],
            'lactanciamaterna' => $info['lactanciamaterna'],
            'mjgh' => $info['mjgh'],
            'amormayor' => $info['amormayor'],
        ]);

        $educacion = $persona->educacion()->create([
            'gradodeintruccion' => $info['gradodeintruccion'],
            'estudia' => $info['estudia'],
        ]);

        $laboral = $persona->laboral()->create([
            'trabaja' => $info['trabaja'],
            'condicionlaboral' => $info['condicionlaboral'],
        ]);

        if (!empty($info['discapacidad'])) {
            $discapacidad = $persona->discapacidad()->create([
                'discapacidad' => $info['discapacidad'],
                'carnetdiscapacidad' => $info['carnetdiscapacidad'],
                'codigocarnetdiscapacidad' => $info['codigocarnetdiscapacidad'],
            ]);
        } 
            
            $salud = $persona->salud()->create([
                'gestacion' => $info['gestacion'],
                'esterilizacion' => $info['esterilizacion'],
                'enfermedadcronica' => $info['enfermedadcronica'],
                'atencionmedica' => $info['atencionmedica'],
                'quirurgica' => $info['quirurgica'],
                'tipoquirurgica' => $info['tipoquirurgica'],
            ]);
        

        $this->titulo = '¡Alerta!';
        $this->mensaje = 'Registro Exitoso';
        $this->modalMensaje = true;
    }

    public function retornar()
    {
        return redirect()->route('personas');
    }
}
