<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Traits\OperacionesCedula;
use App\Models\Persona;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Mail\RegistroUsuarioMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class Personascomponente extends Component
{
    use WithPagination;
    use OperacionesCedula;

    //variables
    public $nac , $ci, $fecha_nacimiento;
    public $nombres , $apellidos;
    //variables del cne
    public $inscrito , $cvestado , $cvmunicipio , $cvparroquia , $centro , $direccion;
    //variables ivss
    public $pension , $ivss;

    public $sexo, $status, $jefedefamilia;

    //datos de telefono para contacto
    public $codigo_internacional , $codigo_operador , $nrotelefono , $whatsapp;

    //barra de busqueda
    public $buscar;

    //usuario para persona
    public $email , $rol, $idpersona;

    public $persona_id;
    
    //modals
    public $modalCedula = false;
    public $modalPersona = false;
    public $modalMensaje = false;
    public $titulo , $mensaje;
    public $modalNuevoUser = false;

    // seccion para agregar persona    
    public function agregarpersona()
    {
        $this->reset(['nac']);
        $this->reset(['ci']);
        $this->reset(['fecha_nacimiento']);
        $this->modalCedula = true;
    }

    protected function rules()
    {
        if ($modalCedula = true) {
            return [
                'nac' => 'required',
                'ci' => 'required|numeric|integer|digits_between:6,8',
                'fecha_nacimiento' => 'nullable|date'
            ];
        }        
    }

    public function comprobarCedula()
    {
        $this->validate();
        $info = $this->consultarpersona($this->nac, $this->ci, $this->fecha_nacimiento);
        
        if ($info == false) {
            $this->modalCedula = false;
            $this->titulo = "¡Alerta!";
            $this->mensaje = "El numero de cedula ingresado ya se encuentra registrado.";
            $this->modalMensaje = true;
        } elseif ($info == 'no cne'){
            $this->nac = $this->nac;
            $this->cedula = $this->ci;            
            $this->fecha_nacimiento = $this->fecha_nacimiento;
            $this->inscrito = 'NO';
            $this->pension = 'NO';
            $this->ivss = 'NO';
            $this->modalPersona = true;
        } else {
            $this->modalCedula = false;
        
            $this->nac = $info['persona']['nacionalidad'];
            $this->cedula = $info['persona']['cedula'];
            $this->nombres = $info['persona']['nombres'];
            $this->apellidos = $info['persona']['apellidos'];
            $this->fecha_nacimiento = $this->fecha_nacimiento;
            $this->inscrito = $info['cne']['inscrito'];
            $this->cvestado = $info['cne']['cvestado'];
            $this->cvmunicipio = $info['cne']['cvmunicipio'];
            $this->cvparroquia = $info['cne']['cvparroquia'];
            $this->centro = $info['cne']['centro'];
            $this->direccion = $info['cne']['direccion'];
            $this->pension = $info['pension'];
            $this->ivss = $info['ivss'];

            $this->reset(['codigo_operador']);
            $this->reset(['nrotelefono']);
            $this->reset(['whatsapp']);

            $this->modalPersona = true;
        }
        
        
    }

    public function guardarpersona()
    {
        $resul = $this->validate([
            'nac' => 'required',
            'cedula' => 'required',
            'nombres' => 'required',
            'apellidos' => 'required',
            'fecha_nacimiento' => 'nullable|date',
            'sexo' => 'required',
            'status' => 'nullable',
            'jefedefamilia' => 'nullable',
            'inscrito' => 'nullable',
            'cvestado' => 'nullable',
            'cvmunicipio' => 'nullable',
            'cvparroquia' => 'nullable',
            'centro' => 'nullable',
            'direccion' => 'nullable',
            'pension' => 'nullable',
            'ivss' => 'nullable',
            'codigo_operador' => 'nullable',
            'nrotelefono' => 'nullable|string|digits_between:6,8',
            'whatsapp' => 'nullable',

        ]);

        

        if ($resul['inscrito'] == 'NO') {
            $persona = Persona::create([
                'nacionalidad' => $resul['nac'],
                'cedula' => $resul['cedula'],
                'nombres' => $resul['nombres'],
                'apellidos' => $resul['apellidos'],
                'fnacimiento' => $resul['fecha_nacimiento'],
                'sexo' => $resul['sexo'],
                'status' => $resul['status'],
                'jefedefamilia' => $resul['jefedefamilia'],
            ]);
            
            $cne = $persona->cne()->create([
                'inscrito' => $resul['inscrito']
            ]);

            $ivss = $persona->ivss()->create([
                'pension' => $resul['pension'],
                'ivss' => $resul['ivss']
            ]);
    
            if (!empty($resul['nrotelefono'])) {
                $telefono = $persona->telefono()->create([
                    'codigo_internacional' => '58',
                    'codigo_operador' => $resul['codigo_operador'],
                    'nrotelefono' => $resul['nrotelefono'],
                    'whatsapp' => $resul['whatsapp'],
                ]);
            }  
            
        } else {
            $persona = Persona::create([
                'nacionalidad' => $resul['nac'],
                'cedula' => $resul['cedula'],
                'nombres' => $resul['nombres'],
                'apellidos' => $resul['apellidos'],
                'fnacimiento' => $resul['fecha_nacimiento'],
                'sexo' => $resul['sexo'],
                'status' => $resul['status'],
                'jefedefamilia' => $resul['jefedefamilia'],
            ]);
            
            $cne = $persona->cne()->create([
                'inscrito' => $resul['inscrito'],
                'cvestado' => $resul['cvestado'],
                'cvmunicipio' => $resul['cvmunicipio'],
                'cvparroquia' => $resul['cvparroquia'],
                'centro' => $resul['centro'],
                'direccion' => $resul['direccion']
            ]);
    
            $ivss = $persona->ivss()->create([
                'pension' => $resul['pension'],
                'ivss' => $resul['ivss']
            ]);
    
            if (!empty($resul['nrotelefono'])) {
                $telefono = $persona->telefono()->create([
                    'codigo_internacional' => '58',
                    'codigo_operador' => $resul['codigo_operador'],
                    'nrotelefono' => $resul['nrotelefono'],
                    'whatsapp' => $resul['whatsapp'],
                ]);
            }  
        }
        

        
        $this->modalPersona = false; 
        
        $persona_id = $persona->id;
        return redirect()->route('persona_datos',$persona_id);
    }

    //gestion del usuario de persona
    public function nuevouser($id)
    {
        $resul = Persona::find($id);
        $nombre = strtok($resul->nombres, " ");
        $apellido = strtok($resul->apellidos, " ");

        $nombreapellido = $nombre.' '.$apellido;

        //dd($nombreapellido);
        $this->nombres = $nombreapellido;
        $this->idpersona = $resul->id;
        $this->reset(['email']);
        $this->reset(['rol']);
        $this->modalNuevoUser = true;
    }
    public function agregaruser()
    {
        $this->validate([
            'idpersona' => 'required',
            'nombres' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users',
            'rol' => 'required|string'
        ]);
        $password = Str::random(10);

        $usuario = User::create([
            'name' => $this->nombres,
            'email' => $this->email,
            'password' => bcrypt($password),
        ])->assignRole('Administrador');
        
        //actualizamos el id de usuario en la tabla de personas
        $persona = Persona::find($this->idpersona);
        $persona->user_id = $usuario->id;
        $persona->save();

        $this->modalNuevoUser = false;

        $mensajeCorreo = 'Por medio de este correo le damos la bienvenid@, puedes ingresar usando las siguientes credenciales: ';
        $name = $this->nombres;
        $email = $this->email;
        $password = $password;
        
        try {
            $confirmacion = Mail::to($email)->send(new RegistroUsuarioMailable($mensajeCorreo, $name, $email, $password));
                      
            $this->titulo = 'Notificación.';
            $this->mensaje = 'Usuario registrado correctamente y correo enviado.';
            $this->modalMensaje = true;
        } catch (\Throwable $th) {
            $confirmacion = false;

            $this->titulo = '¡ Alerta Error !';
            $this->mensaje = 'Usuario registrado correctamente pero correo no enviado, error en envió de correo. ';
            $this->modalMensaje = true;
        }
    }

    //componentes para la tabla de personas
    protected $queryString = [
        'buscar' => ['except' => '']
    ];

    public function render()
    {

        $personas = Persona::where('cedula', 'like', '%'.$this->buscar . '%')  //buscar por cedula 
                      ->orWhere('nombres', 'like', '%'.$this->buscar . '%') //buscar por nombres
                      ->orWhere('apellidos', 'like', '%'.$this->buscar . '%') //buscar por apellidos
                      ->orderBy('id','desc') //ordenar de forma decendente
                      ->paginate(10); //paginacion
        
        $roles = Role::all();

        //Numero de personas registradas
        $personasnumero = Persona::count();

        return view('livewire.admin.personascomponente',[
            'personas' => $personas,
            'roles' => $roles,
            'personasnumero' => $personasnumero,
        ]);
    }

    //Actualizar tabla para corregir falla de busqueda
    public function updatingBuscar()
    {
        $this->resetPage();
    }
}
