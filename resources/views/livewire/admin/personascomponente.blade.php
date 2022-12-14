<div class="p-2 bg-white border-b border-gray-200">
    <div class="mt-4 text-2xl">
        <div class="mt-4 text-2xl flex justify-between">
            <div class="mt-4 mb-4 text-2xl flex justify-between">
                Registrar perfiles
            </div>
            <div class="mr-2">                
                <x-jet-button class="bg-indigo-500 hover:bg-indigo-700" wire:click="agregarpersona" >
                    {{ __('Registrar Persona') }}
                </x-jet-button>
            </div>
        </div>        
    </div>

    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">        
        <div class="flex justify-between">            
            <div>
                <input wire:model="buscar" type="search" placeholder="Buscar" class="shadow appearence-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline placeholder-indigo-500" name="">
            </div>            
        </div>
        <table class="table-auto w-full mt-6">
            <thead>
                <tr class="bg-indigo-500 text-white">
                    <th class="px-4 py-2">
                        <div class="flex items-center">Cedula</div>
                    </th>                  
                    <th class="px-4 py-2">
                        <div class="flex items-center">Nombres y Apellidos</div>
                    </th> 
                    <th class="px-4 py-2">
                        <div class="flex items-center">Edad</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Sexo</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Activo</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">J. Familia</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">CNE</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">P. IVSS</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">R. IVSS</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">User</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Acci??n</div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($personas as $persona)
                    <tr>
                        <td class="rounded border px-4 py-2">{{$persona->nacionalidad}}-{{$persona->cedula}}</td>                                        
                        <td class="rounded border px-4 py-2">
                            <a href="#">
                                {{$persona->nombres}} {{$persona->apellidos}}
                            </a>                            
                        </td>
                        <td class="rounded border px-4 py-2">
                            @if ($persona->fnacimiento)
                                {{ \Carbon\Carbon::parse($persona->fnacimiento)->age}} 
                            @else
                                <p>No registrado</p>
                            @endif                             
                        </td>
                        <td class="rounded border px-4 py-2">{{$persona->sexo}}</td>
                        <td class="rounded border px-4 py-2">
                            @if ($persona->status == 1)                            
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>                              
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>                              
                            @endif
                        </td> 
                        <td class="rounded border px-4 py-2">
                            @if ($persona->jefedefamilia == 1)
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>  
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            @endif
                        </td>
                        <td class="rounded border px-4 py-2">                            
                            @if ($persona->cne->inscrito == 'SI')
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>  
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>                                
                            @endif
                        </td>
                        <td class="rounded border px-4 py-2">
                            @if ($persona->ivss->pension == 'SI')
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>  
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>                                
                            @endif
                        </td>
                        <td class="rounded border px-4 py-2">
                            @if ($persona->ivss->ivss == 'SI')
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>  
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>                                
                            @endif
                        </td>
                        <td class="rounded border px-4 py-2">
                            @if (!empty($persona->user))
                                <button class="bg-blue-500 text-white px-4 py-2 rounded-md text-1xl font-medium hover:bg-blue-700 transition duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                    </svg>
                                </button>                                
                            @else
                                <button class="bg-green-600 text-white px-4 py-2 rounded-md text-1xl font-medium hover:bg-green-700 transition duration-300" wire:click="nuevouser({{$persona->id}})">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                                    </svg>
                                </button>                                                            
                            @endif
                        </td>
                        <td class="rounded border px-4 py-2">
                            <a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </a>                                                          
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{$personas->links()}}
    </div>


