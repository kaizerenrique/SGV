<div class="p-2">
    <div class="mt-4">
        <div class="mt-4 text-2xl flex justify-between">
            <div class="mt-4 mb-4 text-2xl flex justify-between leading-normal">
                <span>Registrar Familia</span>
            </div>
        </div>
    </div>

    <div class="px-4">
        <!-- seccion -->
        <div class="text-2xl flex justify-between">
            <div class="mb-4 text-xl text-gray-600 flex justify-between leading-normal">
                <span>Datos de Dirección</span>
            </div>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-6 xl:grid-cols-8 gap-4">
            <div class="col-span-2 sm:col-span-2 md:col-span-4 lg:col-span-6 xl:col-span-4">
                <x-jet-label for="consejocomunal" value="{{ __('Consejo consejocomunal') }}" />
                <select wire:model="consejocomunal" id="consejocomunal" name="consejocomunal" class="mt-1 block w-full border border-solid border-gray-300 rounded-lg text-gray-600 text-sm font-light">
                    <option value="" selected>Seleccione el Consejo consejocomunal</option>
                    @foreach ($consejocomunales as $consejocomunal)                            
                        <option value="{{ $consejocomunal->id }}">{{ $consejocomunal->name }}</option>                            
                    @endforeach                        
                </select>
                <x-jet-input-error for="consejocomunal" class="mt-2" />
            </div>
        
            <div class="col-span-2 sm:col-span-2 md:col-span-4 lg:col-span-6 xl:col-span-4">
                <x-jet-label for="clap" value="{{ __('Clap') }}" />
                <select wire:model="clap" class="mt-1 block w-full border border-solid border-gray-300 rounded-lg text-gray-600 text-sm font-light">
                    @if ($claps->count() == 0)
                        <option value="" selected>Seleccione el CLAP</option>
                    @endif                        
                    @foreach ($claps as $clap)                            
                        <option value="{{ $clap->id }}">{{ $clap->name }}</option>                            
                    @endforeach                        
                </select>
                <x-jet-input-error for="clap" class="mt-2" />
            </div>
        
            <div class="col-span-2 sm:col-span-2 md:col-span-2 lg:col-span-3 xl:col-span-4">
                <x-jet-label for="direccion" value="{{ __('Dirección') }}" />
                <select wire:model="direccion" class="mt-1 block w-full border border-solid border-gray-300 rounded-lg text-gray-600 text-sm font-light">
                    @if ($direcciones->count() == 0)
                        <option value="" selected>Seleccione la Direcciónado</option>
                    @endif                        
                    @foreach ($direcciones as $direccion)                            
                        <option value="{{ $direccion->id }}">{{ $direccion->direccion }}</option>                            
                    @endforeach                        
                </select>
                <x-jet-input-error for="direccion" class="mt-2" />
            </div>
        
            <div class="col-span-2 sm:col-span-2 md:col-span-2 lg:col-span-3 xl:col-span-4">
                <x-jet-label for="habitad" value="{{ __('Casa / Apartamento / Habitación ') }}" />
                <select wire:model="habitad" class="mt-1 block w-full border border-solid border-gray-300 rounded-lg text-gray-600 text-sm font-light">
                    @if ($habitads->count() == 0)
                        <option value="" selected>Seleccione la Casa / Apartamento / Habitación </option>
                    @endif                        
                    @foreach ($habitads as $habitad)                            
                        <option value="{{ $habitad->id }}">{{ $habitad->habitad}} -{{ $habitad->literal}}</option>                            
                    @endforeach                        
                </select>
                <x-jet-input-error for="habitad" class="mt-2" />
            </div>

            <div class="col-span-2 sm:col-span-2 md:col-span-2">
                <x-jet-label for="tenencia" value="{{ __('Forma de Tenencia') }}" />
                <select name="tipodetenencia" id="tipodetenencia" wire:model.defer="tipodetenencia" class="mt-1 block w-full border border-solid border-gray-300 rounded-lg text-gray-600 text-sm font-light"> 
                    <option value="" selected>Forma de Tenencia</option>                                                                         
                    <option value="Propia">Propia</option>
                    <option value="Alquilada">Alquilada</option>
                    <option value="Compartida">Compartida</option>
                    <option value="Invadida">Invadida</option>
                    <option value="Traspasada">Traspasada</option>
                    <option value="Prestada">Prestada</option>
                    <option value="Otro">Otro</option>
                </select> 
                <x-jet-input-error for="tipodetenencia" class="mt-2" />                   
            </div>

            <div class="col-span-2 sm:col-span-2">
                <x-jet-label for="gas_directo" value="{{ __('¿Tiene servicio de gas directo?') }}" />
                <select name="gas_directo" id="gas_directo" wire:model.defer="gas_directo"
                    class="mt-1 block w-full border border-solid border-gray-300 rounded-lg text-gray-600 text-sm font-light">
                    <option value="" selected>Seleccione</option>
                    <option value="1">Si</option>
                    <option value="0">No</option>
                </select>
                <x-jet-input-error for="gas_directo" class="mt-2" />
            </div>
            <div class="col-span-2 sm:col-span-2">
                <x-jet-label for="bombonas_gas" value="{{ __('¿Posee Bombonas de Gas?') }}" />
                <select name="bombonas_gas" id="bombonas_gas" wire:model.defer="bombonas_gas"
                    class="mt-1 block w-full border border-solid border-gray-300 rounded-lg text-gray-600 text-sm font-light">
                    <option value="" selected>Seleccione</option>
                    <option value="1">Si</option>
                    <option value="0">No</option>
                </select>
                <x-jet-input-error for="bombonas_gas" class="mt-2" />
            </div>

            <div class="col-span-2 sm:col-span-2">
                <x-jet-label for="cantv" value="{{ __('¿Tiene servicio de Cantv?') }}" />
                <select name="cantv" id="cantv" wire:model.defer="cantv"
                    class="mt-1 block w-full border border-solid border-gray-300 rounded-lg text-gray-600 text-sm font-light">
                    <option value="" selected>Seleccione</option>
                    <option value="1">Si</option>
                    <option value="0">No</option>
                </select>
                <x-jet-input-error for="cantv" class="mt-2" />
            </div>

            <div class="col-span-2 sm:col-span-1">
                <x-jet-label for="name" value="{{ __('Código') }}" />
                <x-jet-input id="codigo" type="text" class="mt-1 block w-full border border-solid border-gray-300 rounded-lg text-gray-600 text-sm font-light" wire:model.defer="codigo" disabled/>
                <x-jet-input-error for="codigo" class="mt-2" />
            </div>

            <div class="col-span-2 sm:col-span-2 pt-6">
                <button type="button" class="focus:outline-none text-white text-base py-1.5 px-3 rounded-md bg-blue-400 hover:bg-blue-600 hover:shadow-lg flex items-center"
                    wire:click="registrar" wire:loading.attr="disabled">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                    </svg>
                    {{ __('Generar Código') }}
                </button>
            </div>
        </div>        
    </div>

    <div class="px-4">
        @if (!empty($integrantes))
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">            
                <!-- Tabla -->
                <table class="min-w-max w-full table-auto mt-6">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="px-4 py-2">
                                <div class="flex items-center">Cedula</div>
                            </th>
                            <th class="px-4 py-2">
                                <div class="flex items-center">Nombre y Apellido</div>
                            </th>
                            <th class="px-4 py-2">
                                <div class="flex items-center">Edad</div>
                            </th>
                            <th class="px-4 py-2">
                                <div class="flex items-center">J. Familia</div>
                            </th>
                            <th class="px-4 py-2">
                                <div class="flex items-center">Acción</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach ($integrantes as $integrante)
                            <tr class="border-b border-gray-300 hover:bg-gray-200">
                                <td class="px-4 py-2">
                                    <span>{{ $integrante->nacionalidad }}-{{ $integrante->cedula }}</span>
                                </td>
                                <td class="px-4 py-2">                                    
                                    {{ $integrante->nombres }} {{ $integrante->apellidos }}                                    
                                </td>
                                <td class="px-4 py-2">
                                    @if ($integrante->fnacimiento)
                                        {{ \Carbon\Carbon::parse($integrante->fnacimiento)->age }}
                                    @else
                                        <p>No registrado</p>
                                    @endif
                                </td>
                                <td class="px-4 py-2 text-center">
                                    <div class="flex item-center">
                                        @if ($integrante->jefedefamilia == 1)
                                            <span class="bg-green-200 text-green-700 py-1 px-3 rounded-full text-xs">Si</span>
                                        @else
                                            <span class="bg-red-200 text-red-700 py-1 px-3 rounded-full text-xs">No</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-4 py-2 text-center">
                                    <div class="flex item-center"> 
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110" wire:click="eliminarintegrante({{ $integrante->id }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        @endif 
    </div>
    
    <!-- Inicio del Modal para mensajes y alertas  -->
    <x-jet-dialog-modal wire:model="modalPersona">
        <x-slot name="title">
            {{ 'titulo' }}
        </x-slot>

        <x-slot name="content">
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <!-- Busqueda -->
                <div class="flex justify-between">
                    <div>
                        <input wire:model="buscar" type="search" placeholder="Buscar"
                            class="shadow appearence-none border border-solid border-gray-300 rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline placeholder-indigo-500"
                            name="">
                    </div>
                </div>
                <!-- Tabla -->
                <table class="min-w-max w-full table-auto mt-6">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="px-4 py-2">
                                <div class="flex items-center">Cedula</div>
                            </th>
                            <th class="px-4 py-2">
                                <div class="flex items-center">Nombre y Apellido</div>
                            </th>
                            <th class="px-4 py-2">
                                <div class="flex items-center">Edad</div>
                            </th>
                            <th class="px-4 py-2">
                                <div class="flex items-center">J. Familia</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach ($personas as $persona)
                            <tr class="border-b border-gray-300 hover:bg-gray-200" type="button" wire:click="agregarpersona({{$persona->id}})">
                                <td class="px-4 py-2">
                                    <span>{{ $persona->nacionalidad }}-{{ $persona->cedula }}</span>
                                </td>
                                <td class="px-4 py-2">                                    
                                    {{ $persona->nombres }} {{ $persona->apellidos }}                                    
                                </td>
                                <td class="px-4 py-2">
                                    @if ($persona->fnacimiento)
                                        {{ \Carbon\Carbon::parse($persona->fnacimiento)->age }}
                                    @else
                                        <p>No registrado</p>
                                    @endif
                                </td>
                                <td class="px-4 py-2 text-center">
                                    <div class="flex item-center">
                                        @if ($persona->jefedefamilia == 1)
                                            <span class="bg-green-200 text-green-700 py-1 px-3 rounded-full text-xs">Si</span>
                                        @else
                                            <span class="bg-red-200 text-red-700 py-1 px-3 rounded-full text-xs">No</span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $personas->links() }}
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalPersona', false)" wire:loading.attr="disabled">
                {{ __('Aceptar') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>

    <div class="mt-4 px-4"> 
        <div class="grid grid-cols-2 sm:grid-cols-2">
            <div class="col-span-2 sm:col-span-2">
                <x-jet-secondary-button wire:click="listadepersonas" wire:loading.attr="disabled">
                    {{ __('Agregar Personas') }}
                </x-jet-secondary-button>
            </div>
                <div class="col-span-2 sm:col-span-2">
                    <button type="button" class="focus:outline-none text-white text-base py-1.5 px-2 rounded-md bg-blue-400 hover:bg-blue-600 hover:shadow-lg flex items-center"
                    wire:click="statusfamilia" wire:loading.attr="disabled">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                    </svg>
                    {{ __('Seguir') }}
                </button>
            </div>
        </div>
        
    </div>    
</div>

  