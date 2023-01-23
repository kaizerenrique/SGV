<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Familia;
use App\Models\Persona;

class Familiacomponente extends Component
{
    use WithPagination;

    //barra de busqueda
    public $buscar;

    public $mensaje, $titulo, $identificador;
    public $modalBorrarFamilia = false;
    public $modalMensaje = false;

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

    public function eliminarfamiliaconsulta($id)
    {
        $familia = Familia::find($id);

        $this->mensaje = 'Está seguro de querer eliminar el registro de la familia: '. $familia->codigo ;
        $this->identificador = $familia->id;
        $this->modalBorrarFamilia = true;
    }

    public function eliminarfamilia($id)
    {     
        $this->modalBorrarFamilia = false;   
        $familia = Familia::find($id);
        $personas = Persona::where('familia_id', $familia->id)->count();

        if ($personas == 0) {
            $familia->delete();
        } else {
            $personas = Persona::where('familia_id', $familia->id)->get();

            foreach ($personas as $persona) {
                $integrante = Persona::find($persona->id);
                $integrante->familia_id = null;
                $integrante->save(); 
            } 

            $personasfamilia = Persona::where('familia_id', $familia->id)->count();
            if ($personasfamilia == 0){
                $familia->delete();
            }
        }
        
        $this->titulo = 'Información';
        $this->mensaje = 'Se a eliminado el registro de forma exitosa';
        $this->modalMensaje = true;
    }
}