<!-- Inicio del Modal para mensajes y alertas  -->
    <x-jet-dialog-modal wire:model="modalMensaje">
        <x-slot name="title">
            {{$titulo}} 
        </x-slot>

        <x-slot name="content">            
            {{$mensaje}}            
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalMensaje', false)" wire:loading.attr="disabled">
                {{ __('Aceptar') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
    <!-- Inicio del Modal para comprobar cedula -->
    <x-jet-dialog-modal wire:model="modalCedula">
        <x-slot name="title">
            {{ __('Registro') }}
        </x-slot>
        <x-slot name="content">             
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 text-sm text-gray-600">                
                <div class="col-span-2 sm:col-span-4">
                    <x-jet-label for="nacionalidad" value="{{ __('Nacionalidad') }}" />
                    <select name="nac" id="nac" wire:model.defer="nac" class="mt-1 block w-full"> 
                        <option value="" selected>Selecciona la Nacionalidad</option>                                                                         
                        <option value="V">Venezolano</option>
                        <option value="E">Extranjero</option>
                    </select> 
                    <x-jet-input-error for="nac" class="mt-2" />                   
                </div>
                <div class="col-span-2 sm:col-span-2">
                    <x-jet-label for="ci" value="{{ __('Numero de Cedula') }}" />
                    <x-jet-input id="ci" type="text" class="mt-1 block w-full" wire:model.defer="ci" />
                    <x-jet-input-error for="ci" class="mt-2" />
                </div>
                <div class="col-span-2 sm:col-span-2">
                    <x-jet-label for="fecha_nacimiento" value="{{ __('Fecha de Nacimiento') }}" />
                    <x-jet-input id="fecha_nacimiento" type="date" class="mt-1 block w-full" wire:model.defer="fecha_nacimiento" />
                    <x-jet-input-error for="fecha_nacimiento" class="mt-2" />
                </div>                                           
            </div>
        </x-slot>            

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalCedula', false)" wire:loading.attr="disabled">
                    {{ __('Cerrar') }}
            </x-jet-secondary-button>
            <x-jet-danger-button class="ml-3" wire:click="comprobarCedula()" wire:loading.attr="disabled">
                {{ __('Guardar') }}
            </x-jet-danger-button>            
        </x-slot>
    </x-jet-dialog-modal>
    <!-- Fin del Modal para comprobar cedula -->
<!-- Agregar Persona Confirmation Modal -->
<x-jet-dialog-modal wire:model="modalPersona">
    <x-slot name="title">
        {{'Registrar' }}
    </x-slot>

    <x-slot name="content">                
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 text-sm text-gray-600">
            <div class="col-span-2 sm:col-span-2">
                <x-jet-label for="name" value="{{ __('Nombre') }}" />
                <x-jet-input id="nombres" type="text" class="mt-1 block w-full" wire:model.defer="nombres"/>
                <x-jet-input-error for="nombres" class="mt-2" />
            </div>
            <div class="col-span-2 sm:col-span-2">
                <x-jet-label for="apellido" value="{{ __('Apellido') }}" />
                <x-jet-input id="apellidos" type="text" class="mt-1 block w-full" wire:model.defer="apellidos"/>
                <x-jet-input-error for="apellidos" class="mt-2" />
            </div>
            <div class="col-span-2 sm:col-span-2">
                <x-jet-label for="nac" value="{{ __('Nacionalidad') }}" />
                <x-jet-input id="nac" name="nac" type="text" class="mt-1 block w-full" wire:model.defer="nac" disabled/>
                <x-jet-input-error for=">nac" class="mt-2" />
            </div>                    
            <div class="col-span-2 sm:col-span-2">
                <x-jet-label for="cedula" value="{{ __('Cedula') }}" />
                <x-jet-input id="ci" name="ci" type="text" class="mt-1 block w-full" wire:model.defer="ci" disabled/>
                <x-jet-input-error for="ci" class="mt-2" />
            </div>
            <div class="col-span-2 sm:col-span-2">
                <x-jet-label for="fnacimiento" value="{{ __('Fecha de Nacimiento') }}" />
                <x-jet-input id="fecha_nacimiento" type="date" class="mt-1 block w-full" wire:model.defer="fecha_nacimiento" />
                <x-jet-input-error for="fecha_nacimiento" class="mt-2" />
            </div>
            <div class="col-span-2 sm:col-span-2">
                <x-jet-label for="campsexo" value="{{ __('Sexo') }}" />
                    <select name="sexo" id="sexo" wire:model.defer="sexo" class="mt-1 block w-full"> 
                        <option value="" selected>Selecciona el Sexo</option>                                                                         
                        <option value="Femenino">Femenino</option>
                        <option value="Masculino">Masculino</option>
                    </select> 
                <x-jet-input-error for="sexo" class="mt-2" />                   
            </div>
            <div class="col-span-2">
                <x-jet-label for="status" value="{{ __('Estatus') }}" />
                <x-jet-input id="status" type="checkbox" class="mt-1 mr-2" wire:model.defer="status"/> Seleccionar en caso de estatus activo                 
            </div>
            <div class="col-span-2">
                <x-jet-label for="jefedefamilia" value="{{ __('Jefe de familia ') }}" />
                <x-jet-input id="jefedefamilia" type="checkbox" class="mt-1 mr-2" wire:model.defer="jefedefamilia"/> Seleccionar si es jefe de familia 
            </div>

            <div class="col-span-1 sm:col-span-1">
                <x-jet-label for="codigo_operador" value="{{ __('Operador') }}" />
                    <select name="codigo_operador" id="codigo_operador" wire:model.defer="codigo_operador" class="mt-1 block w-full"> 
                        <option value="" selected>Selecciona el Operador</option>                                                                         
                        <option value="416">416</option>
                        <option value="426">426</option>
                        <option value="414">414</option>
                        <option value="424">424</option>
                        <option value="412">412</option>
                    </select> 
                <x-jet-input-error for="codigo_operador" class="mt-2" />                   
            </div> 
            
            <div class="col-span-2 sm:col-span-2">
                <x-jet-label for="nrotelefono" value="{{ __('Numero de Tel??fono ') }}" />
                <x-jet-input id=">nrotelefono" type="text" class="mt-1 block w-full" wire:model.defer="nrotelefono"/>
                <x-jet-input-error for="nrotelefono" class="mt-2" />
            </div>

            <div class="col-span-1">
                <x-jet-label for="whatsapp" value="{{ __('Whatsapp') }}" />
                <x-jet-input id="whatsapp" type="checkbox" class="mt-1 mr-2" wire:model.defer="whatsapp"/> 
            </div> 

        </div>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('modalPersona', false)" wire:loading.attr="disabled">
            {{ __('Cancelar') }}
        </x-jet-secondary-button>
        <x-jet-danger-button class="ml-3" wire:click="guardarpersona()" wire:loading.attr="disabled">
            {{ __('Guardar') }}
        </x-jet-danger-button>
    </x-slot>
</x-jet-dialog-modal>

<!-- Inicio del Modal para mostrar el codigo -->
    <!-- Inicio del Modal para usuario -->
    <x-jet-dialog-modal wire:model="modalNuevoUser">
        <x-slot name="title">
            {{ __('Registro') }}
        </x-slot>
        <x-slot name="content">             
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 text-sm text-gray-600">
                <div class="col-span-2 sm:col-span-2">
                    <x-jet-label for="name" value="{{ __('Nombre') }}" />
                    <x-jet-input id="nombres" type="text" class="mt-1 block w-full" wire:model.defer="nombres" disabled/>
                    <x-jet-input-error for="nombres" class="mt-2" />
                </div> 
                <div class="col-span-2 sm:col-span-2">
                    <x-jet-label for="rolUsuario" value="{{ __('Rol') }}" />
                    <select name="rol" id="rol" wire:model.defer="rol" class="mt-1 block w-full">
                        <option value="" selected>Seleccionar Rol</option>
                        @foreach ($roles as $role)                            
                            <option value="{{ $role->name }}">{{ $role->name }}</option>                            
                        @endforeach                        
                    </select>                  
                </div>
                <div class="col-span-2 sm:col-span-4">
                    <x-jet-label for="email" value="{{ __('Correo electr??nico') }}" />
                    <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="email" />
                    <x-jet-input-error for="email" class="mt-2" />
                </div>
                <x-jet-input id="idpersona" type="hidden" class="mt-1 block w-full" wire:model.defer="idpersona"/>                
            </div>
        </x-slot>            

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalNuevoUser', false)" wire:loading.attr="disabled">
                    {{ __('Cerrar') }}
            </x-jet-secondary-button>
            <x-jet-danger-button class="ml-3" wire:click="agregaruser()" wire:loading.attr="disabled">
                {{ __('Guardar') }}
            </x-jet-danger-button>            
        </x-slot>
    </x-jet-dialog-modal>
    <!-- Fin del Modal para usuario -->
</div>
