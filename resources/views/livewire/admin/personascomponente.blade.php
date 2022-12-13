<div>
    <div class="mt-4 text-2xl">
        <div class="mt-4 text-2xl flex justify-between">
            <div>
                Registrar perfiles
            </div>
            <div class="mr-2">                
                <x-jet-button class="bg-indigo-500 hover:bg-indigo-700" wire:click="agregarpersona" >
                    {{ __('Registrar Persona') }}
                </x-jet-button>
            </div>
        </div>        
    </div>
<!-- Inicio del Modal para Editar datos de usuario -->
<x-jet-dialog-modal wire:model="modalCedula">
    <x-slot name="title">
        {{ __('Registro') }}
    </x-slot>
    <x-slot name="content">             
        <div class="grid grid-cols-4 gap-4 text-sm text-gray-600">                
            <div class="col-span-2 sm:col-span-1">
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
            <div class="col-span-4 sm:col-span-2">
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
<!-- Fin del Modal para Editar datos de usuario -->
</div>
