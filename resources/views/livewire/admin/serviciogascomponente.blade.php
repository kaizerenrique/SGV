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
                                        <div class="mt-4 mb-4 text-xl flex justify-between leading-normal">
                                            <span>{{ $familia->codigo }}</span>                                         
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
                                    <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-6 xl:grid-cols-8 gap-4">
                                        <div class="col-span-2 sm:col-span-2">
                                            <x-jet-label for="gas_directo" value="{{ __('¿Tiene servicio de gas directo?') }}" />
                                            <select name="gas_directo" id="gas_directo" wire:model.defer="gas_directo" class="mt-1 block w-full border border-solid border-gray-300 rounded-lg text-gray-600 text-sm font-light"> 
                                                <option value="" selected>Seleccione</option>                                                                         
                                                <option value="1">Si</option>
                                                <option value="0">No</option>
                                            </select> 
                                            <x-jet-input-error for="gas_directo" class="mt-2" />                   
                                        </div>
                                        <div class="col-span-2 sm:col-span-2">
                                            <x-jet-label for="bombonas_gas" value="{{ __('¿Posee Bombonas de Gas?') }}" />
                                            <select name="bombonas_gas" id="bombonas_gas" wire:model.defer="bombonas_gas" class="mt-1 block w-full border border-solid border-gray-300 rounded-lg text-gray-600 text-sm font-light"> 
                                                <option value="" selected>Seleccione</option>                                                                         
                                                <option value="1">Si</option>
                                                <option value="0">No</option>
                                            </select> 
                                            <x-jet-input-error for="bombonas_gas" class="mt-2" />                   
                                        </div>
                                        <div class="col-span-2 sm:col-span-2">
                                            @if ($estado == false)
                                                <x-jet-label for="bombonas_gas" value="{{ __('Guardar Servicio') }}" />
                                                <button type="button" class="focus:outline-none text-white text-base py-2.5 px-5 rounded-md bg-blue-400 hover:bg-blue-600 hover:shadow-lg flex items-center"
                                                    wire:click="serviciodegas" wire:loading.attr="disabled">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                        stroke="currentColor" class="w-6 h-6 mr-2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0112 21 8.25 8.25 0 016.038 7.048 8.287 8.287 0 009 9.6a8.983 8.983 0 013.361-6.867 8.21 8.21 0 003 2.48z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 18a3.75 3.75 0 00.495-7.467 5.99 5.99 0 00-1.925 3.546 5.974 5.974 0 01-2.133-1A3.75 3.75 0 0012 18z" />
                                                    </svg>
                                                    {{ __('Guardar') }}
                                                </button>                                                
                                            @else  
                                                
                                            @endif                                                     
                                        </div>
                                        
                                    </div>

                                </div>
                                <div class="px-4 col-span-2 sm:col-span-2 pt-4">
                                    <button type="button" class="focus:outline-none text-white text-base py-2.5 px-5 rounded-md bg-blue-400 hover:bg-blue-600 hover:shadow-lg flex items-center"
                                        wire:click="guardardatos" wire:loading.attr="disabled">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor" class="w-6 h-6 mr-2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
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
  


  