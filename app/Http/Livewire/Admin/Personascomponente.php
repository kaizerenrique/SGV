<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Traits\OperacionesCedula;

class Personascomponente extends Component
{
    use WithPagination;
    use OperacionesCedula;

    //variables
    public $nac , $ci, $fecha_nacimiento;
    
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
        $resultado = $this->validate();      

        $info = $this->consultarpersona($this->nac, $this->ci, $this->fecha_nacimiento);

        dd($info);
    }

    public function render()
    {
        //$nac = 'V';
        //$ci = '20124379'; 
        //$info = $this->consultarpersona($nac, $ci);

        //dd($info);

        return view('livewire.admin.personascomponente');
    }
}
