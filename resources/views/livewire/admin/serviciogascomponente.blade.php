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
                                            <button type="button"
                                                class="focus:outline-none text-white text-base py-2.5 px-5 rounded-md bg-blue-400 hover:bg-blue-600 hover:shadow-lg flex items-center"
                                                wire:click="registrarbombonas">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="currentColor" class="w-6 h-6 mr-2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0112 21 8.25 8.25 0 016.038 7.048 8.287 8.287 0 009 9.6a8.983 8.983 0 013.361-6.867 8.21 8.21 0 003 2.48z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 18a3.75 3.75 0 00.495-7.467 5.99 5.99 0 00-1.925 3.546 5.974 5.974 0 01-2.133-1A3.75 3.75 0 0012 18z" />
                                                </svg>
                                                {{ __('Registrar Cilindro de Gas') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Seccion -->
                                <div class="px-4">
                                    <div class="text-2xl flex justify-between">
                                        <div class="mb-4 text-xl text-gray-600 flex justify-between leading-normal">
                                            <span>Servicio de Gas Domestico</span>
                                        </div>
                                    </div>
                                        <!-- seccion de tabla -->
                                    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">                                        
                                        <!-- Tabla -->
                                        <table class="min-w-max w-full table-auto mt-6">
                                            <thead>
                                                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                                    <th class="px-4 py-2">
                                                        <div class="flex items-center">Proveedor</div>
                                                    </th>
                                                    <th class="px-4 py-2">
                                                        <div class="flex items-center">Tipo</div>
                                                    </th>
                                                    <th class="px-4 py-2">
                                                        <div class="flex items-center">Estado</div>
                                                    </th>
                                                    <th class="px-4 py-2">
                                                        <div class="flex items-center">Cantidad</div>
                                                    </th>
                                                    <th class="px-4 py-2">
                                                        <div class="flex items-center">Acción</div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-gray-600 text-sm font-light">
                                                @foreach ($bombonas as $bombona)
                                                    <tr class="border-b border-gray-300 hover:bg-gray-200">
                                                        <td class="px-4 py-2">
                                                            <span>{{ $bombona->proveedor->nombre}}</span>
                                                        </td>
                                                        <td class="px-4 py-2">
                                                            <span> {{ $bombona->tipobombona }} </span>
                                                        </td>
                                                        <td class="px-4 py-2">
                                                            <span> {{ $bombona->estado }}</span>
                                                        </td>
                                                        <td class="px-4 py-2">
                                                            <span> {{ $bombona->cantidad }}</span>
                                                        </td>
                                                        <td class="px-4 py-2 text-center">
                                                            <div class="flex item-center">
                                                                <div class="w-4 mr-6 transform hover:text-purple-500 hover:scale-110">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                                        stroke="currentColor" class="w-6 h-6">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                                    </svg>
                                                                </div>
                                                                <div class="w-4 mr-6 transform hover:text-purple-500 hover:scale-110">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                                        stroke="currentColor" class="w-6 h-6">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                                    </svg>
                                                                </div>
                                                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
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
                                        {{ $bombonas->links() }}
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
    <!-- Inicio del Modal para agregar bombonas -->
        <x-jet-dialog-modal wire:model="modalRegistrarBombonas">
            <x-slot name="title">
                {{ __('Registro') }}
            </x-slot>
            <x-slot name="content">
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 text-sm text-gray-600">
                    
                    <div class="col-span-2 sm:col-span-2">
                        <x-jet-label for="proveedor" value="{{ __('Proveedor') }}" />
                        <select name="regbombona.proveedor" id="regbombona.proveedor" wire:model.defer="regbombona.proveedor" class="mt-1 block w-full border border-solid border-gray-300 rounded-lg text-gray-600 text-sm font-light">
                            <option value="" selected>Seleccionar Proveedor</option>
                            @foreach ($prestadordeservicios as $prestador)
                                <option value="{{ $prestador->id }}">{{ $prestador->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-span-2 sm:col-span-2">
                        <x-jet-label for="tipodebombona" value="{{ __('¿Tipo de Bombona?') }}" />
                        <select name="regbombona.tipobombona" id="regbombona.tipobombona" wire:model.defer="regbombona.tipobombona"
                            class="mt-1 block w-full border border-solid border-gray-300 rounded-lg text-gray-600 text-sm font-light">
                            <option value="" selected>Seleccione el tipo de Bombona</option>
                            <option value="10KG">10KG</option>
                            <option value="18KG">18KG</option>
                            <option value="43KG">43KG</option>
                        </select>
                        <x-jet-input-error for="regbombona.tipobombona" class="mt-2" />
                    </div>

                    <div class="col-span-2 sm:col-span-2">
                        <x-jet-label for="estadobombona" value="{{ __('¿Estado de la bombona?') }}" />
                        <select name="regbombona.estado" id="regbombona.estado" wire:model.defer="regbombona.estado"
                            class="mt-1 block w-full border border-solid border-gray-300 rounded-lg text-gray-600 text-sm font-light">
                            <option value="" selected>Seleccione el estado de la bombona</option>
                            <option value="Bueno">Bueno</option>
                            <option value="Dañado">Dañado</option>
                        </select>
                        <x-jet-input-error for="regbombona.estado" class="mt-2" />
                    </div>

                    <div class="col-span-2 sm:col-span-2">
                        <x-jet-label for="cantidad" value="{{ __('Cantidad') }}" />
                        <x-jet-input id="regbombona.cantidad" type="text" class="mt-1 block w-full border border-solid border-gray-300 rounded-lg text-gray-600 text-sm font-light" wire:model.defer="regbombona.cantidad"/>
                        <x-jet-input-error for="regbombona.cantidad" class="mt-2" />
                    </div>
                </div>
            </x-slot>
    
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalRegistrarBombonas', false)" wire:loading.attr="disabled">
                    {{ __('Cerrar') }}
                </x-jet-secondary-button>
                <x-jet-danger-button class="ml-3" wire:click="guardarbombona()" wire:loading.attr="disabled">
                    {{ __('Guardar') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
        <!-- Fin del Modal para agregar bombonas  -->  
</div>
  