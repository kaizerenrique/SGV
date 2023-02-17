<div class="py-12">
    <div class="py-12">
        <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8">
            <div class=" ">
                <div class="grid grid-cols-8">
                    <!-- Menu Lateral -->
                    <div class="col-span-1 sm:col-span-2 md:col-span-2 lg:col-span-2 xl:col-span-2 2xl:col-span-1 mr-4 sm:mr-6 lg:mr-8 ">
                        <div class="overflow-hidden shadow-xl sm:rounded-lg">
                            <livewire:menu.menulateral />
                        </div>                        
                    </div>
                    <!-- /Menu Lateral -->
                    <div class="col-span-7 sm:col-span-6 md:col-span-6 lg:col-span-6 xl:col-span-6 2xl:col-span-7 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <div class="p-6">
                            <div class="p-2">
                                <!-- Seccion codigo de familia-->
                                <div class="mt-4">
                                    <div class="mt-4 text-2xl flex justify-between">
                                        <div class="mt-4 mb-4 text-2xl flex justify-between leading-normal">
                                            <span>{{ $codigo }}</span>  
                                        </div>
                                        <div class="mr-2">
                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="px-4 mt-4">
                                    <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-6 xl:grid-cols-8 gap-4">
                                        <div class="col-span-2 sm:col-span-1">
                                            <x-jet-label for="name" value="{{ __('Código de Área') }}" />
                                            <x-jet-input id="codigodearea" type="text" class="mt-1 block w-full border border-solid border-gray-300 rounded-lg text-gray-600 text-sm font-light" 
                                            wire:model.defer="codigodearea" />
                                            <x-jet-input-error for="codigodearea" class="mt-2" />
                                        </div>

                                        <div class="col-span-2 sm:col-span-2">
                                            <x-jet-label for="name" value="{{ __('Número de Teléfono') }}" />
                                            <x-jet-input id="nrotelefono" type="text" class="mt-1 block w-full border border-solid border-gray-300 rounded-lg text-gray-600 text-sm font-light" 
                                            wire:model.defer="nrotelefono" />
                                            <x-jet-input-error for="nrotelefono" class="mt-2" />
                                        </div>

                                        <div class="col-span-2 sm:col-span-2">
                                            <x-jet-label for="estado" value="{{ __('¿Tiene servicio de Cantv?') }}" />
                                            <select name="estado" id="estado" wire:model.defer="estado"
                                                class="mt-1 block w-full border border-solid border-gray-300 rounded-lg text-gray-600 text-sm font-light">
                                                <option value="" selected>Seleccione</option>
                                                <option value="1">Si</option>
                                                <option value="0">No</option>
                                            </select>
                                            <x-jet-input-error for="estado" class="mt-2" />
                                        </div>

                                        <div class="col-span-2 sm:col-span-2 mr-2 mt-6">
                                            <button type="button"
                                                class="focus:outline-none text-white text-base py-1.5 px-4 rounded-md bg-blue-400 hover:bg-blue-600 hover:shadow-lg flex items-center"
                                                wire:click="registrartelefono()">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="currentColor" class="w-6 h-6 mr-2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                                </svg>
                                                {{ __('Registrar Teléfono Cantv') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Seccion -->
                                <div class="px-4 mt-4">
                                    <div class="text-2xl flex justify-between">
                                        <div class="mb-4 text-xl text-gray-600 flex justify-between leading-normal">
                                            <span>Servicio Teléfono</span>
                                        </div>
                                    </div>
                                        <!-- seccion de tabla -->
                                    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">                                        
                                        <!-- Tabla -->
                                        <table class="min-w-max w-full table-auto mt-6">
                                            <thead>
                                                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                                    <th class="px-4 py-2">
                                                        <div class="flex items-center">Código de Área</div>
                                                    </th>
                                                    <th class="px-4 py-2">
                                                        <div class="flex items-center">Número de Teléfono </div>
                                                    </th>
                                                    <th class="px-4 py-2">
                                                        <div class="flex items-center">Estado</div>
                                                    </th>
                                                    <th class="px-4 py-2">
                                                        <div class="flex items-center">Acción</div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-gray-600 text-sm font-light">
                                                @foreach ($telefonos as $telefono )
                                                <tr class="border-b border-gray-300 hover:bg-gray-200">                                                    
                                                    <td class="px-4 py-2">
                                                        <span> {{ $telefono->codigo_operador }} </span>
                                                    </td>
                                                    <td class="px-4 py-2">
                                                        <span> {{ $telefono->nrotelefono  }}</span>
                                                    </td>
                                                    <td class="px-4 py-2">
                                                        @if ($telefono->estado == 1)
                                                            <span class="bg-green-200 text-green-700 py-1 px-3 rounded-full text-xs">Operativo</span>
                                                        @else
                                                            <span class="bg-red-200 text-red-700 py-1 px-3 rounded-full text-xs">Dañado</span>
                                                        @endif                                                        
                                                    </td>
                                                    <td class="px-4 py-2 text-center">
                                                        <div class="flex item-center">                                                            
                                                            <div class="w-4 mr-6 transform hover:text-purple-500 hover:scale-110">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                                    stroke="currentColor" class="w-6 h-6">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                                </svg>
                                                            </div>
                                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110" wire:click="eliminartelefono({{ $telefono->id }})">
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
                                    <div class="mt-4">
                                        {{ $telefonos->links() }}
                                    </div>

                                </div>
                                <div class="px-4 col-span-2 sm:col-span-2 pt-4">
                                    <button type="button" class="focus:outline-none text-white text-base py-2.5 px-5 rounded-md bg-blue-400 hover:bg-blue-600 hover:shadow-lg flex items-center"
                                        wire:click="seguir()" wire:loading.attr="disabled">
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
                </div>
            </div>
        </div>
    </div>  

</div>
