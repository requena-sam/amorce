<div>
    <h2 class="text-3xl font-bold mb-5">Créer un nouveau projet</h2>
    <form wire:submit.prevent="createProjet" enctype="multipart/form-data" class="flex flex-col gap-3">
        <div class="flex gap-2 flex-col">
            <x-input-label for="name" value="Nom"/>
            <x-text-input id="name" type="text" placeholder="John Doe" wire:model="form.name"/>
            @error('form.name')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <x-input-label for="description" value="Email"/>
            <textarea
                class="border-gray-300 focus:border-amber-400 focus:ring-amber-400 rounded-md shadow-sm w-full box-border "
                rows="6"
                id="description" placeholder="Inscrivez la description du projet"
                wire:model="form.description"></textarea>
            @error('form.description')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex justify-end">
            <x-main-button>Créer le projet</x-main-button>
        </div>
    </form>
</div>
