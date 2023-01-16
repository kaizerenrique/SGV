<div class="p-2">
    <div class="mt-4">
        <div class="mt-4 text-2xl flex justify-between">
            <div class="mt-4 mb-4 text-2xl flex justify-between leading-normal">
                <span>Registrar Dirección</span>
            </div>
            <div class="mr-2">
                <button type="button"
                    class="focus:outline-none text-white text-base py-2.5 px-5 rounded-md bg-blue-400 hover:bg-blue-600 hover:shadow-lg flex items-center"
                    wire:click="">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                    {{ __('Nueva Dirección') }}
                </button>
            </div>
        </div>
    </div>

    <!-- seccion de tabla -->
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
                        <div class="flex items-center">Consejo Comunal</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">CLAP</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Avenida/Calle/Vereda</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Codito</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Coordenadas</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Acción</div>
                    </th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach ($direcciones as $direccione)
                    <tr class="border-b border-gray-300 hover:bg-gray-200">
                        <td class="px-4 py-2">
                            <span>{{$direccione->consejocomunal->name}}</span>                             
                        </td>
                        <td class="px-4 py-2">
                            <span>{{$direccione->clap->name}}</span>                             
                        </td>
                        <td class="px-4 py-2">                        
                            <span>{{$direccione->direccion}}</span>                                 
                        </td>
                        <td class="px-4 py-2">                            
                            <span>{{$direccione->codigo}}</span>                            
                        </td>
                        <td class="px-4 py-2">
                            <div class="flex items-center">
                                <button class="flex items-center" type="button" type="button" wire:click="geolocalizacion({{$direccione->id}})">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-600 transition duration-75 dark:text-gray-500 group-hover:text-gray-900 dark:group-hover:text-white">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                    </svg>
                                    <span>{{$direccione->latitud}}  {{$direccione->longitud}}</span>
                                </button>                            
                            </div>
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
        {{ $direcciones->links() }}
    </div>
</div>
