<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ConsejoComunal;
use App\Models\Direccion;
use App\Models\Habitad;
use Illuminate\Support\Str;

class Habitadcomponente extends Component
{
    use WithPagination;

    //variables 
    public $comunal , $direccion;
    public $comunales = [], $direcciones = [];

    public $codigo , $habitad , $literal , $tipo;
    public $titularidad , $observacion , $latitud , $longitud;

    //modals
    public $modalhabitad = false;

    public function mount()
    {
        $this->comunales = ConsejoComunal::all();
        $this->direcciones = collect();
    }

    public function updatedComunal($value)
    {
        $this->direcciones = Direccion::where('consejo_comunal_id', $value )->get();
        $this->direccion = $this->direcciones->first()->id ?? null;
    }

    public function agregarhabitad()
    {
        $this->reset(['direccion']);
        $this->reset(['habitad']);
        $this->reset(['literal']);
        $this->reset(['tipo']);
        $this->reset(['titularidad']);
        $this->reset(['observacion']);
        $this->reset(['latitud']);
        $this->reset(['longitud']);
        $this->modalhabitad = true;
    }

    public function registrarhabitad()
    {
        $this->validate([
            'direccion' => 'required',
            'habitad' => 'required|string',
            'literal' => 'nullable',
            'tipo' => 'required',
            'titularidad' => 'nullable',
            'observacion' => 'nullable',
            'latitud' => 'nullable',
            'longitud' => 'nullable',                    
        ]);

        $codigo = Str::random(10);

        Habitad::create([
            'codigo' => $codigo,
            'habitad' => $this->habitad,
            'literal' => $this->literal,  
            'tipo' => $this->tipo,  
            'titularidad' => $this->titularidad,  
            'observacion' => $this->observacion,  
            'latitud' => $this->latitud,  
            'longitud' => $this->longitud,  
            'direccion_id' => $this->direccion,              
        ]);     
        
        $this->modalhabitad = false;
    }

    public function render()
    {
        return view('livewire.admin.habitadcomponente');
    }
}
