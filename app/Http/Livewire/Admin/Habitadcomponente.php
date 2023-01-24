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
    public $observacion , $latitud , $longitud;

    public $tanquedeagua, $capacidad;

    //barra de busqueda
    public $buscar;

    //modals
    public $modalhabitad = false;
    public $modalMensaje = false;
    public $titulo , $mensaje;

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
        $this->reset(['observacion']);
        $this->reset(['latitud']);
        $this->reset(['longitud']);
        $this->reset(['tanquedeagua']);
        $this->reset(['capacidad']);
        $this->modalhabitad = true;
    }

    public function registrarhabitad()
    {
        $this->validate([
            'comunal' => 'required',
            'direccion' => 'required',
            'habitad' => 'required|string',
            'literal' => 'nullable',
            'tipo' => 'required',
            'observacion' => 'nullable',
            'latitud' => 'nullable',
            'longitud' => 'nullable',
            'tanquedeagua' => 'nullable',  
            'capacidad' => 'nullable',                  
        ]);
        $codigo = Str::random(10);

        $indice = Habitad::create([
            'codigo' => $codigo,
            'habitad' => $this->habitad,
            'literal' => $this->literal,  
            'tipo' => $this->tipo,   
            'observacion' => $this->observacion,  
            'latitud' => $this->latitud,  
            'longitud' => $this->longitud,  
            'direccion_id' => $this->direccion,
            'consejo_comunal_id' => $this->comunal,                
        ]);

        $agua = $indice->serviciodeagua()->create([
            'tanquedeagua' => $this->tanquedeagua,
            'capacidad' => $this->capacidad,
        ]);
        
        $this->modalhabitad = false;
    }

    //componentes para la tabla de personas
    protected $queryString = [
        'buscar' => ['except' => '']
    ];

    public function render()
    {
        $habitaciones = Habitad::where('codigo', 'like', '%'.$this->buscar . '%')  //buscar por cedula 
                      ->orWhere('habitad', 'like', '%'.$this->buscar . '%') //buscar por nombres
                      ->orWhere('tipo', 'like', '%'.$this->buscar . '%') //buscar por apellidos
                      ->orderBy('id','desc') //ordenar de forma decendente
                      ->paginate(10); //paginacion
        
        if ($this->tanquedeagua == true) {
            $estado_tanquedeagua = true;
        } else {
            $estado_tanquedeagua = false;
        }

        return view('livewire.admin.habitadcomponente',[
            'habitaciones' => $habitaciones,
            'estado_tanquedeagua' => $estado_tanquedeagua
        ]);
    }

    //Actualizar tabla para corregir falla de busqueda
    public function updatingBuscar()
    {
        $this->resetPage();
    }
}
