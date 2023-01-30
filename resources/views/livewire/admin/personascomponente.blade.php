<div class="p-2">
    <div class="mt-4">
        <div class="mt-4 text-2xl flex justify-between">
            <div class="mt-4 mb-4 text-2xl flex justify-between leading-normal">
                <span>Personas Registradas</span> 
                <div class="text-center">
                    <span class="mx-6 bg-yellow-200 text-yellow-700 py-1 px-3 rounded-full text-base">{{$personasnumero}}</span>
                </div>
            </div>
            <div class="mr-2">
                <button type="button"
                    class="focus:outline-none text-white text-base py-2.5 px-5 rounded-md bg-blue-400 hover:bg-blue-600 hover:shadow-lg flex items-center"
                    wire:click="agregarpersona">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                    </svg>
                    {{ __('Registrar Persona') }}
                </button>
            </div>
        </div>
    </div>

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
                        <div class="flex items-center">Sexo</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Activo</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">J. Familia</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">User</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Acción</div>
                    </th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach ($personas as $persona)
                    <tr class="border-b border-gray-300 hover:bg-gray-200">
                        <td class="px-4 py-2">
                            <span>{{ $persona->nacionalidad }}-{{ $persona->cedula }}</span>
                        </td>
                        <td class="px-4 py-2">
                            <a href="#">
                                {{ $persona->nombres }} {{ $persona->apellidos }}
                            </a>
                        </td>
                        <td class="px-4 py-2">
                            @if ($persona->fnacimiento)
                                {{ \Carbon\Carbon::parse($persona->fnacimiento)->age }}
                            @else
                                <p>No registrado</p>
                            @endif
                        </td>
                        <td class="px-4 py-2">{{ $persona->sexo }}</td>
                        <td class="px-4 py-2 text-center">
                            <div class="flex item-center">
                                @if ($persona->status == 1)
                                    <span
                                        class="bg-green-200 text-green-700 py-1 px-3 rounded-full text-xs">Activo</span>
                                @else
                                    <span class="bg-red-200 text-red-700 py-1 px-3 rounded-full text-xs">Inactivo</span>
                                @endif
                            </div>
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
                        <td class="px-4 py-2 text-center">
                            @if (!empty($persona->user))
                                <button class="bg-green-200 text-green-700 py-1 px-3 rounded-full text-xs">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                    </svg>
                                </button>
                            @else
                                <button
                                    class="bg-red-200 text-red-700 py-1 px-3 rounded-full text-xs hover:bg-red-400 transition duration-300"
                                    wire:click="nuevouser({{ $persona->id }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                                    </svg>
                                </button>
                            @endif
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
        {{ $personas->links() }}
    </div>

    <!-- Inicio del Modal para mensajes y alertas  -->
    <x-jet-dialog-modal wire:model="modalMensaje">
        <x-slot name="title">
            {{ $titulo }}
        </x-slot>

        <x-slot name="content">
            {{ $mensaje }}
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
                    <x-jet-input id="ci" type="text" class="mt-1 block w-full"
                        wire:model.defer="ci" />
                    <x-jet-input-error for="ci" class="mt-2" />
                </div>
                <div class="col-span-2 sm:col-span-2">
                    <x-jet-label for="fecha_nacimiento" value="{{ __('Fecha de Nacimiento') }}" />
                    <x-jet-input id="fecha_nacimiento" type="date" class="mt-1 block w-full"
                        wire:model.defer="fecha_nacimiento" />
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
            {{ 'Registrar' }}
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 text-sm text-gray-600">
                <div class="col-span-2 sm:col-span-2">
                    <x-jet-label for="name" value="{{ __('Nombre') }}" />
                    <x-jet-input id="nombres" type="text" class="mt-1 block w-full"
                        wire:model.defer="nombres" />
                    <x-jet-input-error for="nombres" class="mt-2" />
                </div>
                <div class="col-span-2 sm:col-span-2">
                    <x-jet-label for="apellido" value="{{ __('Apellido') }}" />
                    <x-jet-input id="apellidos" type="text" class="mt-1 block w-full"
                        wire:model.defer="apellidos" />
                    <x-jet-input-error for="apellidos" class="mt-2" />
                </div>
                <div class="col-span-2 sm:col-span-2">
                    <x-jet-label for="nac" value="{{ __('Nacionalidad') }}" />
                    <x-jet-input id="nac" name="nac" type="text" class="mt-1 block w-full"
                        wire:model.defer="nac" disabled />
                    <x-jet-input-error for=">nac" class="mt-2" />
                </div>
                <div class="col-span-2 sm:col-span-2">
                    <x-jet-label for="cedula" value="{{ __('Cedula') }}" />
                    <x-jet-input id="ci" name="ci" type="text" class="mt-1 block w-full"
                        wire:model.defer="ci" disabled />
                    <x-jet-input-error for="ci" class="mt-2" />
                </div>
                <div class="col-span-2 sm:col-span-2">
                    <x-jet-label for="fnacimiento" value="{{ __('Fecha de Nacimiento') }}" />
                    <x-jet-input id="fecha_nacimiento" type="date" class="mt-1 block w-full"
                        wire:model.defer="fecha_nacimiento" />
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
                    <x-jet-input id="status" type="checkbox" class="mt-1 mr-2" wire:model.defer="status" />
                    Seleccionar en caso de estatus activo
                </div>
                <div class="col-span-2">
                    <x-jet-label for="jefedefamilia" value="{{ __('Jefe de familia ') }}" />
                    <x-jet-input id="jefedefamilia" type="checkbox" class="mt-1 mr-2"
                        wire:model.defer="jefedefamilia" /> Seleccionar si es jefe de familia
                </div>

                <div class="col-span-1 sm:col-span-1">
                    <x-jet-label for="codigo_operador" value="{{ __('Operador') }}" />
                    <select name="codigo_operador" id="codigo_operador" wire:model.defer="codigo_operador"
                        class="mt-1 block w-full">
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
                    <x-jet-input id=">nrotelefono" type="text" class="mt-1 block w-full"
                        wire:model.defer="nrotelefono" />
                    <x-jet-input-error for="nrotelefono" class="mt-2" />
                </div>

                <div class="col-span-1">
                    <x-jet-label for="whatsapp" value="{{ __('Whatsapp') }}" />
                    <x-jet-input id="whatsapp" type="checkbox" class="mt-1 mr-2" wire:model.defer="whatsapp" />
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
                    <x-jet-input id="nombres" type="text" class="mt-1 block w-full" wire:model.defer="nombres"
                        disabled />
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
                    <x-jet-label for="email" value="{{ __('Correo electrónico') }}" />
                    <x-jet-input id="email" type="email" class="mt-1 block w-full"
                        wire:model.defer="email" />
                    <x-jet-input-error for="email" class="mt-2" />
                </div>
                <x-jet-input id="idpersona" type="hidden" class="mt-1 block w-full" wire:model.defer="idpersona" />
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
