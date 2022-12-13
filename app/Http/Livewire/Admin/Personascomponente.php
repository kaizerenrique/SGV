<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Traits\OperacionesCedula;
use App\Models\Persona;

class Personascomponente extends Component
{
    use WithPagination;
    use OperacionesCedula;

    //variables
    public $nac , $ci, $fecha_nacimiento;
    public $nombres , $apellidos;
    //variables del cne
    public $inscrito , $cvestado , $cvmunicipio , $cvparroquia , $centro , $direccion;
    //variables ivss
    public $pension , $ivss;

    public $sexo, $status, $jefedefamilia;

    //datos de telefono para contacto
    public $codigo_internacional , $codigo_operador , $nrotelefono , $whatsapp;
    
    //modals
    public $modalCedula = false;
    public $modalPersona = false;

    public function agregarpersona()
    {
        $this->reset(['nac']);
        $this->reset(['ci']);
        $this->reset(['fecha_nacimiento']);
        $this->modalCedula = true;
    }

    protected function rules()
    {
        if ($modalCedula = true) {
            return [
                'nac' => 'required',
                'ci' => 'required|numeric|integer|digits_between:6,8',
                'fecha_nacimiento' => 'nullable|date'
            ];
        }        
    }

    public function comprobarCedula()
    {
        $this->validate();
        $info = $this->consultarpersona($this->nac, $this->ci, $this->fecha_nacimiento);
        
        if ($info == false) {
            

        } else {
            $this->modalCedula = false;
        
            $this->nac = $info['persona']['nacionalidad'];
            $this->cedula = $info['persona']['cedula'];
            $this->nombres = $info['persona']['nombres'];
            $this->apellidos = $info['persona']['apellidos'];
            $this->fecha_nacimiento = $this->fecha_nacimiento;
            $this->inscrito = $info['cne']['inscrito'];
            $this->cvestado = $info['cne']['cvestado'];
            $this->cvmunicipio = $info['cne']['cvmunicipio'];
            $this->cvparroquia = $info['cne']['cvparroquia'];
            $this->centro = $info['cne']['centro'];
            $this->direccion = $info['cne']['direccion'];
            $this->pension = $info['pension'];
            $this->ivss = $info['ivss'];

            $this->reset(['codigo_operador']);
            $this->reset(['nrotelefono']);
            $this->reset(['whatsapp']);

            $this->modalPersona = true;
        }
        
        
    }

    public function guardarpersona()
    {
        $resul = $this->validate([
            'nac' => 'required',
            'cedula' => 'required',
            'nombres' => 'required',
            'apellidos' => 'required',
            'fecha_nacimiento' => 'nullable|date',
            'sexo' => 'nullable',
            'status' => 'nullable',
            'jefedefamilia' => 'nullable',
            'inscrito' => 'nullable',
            'cvestado' => 'nullable',
            'cvmunicipio' => 'nullable',
            'cvparroquia' => 'nullable',
            'centro' => 'nullable',
            'direccion' => 'nullable',
            'pension' => 'nullable',
            'ivss' => 'nullable',
            'codigo_operador' => 'nullable',
            'nrotelefono' => 'nullable|string|digits_between:6,8',
            'whatsapp' => 'nullable',

        ]);

        $persona = Persona::create([
            'nacionalidad' => $resul['nac'],
            'cedula' => $resul['cedula'],
            'nombres' => $resul['nombres'],
            'apellidos' => $resul['apellidos'],
            'fnacimiento' => $resul['fecha_nacimiento'],
            'sexo' => $resul['sexo'],
            'status' => $resul['status'],
            'jefedefamilia' => $resul['jefedefamilia'],
        ]);
        
        $cne = $persona->cne()->create([
            'inscrito' => $resul['inscrito'],
            'cvestado' => $resul['cvestado'],
            'cvmunicipio' => $resul['cvmunicipio'],
            'cvparroquia' => $resul['cvparroquia'],
            'centro' => $resul['centro'],
            'direccion' => $resul['direccion']
        ]);

        $ivss = $persona->ivss()->create([
            'pension' => $resul['pension'],
            'ivss' => $resul['ivss']
        ]);

        $telefono = $persona->telefono()->create([
            'codigo_internacional' => '58',
            'codigo_operador' => $resul['codigo_operador'],
            'nrotelefono' => $resul['nrotelefono'],
            'whatsapp' => $resul['whatsapp'],
        ]);

        $this->modalPersona = false;        
    }

    public function render()
    {

        return view('livewire.admin.personascomponente');
    }
}
