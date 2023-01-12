<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="">
                <div class="grid grid-cols-8">
                    <!-- Menu Lateral -->
                    <div class="col-span-2 overflow-hidden shadow-xl sm:rounded-lg">
                        <div class="">
                            <livewire:menu.menulateral />
                        </div>                        
                    </div>
                    <!-- /Menu Lateral -->
                    <div class="col-span-6 mx-8 px-3 py-4 overflow-hidden shadow-xl sm:rounded-lg">
                        <div class="">
                            <p>
                                Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. 
                                Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, 
                                cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una 
                                galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. 
                                No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos 
                                electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la 
                                creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente 
                                con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.
                            </p>
                        </div>                        
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
