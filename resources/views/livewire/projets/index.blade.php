<section>
    @livewire('succes-alert')
    <div class="flex flex-col sm:flex-col md:flex-row md:justify-between mb-5">
        <h2 class="text-3xl">{{ __('Projets') }}</h2>
        <x-cta-opener modalcontent="projets.create">Ajouter un projet</x-cta-opener>
    </div>
    <ul class="grid grid-cols-1 md:grid-cols-2 gap-5">
        @foreach($this->projets as $projet)
            <li class="bg-white px-5 py-3.5 rounded-lg h-full relative">
                <h3 class="text-lg font-semibold mb-2.5">{{ $projet->name }}</h3>
                <h4 class="font-semibold">Description du projet</h4>
                <p class="mb-3">{{ $projet->description }}</p>
                <div class="flex justify-end gap-2">
                    <x-edit-button modalcontent="projets.edit" :model="$projet">Modifier</x-edit-button>
                    <button wire:click="confirmDelete({{ $projet->id }})"
                            class="flex gap-2 text-right px-3.5 py-2 bg-red-500 hover:bg-red-700 text-white text-sm rounded">
                        Supprimer
                    </button>
                </div>
            </li>
        @endforeach
    </ul>

    @if($showDeleteModal)
        <div class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75">
            <div class="bg-white p-6 rounded-lg">
                <h2 class="text-xl font-bold mb-4">Confirmer la suppression</h2>
                <p>Êtes-vous sûr de vouloir supprimer ce projet ? Cette action est irréversible.</p>
                <div class="mt-6 flex justify-end gap-3">
                    <button type="button" wire:click="cancelDelete"
                            class="py-2 px-4 bg-amber-400 hover:bg-amber-500 rounded">
                        Annuler
                    </button>
                    <button type="button" wire:click="deleteProjet"
                            class="py-2 px-4 bg-red-500 hover:bg-red-700 text-white rounded">
                        Supprimer
                    </button>
                </div>
            </div>
        </div>
    @endif
</section>
