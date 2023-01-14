<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Familia;

class Familiacomponente extends Component
{
    use WithPagination;

    //barra de busqueda
    public $buscar;

    //componentes para la tabla de personas
    protected $queryString = [
        'buscar' => ['except' => '']
    ];

    public function render()
    {
        $familias = Familia::where('codigo', 'like', '%'.$this->buscar . '%')  //buscar por codigo
                      ->orderBy('id','desc') //ordenar de forma decendente
                      ->paginate(10); //paginacion

        //Numero de personas registradas
        $familiasnumero = Familia::count();
        return view('livewire.admin.familiacomponente',[
            'familiasnumero' => $familiasnumero,
            'familias' => $familias,
        ]);
    }

    //Actualizar tabla para corregir falla de busqueda
    public function updatingBuscar()
    {
        $this->resetPage();
    }

    public function pruebadeorden()
    {
        $familia = new Familia();
        $familia->codigo = uniqid('Familia-'); 
        $familia->status = 'Procesando';
        $familia->consejo_comunal_id = '1';
        $familia->clap_id = '1';
        $familia->habitad_id = '1';
        $familia->save();
    }
}
