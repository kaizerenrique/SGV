<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Familia;
use App\Models\Serviciogas;
use App\Models\Proveedoresdeservicios;
use App\Models\Detallegasfamilia;
use App\Models\Serviciocantvtelefono;

class Serviciogascomponente extends Component
{
    use WithPagination;

    public $familia, $identificador, $idfamilia;

    public $regbombona;
    public $modalRegistrarBombonas = false;
    
    public function mount($familia)
    {
        $this->familia = $familia;
    }

    public function render()
    {
        //identificacion de familia
        $codigo = $this->familia;
        $familia = Familia::where('codigo',$codigo)->get();
        foreach ($familia as $famil) {
            $this->idfamilia = $famil->id;
        } 
        //informacion del servicio
        $serviciogas = Serviciogas::where('familia_id', $this->idfamilia)->get();
        foreach ($serviciogas as $servicio) {
            $idserviciogas = $servicio->id;
        }
        //proveedor del servicio
        $prestadordeservicios = Proveedoresdeservicios::where('servicio_id', 1)->get();
        
        $resul = Familia::find($this->idfamilia);
        $this->identificador = $resul;
        $bombonas = $resul->bombonas()->orderBy('id','desc')->paginate(10);

        return view('livewire.admin.serviciogascomponente',[
            'codigo' => $codigo,
            'bombonas' => $bombonas,
            'prestadordeservicios' => $prestadordeservicios,
        ]);
    }

    protected $rules = [
        'regbombona.proveedor' => 'required', 
        'regbombona.tipobombona' => 'required|in:10KG,18KG,43KG', 
        'regbombona.estado' => 'required|in:Bueno,Dañado',  
        'regbombona.cantidad' => 'required|numeric|integer|digits_between:1,2',       
    ];

    public function registrarbombonas()
    {
        $this->reset(['regbombona']);
        $this->modalRegistrarBombonas = true;
    }

    public function guardarbombona()
    {
        $this->validate();

        $restar = $this->identificador->bombonas()->create([
            'servicioga_id' => $this->identificador->serviciogas->id,
            'proveedoresdeservicio_id' => $this->regbombona['proveedor'],
            'tipobombona' => $this->regbombona['tipobombona'],
            'estado' => $this->regbombona['estado'],
            'cantidad' => $this->regbombona['cantidad'],
        ]);
        
        $this->modalRegistrarBombonas = false;
    }

    public function seguir()
    {
        
        $tieneregistro = Serviciocantvtelefono::where('familia_id', $this->idfamilia)->count();
                
        if ($tieneregistro == 1) {      
            $tienecantv = Serviciocantvtelefono::where('familia_id', $this->idfamilia)->get();
            foreach ($tienecantv as $cantv) {
                $resultado = $cantv->posee_servicio;
            } 

            if ($resultado == 1) {
                return redirect()->route('familiaserviciocantv', $this->familia);  
            } else {
                return redirect()->route('familias');
            }     
        } else{
            return redirect()->route('familias');
        }
        
    }
   
}
