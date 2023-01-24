<div class="py-12">
    <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8">
        <div class=" ">
            <div class="grid grid-cols-8">
                <!-- Menu Lateral -->
                <div
                    class="col-span-1 sm:col-span-2 md:col-span-2 lg:col-span-2 xl:col-span-2 2xl:col-span-1 mr-4 sm:mr-6 lg:mr-8 ">
                    <div class="overflow-hidden shadow-xl sm:rounded-lg">
                        <livewire:menu.menulateral />
                    </div>
                </div>
                <!-- /Menu Lateral -->
                <div
                    class="col-span-7 sm:col-span-6 md:col-span-6 lg:col-span-6 xl:col-span-6 2xl:col-span-7 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6">
                        <div class="p-2">
                            <!-- Seccion Nombre -->
                            <div class="mt-4">
                                <div class="mt-4 text-2xl flex justify-between">
                                    <div class="mt-4 mb-4 text-xl flex justify-between leading-normal">
                                        <span>{{ $persona->nombres }} {{ $persona->apellidos }}</span>                                         
                                    </div>
                                </div>
                            </div>
                            <!-- Seccion -->
                            <div class="px-4">
                                <div class="text-2xl flex justify-between">
                                    <div class="mb-4 text-xl text-gray-600 flex justify-between leading-normal">
                                        <span>Datos del Carnet de la Patria</span>
                                    </div>
                                </div>

                                <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-6 xl:grid-cols-8 gap-4">
                                    <div class="col-span-2 sm:col-span-2">
                                        <x-jet-label for="codigo" value="{{ __('Código del Carnet de la Patria') }}" />
                                        <x-jet-input id="codigo" type="text" class="mt-1 block w-full border border-solid border-gray-300 rounded-lg text-gray-600 text-sm font-light" wire:model.defer="codigo" />
                                        <x-jet-input-error for="codigo" class="mt-2" />
                                    </div>
                                    <div class="col-span-2 sm:col-span-2">
                                        <x-jet-label for="serial" value="{{ __('Serial del Carnet de la Patria ') }}" />
                                        <x-jet-input id="serial" type="text" class="mt-1 block w-full border border-solid border-gray-300 rounded-lg text-gray-600 text-sm font-light" wire:model.defer="serial" />
                                        <x-jet-input-error for="serial" class="mt-2" />
                                    </div>

                                    <div class="col-span-2 sm:col-span-2">
                                        <x-jet-label for="hogares" value="{{ __('Recibe el beneficio de Hogares de la Patria') }}" />
                                        <select name="hogarespatria" id="hogarespatria" wire:model="hogarespatria" class="mt-1 block w-full border border-solid border-gray-300 rounded-lg text-gray-600 text-sm font-light"> 
                                            <option value="" selected>Recibe el beneficio</option>                                                                         
                                            <option value="1">Si</option>
                                            <option value="0">No</option>
                                        </select> 
                                        <x-jet-input-error for="hogarespatria" class="mt-2" />                   
                                    </div>

                                    @if (!empty($estado))
                                        <div class="col-span-2 sm:col-span-2">
                                            <x-jet-label for="integrantes" value="{{ __('Cantidad de Integrantes') }}" />
                                            <x-jet-input id="integrantes" type="text" class="mt-1 block w-full border border-solid border-gray-300 rounded-lg text-gray-600 text-sm font-light" wire:model.defer="integrantes" />
                                            <x-jet-input-error for="integrantes" class="mt-2" />
                                        </div>
                                    @endif                            
                                </div>                                 
                            </div>
                            <div class="mt-2 px-4">
                                <div class="text-2xl flex justify-between">
                                    <div class="mb-4 text-lg text-gray-600 flex justify-between leading-normal">
                                        <span>Posee alguno de estos beneficios:</span>
                                    </div>
                                </div>
                                
                                <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-6 xl:grid-cols-8 gap-4">
                                    @if ($persona->sexo == 'Femenino')
                                        <div class="col-span-2 sm:col-span-2">
                                            <x-jet-label for="partohumanizado" value="{{ __('Parto Humanizado') }}" />
                                            <x-jet-input id="partohumanizado" type="checkbox" class="mt-1 mr-2 border border-solid border-gray-300" wire:model.defer="partohumanizado" />                                    
                                        </div> 
        
                                        <div class="col-span-2 sm:col-span-2">
                                            <x-jet-label for="lactanciamaterna" value="{{ __('Lactancia Materna') }}" />
                                            <x-jet-input id="lactanciamaterna" type="checkbox" class="mt-1 mr-2" wire:model.defer="lactanciamaterna" />                                    
                                        </div>                                     
                                    @endif                                    

                                    <div class="col-span-2 sm:col-span-2">
                                        <x-jet-label for="mjgh" value="{{ __('Mision Jose Gregorio Hernandez:') }}" />
                                        <x-jet-input id="mjgh" type="checkbox" class="mt-1 mr-2" wire:model.defer="mjgh" />                                    
                                    </div> 
    
                                    <div class="col-span-2 sm:col-span-2">
                                        <x-jet-label for="amormayor" value="{{ __('Amor Mayor') }}" />
                                        <x-jet-input id="amormayor" type="checkbox" class="mt-1 mr-2" wire:model.defer="amormayor" />                                    
                                    </div> 
                                </div>

                            </div>
                            <div class="mt-4 px-4">
                                <div class="text-2xl flex justify-between">
                                    <div class="mb-4 text-xl text-gray-600 flex justify-between leading-normal">
                                        <span>Instruccion Profesión y Oficio</span>
                                    </div>
                                </div>

                                <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-6 xl:grid-cols-8 gap-4">
                                    <div class="col-span-2 sm:col-span-2">
                                        <x-jet-label for="gradodeintruccion" value="{{ __('Grado de Instrucción') }}" />
                                        <select name="gradodeintruccion" id="gradodeintruccion" wire:model.defer="gradodeintruccion" class="mt-1 block w-full border border-solid border-gray-300 rounded-lg text-gray-600 text-sm font-light"> 
                                            <option value="" selected>Indique el grado de Instrucción</option>                                                                         
                                            <option value="Sin Instrucción">Sin Instrucción</option>
                                            <option value="Basica">Basica</option>
                                            <option value="Bachillerato">Bachillerato</option>
                                            <option value="Tecnico Medio">Tecnico Medio</option>
                                            <option value="Tecnico Superior">Tecnico Superior</option>
                                            <option value="Universitario">Universitario</option>
                                            <option value="Post Grado  ">Post Grado  </option>
                                        </select> 
                                        <x-jet-input-error for="gradodeintruccion" class="mt-2" />                   
                                    </div>
    
                                    <div class="col-span-2 sm:col-span-2">
                                        <x-jet-label for="estudia" value="{{ __('¿Estudia actualmente?') }}" />
                                        <select name="estudia" id="estudia" wire:model.defer="estudia" class="mt-1 block w-full border border-solid border-gray-300 rounded-lg text-gray-600 text-sm font-light"> 
                                            <option value="" selected>Estudia</option>                                                                         
                                            <option value="1">Si</option>
                                            <option value="0">No</option>
                                        </select> 
                                        <x-jet-input-error for="estudia" class="mt-2" />                   
                                    </div>
                                    
                                    <div class="col-span-2 sm:col-span-2">
                                        <x-jet-label for="trabaja" value="{{ __('¿trabaja actualmente?') }}" />
                                        <select name="trabaja" id="trabaja" wire:model="trabaja" class="mt-1 block w-full border border-solid border-gray-300 rounded-lg text-gray-600 text-sm font-light"> 
                                            <option value="" selected>trabaja</option>                                                                         
                                            <option value="1">Si</option>
                                            <option value="0">No</option>
                                        </select> 
                                        <x-jet-input-error for="trabaja" class="mt-2" />                   
                                    </div>

                                    @if (!@empty($estadotrabaja))
                                        <div class="col-span-2 sm:col-span-2">
                                            <x-jet-label for="condicionlaboral" value="{{ __('Trabaja') }}" />
                                            <select name="condicionlaboral" id="condicionlaboral" wire:model.defer="condicionlaboral" class="mt-1 block w-full border border-solid border-gray-300 rounded-lg text-gray-600 text-sm font-light"> 
                                                <option value="" selected>Seleccione el tipo de Trabajo</option>                                                                         
                                                <option value="Institución Pública">Institución Pública</option>
                                                <option value="Privada">Privada</option>
                                                <option value="Comercial">Comercial</option>
                                                <option value="Por Cuenta Propia">Por Cuenta Propia</option>
                                                <option value="Economía Informal">Economía Informal</option>
                                                <option value="Otros">Otros</option>
                                            </select> 
                                            <x-jet-input-error for="condicionlaboral" class="mt-2" />                   
                                        </div> 
                                    @endif
                                </div>                                
                            </div>

                            <div class="mt-4 px-4">
                                <div class="text-2xl flex justify-between">
                                    <div class="mb-4 text-xl text-gray-600 flex justify-between leading-normal">
                                        <span>Información de Salud</span>
                                    </div>
                                </div>

                                <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-6 xl:grid-cols-8 gap-4">
                                    @if ($persona->sexo == 'Femenino')
                                        <div class="col-span-2 sm:col-span-2">
                                            <x-jet-label for="gestacion" value="{{ __('Estado de Gestación') }}" />
                                            <x-jet-input id="gestacion" type="checkbox" class="mt-1 mr-2" wire:model.defer="gestacion" />                                    
                                        </div> 
        
                                        <div class="col-span-2 sm:col-span-2">
                                            <x-jet-label for="esterilizacion" value="{{ __('Requieren de Esterilización') }}" />
                                            <x-jet-input id="esterilizacion" type="checkbox" class="mt-1 mr-2" wire:model.defer="esterilizacion" />                                    
                                        </div>                                     
                                    @endif  
                                    <div class="col-span-2 sm:col-span-2">
                                        <x-jet-label for="discapacidad" value="{{ __('Presenta alguna discapacidad') }}" />
                                        <x-jet-input id="discapacidad" type="checkbox" class="mt-1 mr-2" wire:model="discapacidad" />                                    
                                    </div>  
                                    @if ($estado_discapacidad == true)
                                        <div class="col-span-2 sm:col-span-2">
                                            <x-jet-label for="carnetdiscapacidad" value="{{ __('Posee el carnet de discapacidad') }}" />
                                            <x-jet-input id="carnetdiscapacidad" type="checkbox" class="mt-1 mr-2" wire:model="carnetdiscapacidad" />                                    
                                        </div>

                                        @if ($estado_carnetdiscapacidad == true)
                                            <div class="col-span-2 sm:col-span-2">
                                                <x-jet-label for="codigocarnetdiscapacidad" value="{{ __('Código del Carnet de discapacidad') }}" />
                                                <x-jet-input id="codigocarnetdiscapacidad" type="text" class="mt-1 block w-full border border-solid border-gray-300 rounded-lg text-gray-600 text-sm font-light" wire:model.defer="codigocarnetdiscapacidad" />
                                                <x-jet-input-error for="codigocarnetdiscapacidad" class="mt-2" />
                                            </div>
                                        @endif
                                    @endif

                                    <div class="col-span-2 sm:col-span-2">
                                        <x-jet-label for="enfermedadcronica" value="{{ __('Presenta alguna enfermedad crónica') }}" />
                                        <x-jet-input id="enfermedadcronica" type="checkbox" class="mt-1 mr-2" wire:model="enfermedadcronica" />                                    
                                    </div>  

                                    @if ($estado_enfermedadcronica == true)
                                        <div class="col-span-2 sm:col-span-2">
                                            <x-jet-label for="atencionmedica" value="{{ __('Está reciben atención médica ') }}" />
                                            <x-jet-input id="atencionmedica" type="checkbox" class="mt-1 mr-2" wire:model.defer="atencionmedica" />                                    
                                        </div>                                        
                                    @endif

                                    <div class="col-span-2 sm:col-span-2">
                                        <x-jet-label for="quirurgica" value="{{ __('Requieren Intervención Quirúrgica') }}" />
                                        <x-jet-input id="quirurgica" type="checkbox" class="mt-1 mr-2" wire:model="quirurgica" />                                    
                                    </div> 

                                    @if ($estado_quirurgica == true)
                                        <div class="col-span-2 sm:col-span-2">
                                            <x-jet-label for="tipoquirurgica" value="{{ __('De que tipo') }}" />
                                            <x-jet-input id="tipoquirurgica" type="text" class="mt-1 block w-full border border-solid border-gray-300 rounded-lg text-gray-600 text-sm font-light" wire:model.defer="tipoquirurgica" />
                                            <x-jet-input-error for="tipoquirurgica" class="mt-2" />
                                        </div>
                                    @endif


                                </div>                                
                            </div>
                            <div class="px-4 col-span-2 sm:col-span-2 pt-4">
                                <button type="button" class="focus:outline-none text-white text-base py-2.5 px-5 rounded-md bg-blue-400 hover:bg-blue-600 hover:shadow-lg flex items-center"
                                    wire:click="guardardatos" wire:loading.attr="disabled">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="w-6 h-6 mr-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                                    </svg>
                                    {{ __('Guardar') }}
                                </button>
                            </div> 

                        </div>
                    </div>
                </div>
            </div>
        </div>
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
            <x-jet-secondary-button wire:click="retornar()" wire:loading.attr="disabled">
                {{ __('Aceptar') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
    <!-- Inicio del Modal para comprobar cedula -->

</div>