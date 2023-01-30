<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ConsejoComunal;
use App\Models\Clap;
use App\Models\Direccion;
use App\Models\Habitad;
use App\Models\Familia;
use App\Models\Persona;
use App\Models\Tenencia;
use App\Models\Serviciogas;

class Nuevafamiliacomponente extends Component
{
    use WithPagination;
    
    //variables
    public $consejocomunal , $clap , $direccion , $habitad, $codigo, $idfamilia, $tipodetenencia;
    public $consejocomunales = [] , $claps = [] , $direcciones = [] , $habitads = [];

    public $modalPersona = false;
    public $estado = false;

    public $familialistado = [];
    public $integrante;

    //servicio de gas
    public $gas_directo, $bombonas_gas;

    //barra de busqueda
    public $buscar;

    //componentes para la tabla de personas
    protected $queryString = [
        'buscar' => ['except' => '']
    ];

    public function mount()
    {
        $this->consejocomunales = ConsejoComunal::all();
        $this->claps = collect();
        $this->direcciones = collect();
        $this->habitads = collect();
    }

    public function updatedConsejocomunal($value)
    {
        $this->claps = Clap::where('consejo_comunal_id', $value )->get();
        $this->clap = $this->claps->first()->id ?? null;

        $this->direcciones = Direccion::where('consejo_comunal_id', $value )->get();
        $this->direccion = $this->direcciones->first()->id ?? null;
    }

    public function updatedDireccion($value)
    {
        $this->habitads = Habitad::where('direccion_id', $value )->get();
        $this->habitad = $this->habitads->first()->id ?? null;
    }

    public function registrar()
    {
        $this->validate([
            'consejocomunal' => 'required', 
            'clap' => 'required', 
            'direccion' => 'required', 
            'habitad' => 'required',
            'tipodetenencia' => 'required',
            'gas_directo' => 'required',
            'bombonas_gas' => 'required',
        ]);

        $this->codigo = uniqid('Familia-');

        $familia = new Familia();
        $familia->codigo = $this->codigo; 
        $familia->status = 'Procesando';
        $familia->consejo_comunal_id = $this->consejocomunal;
        $familia->clap_id = $this->clap;
        $familia->habitad_id = $this->habitad;
        $familia->user_id = auth()->user()->id;
        $familia->save();

        $familia->serviciogas()->create([
            'gas_directo' => $this->gas_directo,
            'bombonas_gas' => $this->bombonas_gas,
        ]);

        $tenencia = new Tenencia();
        $tenencia->tipodetenencia = $this->tipodetenencia;
        $tenencia->familia_id = $familia->id;
        $tenencia->habitad_id = $this->habitad;
        $tenencia->save();

    }

    public function listadepersonas()
    {
        $this->modalPersona = true;
    }

    public function agregarpersona($id)
    {
        $familia = Familia::where('codigo', $this->codigo)->get();

        foreach ($familia as $famil) {
            $resultado = $famil->id;
        }
        
        $integrantes = Familia::find($resultado);
        $integrantes->personas;

        //dd($integrantes->personas);

        if (!empty($integrantes->personas)) {
            $persona = Persona::find($id);        
            $persona->familia_id = $resultado;
            $persona->save();
        } else {
            dd($integrantes->personas);
        }
    }

    public function statusfamilia()
    {
        $familia = Familia::where('codigo', $this->codigo)->get();   
        foreach ($familia as $famil) {
            $idfamilia = $famil->id;
            $code = $famil->codigo;
        } 

        $integran = Persona::where('familia_id', $idfamilia)->count();        

        if ($integran == 0) {
            $famil = Familia::find($idfamilia);
            $famil->status = 'Pendiente';
            $famil->save();
        } else {
            $famil = Familia::find($idfamilia);
            $famil->status = 'Completado';            
            $famil->save();
        }

        $tieneregistro = Serviciogas::where('familia_id', $idfamilia)->count();

        if ($tieneregistro == 1) {
            $tiene_bombonas = Serviciogas::where('familia_id', $idfamilia)->get();
            foreach ($tiene_bombonas as $bombona) {
                $resultado = $bombona->bombonas_gas;
            } 
            if ($resultado == 1) {
                return redirect()->route('familiaserviciogas', $code);
            }else{
                return redirect()->route('familias');
            }            
        }
    }
    

    public function render()
    {
        $personas = Persona::where('familia_id', null)
                    ->when($this->buscar, function($query){
                        return $query->where(function ($query)
                        {
                            $query->where('cedula', 'like', '%'.$this->buscar . '%')
                            ->orWhere('nombres', 'like', '%'.$this->buscar . '%') //buscar por nombres
                            ->orWhere('apellidos', 'like', '%'.$this->buscar . '%') //buscar por apellidos
                            ->orderBy('id','desc'); //ordenar de forma decendente
                        });
                    });
        $personas = $personas->paginate(5);

        if (!empty($this->codigo)) {
            $familia = Familia::where('codigo', $this->codigo)->get();   
            foreach ($familia as $famil) {
                $idfamilia = $famil->id;
            } 

            
            $integran = Persona::where('familia_id', $idfamilia)->get();

            if (!empty($integran)) {
                $integrantes = $integran;
            } else {
                $integrantes = null;
            }
            
              
        } else {
            $integrantes = null;
        }
        

        

        return view('livewire.admin.nuevafamiliacomponente',[
            'personas' => $personas,
            'integrantes' => $integrantes,
        ]);
    }
}
