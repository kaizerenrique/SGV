<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Direccion;

class Direccioncomponente extends Component
{
    use WithPagination;

    public $latitud , $longitud;
    //barra de busqueda
    public $buscar;

    //componentes para la tabla de personas
    protected $queryString = [
        'buscar' => ['except' => '']
    ];

    public function render()
    {
        $direcciones = Direccion::where('direccion', 'like', '%'.$this->buscar . '%')  //buscar por cedula 
                      ->orWhere('codigo', 'like', '%'.$this->buscar . '%') //buscar por nombres
                      ->orWhere('tipo', 'like', '%'.$this->buscar . '%') //buscar por apellidos
                      ->orderBy('id','desc') //ordenar de forma decendente
                      ->paginate(10); //paginacion

        return view('livewire.admin.direccioncomponente',[
            'direcciones' => $direcciones,
        ]);
    }

    //Actualizar tabla para corregir falla de busqueda
    public function updatingBuscar()
    {
        $this->resetPage();
    }

    public function geolocalizacion($id)
    {      
        $resul = Direccion::find($id);
        dd($resul->latitud);
    }
}
