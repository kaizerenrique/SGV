<x-app-layout>
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
                            <livewire:admin.familiacomponente />
                        </div>                        
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>