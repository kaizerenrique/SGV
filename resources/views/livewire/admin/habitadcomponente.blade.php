<div class="p-2 bg-white border-b border-gray-200">
    <div class="mt-4 text-2xl">
        <div class="mt-4 text-2xl flex justify-between">
            <div class="mt-4 mb-4 text-2xl flex justify-between">
                Registrar Habitad
            </div>
            <div class="mr-2">                
                <x-jet-button class="bg-indigo-500 hover:bg-indigo-700" wire:click="agregarhabitad" >
                    {{ __('Registrar Nuevo') }}
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
                        <div class="flex items-center">Consejo Comunal</div>
                    </th>   
                    <th class="px-4 py-2">
                        <div class="flex items-center">Avenida/Calle/Vereda</div>
                    </th>                  
                    <th class="px-4 py-2">
                        <div class="flex items-center">Codito</div>
                    </th> 
                    <th class="px-4 py-2">
                        <div class="flex items-center">Descripción</div>
                    </th>                  
                    <th class="px-4 py-2">
                        <div class="flex items-center">Acción</div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($habitaciones as $habitacion)
                    <tr>
                        <td class="rounded border px-4 py-2">{{$habitacion->consejocomunal->name}}</td> 
                        <td class="rounded border px-4 py-2">{{$habitacion->direccion->direccion}}</td> 
                        <td class="rounded border px-4 py-2">{{$habitacion->codigo}}</td>  
                        <td class="rounded border px-4 py-2">
                            @if (!empty($habitacion->literal))
                                {{$habitacion->habitad}} - {{$habitacion->literal}}
                            @else
                                {{$habitacion->habitad}}
                            @endif
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{$habitaciones->links()}}
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

    <!-- Inicio del Modal de registro de habitad -->
    <x-jet-dialog-modal wire:model="modalhabitad">
        <x-slot name="title">
            {{ __('Registro') }}
        </x-slot>
        <x-slot name="content">             
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 text-sm text-gray-600"> 
                <div class="col-span-2 sm:col-span-4">
                    <x-jet-label for="comunal" value="{{ __('Consejo Comunal') }}" />
                    <select wire:model="comunal" id="comunal" name="comunal" class="mt-1 block w-full">
                        <option value="" selected>Seleccione el Consejo Comunal</option>
                        @foreach ($comunales as $comunal)                            
                            <option value="{{ $comunal->id }}">{{ $comunal->name }}</option>                            
                        @endforeach                        
                    </select>
                </div>
                <div class="col-span-2 sm:col-span-2">
                    <x-jet-label for="direccion" value="{{ __('Dirección') }}" />
                    <select wire:model="direccion" class="mt-1 block w-full">
                        @if ($direcciones->count() == 0)
                            <option value="" selected>Seleccione la Direcciónado</option>
                        @endif                        
                        @foreach ($direcciones as $direccion)                            
                            <option value="{{ $direccion->id }}">{{ $direccion->direccion }}</option>                            
                        @endforeach                        
                    </select>
                </div>
                <div class="col-span-2 sm:col-span-2">
                    <x-jet-label for="tipo" value="{{ __('Tipo de Vivienda') }}" />
                        <select name="tipo" id="tipo" wire:model.defer="tipo" class="mt-1 block w-full"> 
                            <option value="" selected>Selecciona el tipo de Vivienda</option>                                                                         
                            <option value="Casa">Casa</option>
                            <option value="Apartamento">Apartamento</option>
                            <option value="Rancho">Rancho</option>
                            <option value="Habitación">Habitación</option>
                            <option value="Anexo">Anexo</option>
                        </select> 
                    <x-jet-input-error for="tipo" class="mt-2" />                   
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <x-jet-label for="habitad" value="{{ __('Vivienda') }}" />
                    <x-jet-input id="habitad" type="text" class="mt-1 block w-full" wire:model.defer="habitad" />
                    <x-jet-input-error for="habitad" class="mt-2" />
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <x-jet-label for="literal" value="{{ __('Literal') }}" />
                    <x-jet-input id="literal" type="text" class="mt-1 block w-full" wire:model.defer="literal" />
                    <x-jet-input-error for="literal" class="mt-2" />
                </div>
                <div class="col-span-2 sm:col-span-2">
                    <x-jet-label for="titularidad" value="{{ __('Forma de tenencia') }}" />
                        <select name="titularidad" id="titularidad" wire:model.defer="titularidad" class="mt-1 block w-full"> 
                            <option value="" selected>Selecciona la Forma de tenencia</option>                                                                         
                            <option value="Propia">Propia</option>
                            <option value="Alquilada">Alquilada</option>
                            <option value="Compartida">Compartida</option>
                            <option value="Invadida">Invadida</option>
                            <option value="Traspasada">Traspasada</option>
                            <option value="Prestada">Prestada</option>
                            <option value="Otro">Otro</option>
                        </select> 
                    <x-jet-input-error for="titularidad" class="mt-2" />                   
                </div>
                <div class="col-span-2 sm:col-span-4">
                    <x-jet-label for="observacion" value="{{ __('Observación') }}" />
                    <x-jet-input id="observacion" type="text" class="mt-1 block w-full" wire:model.defer="observacion" />
                    <x-jet-input-error for="observacion" class="mt-2" />
                </div>
                <div class="col-span-2 sm:col-span-2">
                    <x-jet-label for="latitud" value="{{ __('Latitud') }}" />
                    <x-jet-input id="latitud" type="text" class="mt-1 block w-full" wire:model.defer="latitud" />
                    <x-jet-input-error for="latitud" class="mt-2" />
                </div>
                <div class="col-span-2 sm:col-span-2">
                    <x-jet-label for="longitud" value="{{ __('Longitud') }}" />
                    <x-jet-input id="longitud" type="text" class="mt-1 block w-full" wire:model.defer="longitud" />
                    <x-jet-input-error for="longitud" class="mt-2" />
                </div>
            </div>
        </x-slot>            

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalhabitad', false)" wire:loading.attr="disabled">
                    {{ __('Cerrar') }}
            </x-jet-secondary-button>
            <x-jet-danger-button class="ml-3" wire:click="registrarhabitad()" wire:loading.attr="disabled">
                {{ __('Guardar') }}
            </x-jet-danger-button>            
        </x-slot>
    </x-jet-dialog-modal>
</div>
