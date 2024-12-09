<div x-show="openMod" class="relative z-50">
    <!-- Fond semi-transparent -->
    <div
        class="fixed inset-0 bg-black bg-opacity-50 z-40 center"
        x-show="openMod"
        x-transition:enter="transition-opacity ease-out duration-500"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-in duration-500"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click="openMod = false; $wire.closemodal('{{$childComponent}}');">
    </div>

    <!-- Contenu de la modale -->
    <div
        class="fixed inset-y-0 right-0 w-1/3 bg-white shadow-lg z-50 flex flex-col transform"
        x-show="openMod"
        x-transition:enter="transition-transform ease-out duration-500"
        x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition-transform ease-in duration-500"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
        @click.away="openMod = false; $wire.closemodal('{{$childComponent}}');">
        <!-- Bouton de fermeture -->
        <div class="flex justify-end p-4">
            <span @click="openMod = false ; $wire.closemodal('{{$childComponent}}');"
                  class="text-gray-600 hover:text-black">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </span>
        </div>

        <!-- Contenu Livewire -->
        <div class="p-6">
            <div>
                @if($childComponent && $model)
                    @livewire($childComponent, compact('model'))
                @elseif($childComponent)
                    @livewire($childComponent)
                @endif
            </div>
        </div>
    </div>
</div>
