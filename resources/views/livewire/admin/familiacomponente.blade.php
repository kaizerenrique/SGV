<div class="p-2">
    <div class="mt-4">
        <div class="mt-4 text-2xl flex justify-between">
            <div class="mt-4 mb-4 text-2xl flex justify-between leading-normal">
                <span>Familias Registradas</span> 
                <div class="text-center">
                    <span class="mx-6 bg-yellow-200 text-yellow-700 py-1 px-3 rounded-full text-base">{{$familiasnumero}}</span>
                </div>
            </div>
            <div class="mr-2">
                <a href="{{ route('nuevafamilia') }}" type="button" class="focus:outline-none text-white text-base py-2.5 px-5 rounded-md bg-blue-400 hover:bg-blue-600 hover:shadow-lg flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                    </svg>
                    {{ __('Nueva Familia') }}
                </a>
            </div>
        </div>
    </div>

    <!-- seccion de tabla de familias -->
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
                        <div class="flex items-center">Código de Familia </div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Estatus</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Integrantes</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Consejo Comunal</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Clap</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Acción</div>
                    </th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach ($familias as $familia)
                    <tr class="border-b border-gray-300 hover:bg-gray-200">
                        <td class="px-4 py-2">
                            <span>{{ $familia->codigo}}</span>
                        </td>
                        <td class="px-4 py-2">
                            @switch($familia->status)
                                @case('Pendiente')
                                    <span class="bg-purple-200 text-purple-700 py-1 px-3 rounded-full text-xs">{{ $familia->status }} </span>
                                    @break
                                @case('Procesando')
                                    <span class="bg-yellow-200 text-yellow-700 py-1 px-3 rounded-full text-xs">{{ $familia->status }} </span>
                                    @break
                                @case('Completado')
                                    <span class="bg-green-200 text-green-700 py-1 px-3 rounded-full text-xs">{{ $familia->status }} </span>
                                    @break
                                @case('Cancelado')
                                    <span class="bg-red-200 text-red-700 py-1 px-3 rounded-full text-xs">{{ $familia->status }} </span>
                                    @break                            
                                @default
                                {{ $familia->status }}
                                    
                            @endswitch                         
                                                   
                        </td>
                        <td class="px-4 py-2 text-center">
                            @foreach ($familia->personas as $persona )
                                                            
                            @endforeach
                            <span class="bg-green-200 text-green-700 py-1 px-3 rounded-full text-xs">{{$familia->personas->count()}}</span>                                                                                 
                        </td>
                        <td class="px-4 py-2">                            
                            {{ $familia->consejocomunal->name }}                            
                        </td>
                        <td class="px-4 py-2">                            
                            {{ $familia->clap->name }}                            
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
        {{ $familias->links() }}
    </div>
</div>
