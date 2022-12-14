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
                        <div class="flex items-center">Nombres</div>
                    </th>                 
                    <th class="px-4 py-2">
                        <div class="flex items-center">Apellidos</div>
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
                        <div class="flex items-center">Jefe de Familia</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">CNE</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Pension IVSS</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">IVSS</div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($personas as $persona)
                    <tr>
                        <td class="rounded border px-4 py-2">{{$persona->nacionalidad}}-{{$persona->cedula}}</td>                                        
                        <td class="rounded border px-4 py-2">{{$persona->nombres}}</td>
                        <td class="rounded border px-4 py-2">{{$persona->apellidos}}</td> 
                        <td class="rounded border px-4 py-2">
                            @if ($persona->fnacimiento)
                                {{ \Carbon\Carbon::parse($persona->fnacimiento)->diffForHumans()}} 
                            @else
                                <p>No registrado</p>
                            @endif                             
                        </td>
                        <td class="rounded border px-4 py-2">{{$persona->sexo}}</td>
                        <td class="rounded border px-4 py-2">
                            @if ($persona->status == 1)
                                <p>SI</p>
                            @else
                                <p>No</p>
                            @endif
                        </td> 
                        <td class="rounded border px-4 py-2">
                            @if ($persona->jefedefamilia == 1)
                                <p>SI</p>
                            @else
                                <p>No</p>
                            @endif
                        </td>
                        <td class="rounded border px-4 py-2">{{$persona->cne->inscrito}}</td>
                        <td class="rounded border px-4 py-2">{{$persona->ivss->pension}}</td>
                        <td class="rounded border px-4 py-2">{{$persona->ivss->ivss}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{$personas->links()}}
    </div>





















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
                <x-jet-label for="nrotelefono" value="{{ __('Numero de Teléfono ') }}" />
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
</div>
