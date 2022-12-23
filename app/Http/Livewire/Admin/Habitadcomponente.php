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
        $this->reset(['titularidad']);
        $this->reset(['observacion']);
        $this->reset(['latitud']);
        $this->reset(['longitud']);
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
            'titularidad' => 'nullable',
            'observacion' => 'nullable',
            'latitud' => 'nullable',
            'longitud' => 'nullable',                    
        ]);

        $codigo = Str::random(10);

        $habitad_count = Habitad::count();

        if ($habitad_count > 0) {
            $controls = Habitad::where('consejo_comunal_id', $this->comunal)->get();

            foreach ($controls as $control)
            {
                if (($control->consejo_comunal_id == $this->comunal) && ($control->direccion_id == $this->direccion) && ($control->habitad == $this->habitad) && ($control->literal == $this->literal)) {
                    $this->titulo = "¡Alerta!";
                    $this->mensaje = "La dirección ya se encuentra registrada.";
                    $this->modalMensaje = true;
                } else {
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
                        'consejo_comunal_id' => $this->comunal,                
                    ]);
                }
                
            }
        } else {
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
                'consejo_comunal_id' => $this->comunal,                
            ]); 
        }
        
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

        return view('livewire.admin.habitadcomponente',[
            'habitaciones' => $habitaciones,
        ]);
    }

    //Actualizar tabla para corregir falla de busqueda
    public function updatingBuscar()
    {
        $this->resetPage();
    }
}
