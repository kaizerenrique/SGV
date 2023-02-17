<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Familia;
use App\Models\Serviciocantvtelefono;

class Cantvcomponente extends Component
{
    use WithPagination;

    public $familia, $idfamilia;   
    public $codigodearea, $nrotelefono, $estado;
    
    public function mount($familia)
    {
        $this->familia = $familia;
    }

    protected function rules()
    {        
        return [
            'codigodearea' => 'required|numeric|integer|min:3',
            'nrotelefono' => 'required|numeric|integer|min:7|unique:serviciocantvtelefonos',
            'estado' => 'required|boolean',
        ];               
    }

    public function render()
    {
        $codigo = $this->familia;
        $familia = Familia::where('codigo',$codigo)->get();
        foreach ($familia as $famil) {
            $this->idfamilia = $famil->id;
        } 
        $telefonos = Serviciocantvtelefono::where('familia_id', $this->idfamilia)
        ->orderBy('id','desc') //ordenar de forma decendente
        ->paginate(10);

        return view('livewire.admin.cantvcomponente',[
            'codigo' => $codigo,
            'telefonos' => $telefonos,
        ]);
    }

    
    public function registrartelefono()
    {
        $this->validate();

        $tieneregistro = Serviciocantvtelefono::where('familia_id', $this->idfamilia)->count();
        
        if ($tieneregistro == 1) {
            $tienecantv = Serviciocantvtelefono::where('familia_id', $this->idfamilia)->get();
            foreach ($tienecantv as $cantv) {
                $codigo_operador = $cantv->codigo_operador;
                $nrotelefono = $cantv->nrotelefono;
                $estado  = $cantv->estado;
                $id = $cantv->id;
            } 

            if ($codigo_operador == null && $nrotelefono == null && $estado == null) {
                $telefonocantev = Serviciocantvtelefono::find($id);
                $telefonocantev->codigo_operador = $this->codigodearea; 
                $telefonocantev->nrotelefono = $this->nrotelefono; 
                $telefonocantev->estado = $this->estado;
                $telefonocantev->save();            
            } else {

                $familia = Familia::find($this->idfamilia);
                
                $familia->cantv()->create([
                    'posee_servicio' => 1,
                    'codigo_operador' => $this->codigodearea,
                    'nrotelefono' => $this->nrotelefono,
                    'estado' => $this->estado
                ]);            
            } 
        } else {
            $familia = Familia::find($this->idfamilia);
                
            $familia->cantv()->create([
                'posee_servicio' => 1,
                'codigo_operador' => $this->codigodearea,
                'nrotelefono' => $this->nrotelefono,
                'estado' => $this->estado
            ]); 
        }

        $this->reset(['codigodearea']);
        $this->reset(['nrotelefono']);
        $this->reset(['estado']);
           

    }

    public function eliminartelefono(Serviciocantvtelefono $telefono)
    {
        $telefono->delete(); 
    }

    public function seguir()
    {
        return redirect()->route('familias');
    }

}
