<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Familia;
use App\Models\Serviciogas;

class Serviciogascomponente extends Component
{
    public $familia_id;

    //servicio de gas
    public $gas_directo, $bombonas_gas;
    
    public function mount($familia_id )
    {
        $this->familia_id = $familia_id;
    }

    public function render()
    {
        $familia = Familia::find($this->familia_id);

        $tieneregistro = Serviciogas::where('familia_id', $familia->id)->count();
        if ($tieneregistro == 1) {  
            $estado = true;            
        } else {
            $estado = false;
        }
        

        return view('livewire.admin.serviciogascomponente',[
            'familia' => $familia,
            'estado' => $estado,
        ]);
    }

    protected $rules = [
        'gas_directo' => 'required',
        'bombonas_gas' => 'required',
    ];

    public function serviciodegas()
    {
        $this->validate();
        $familia = Familia::find($this->familia_id);
        $gas = $familia->serviciogas()->create($this->validate());
        
    }

    public function guardardatos()
    {
        return redirect()->route('familias');
    }
}
