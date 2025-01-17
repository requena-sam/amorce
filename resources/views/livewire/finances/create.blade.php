<div>
    <h2 class="text-3xl font-bold mb-5">Créer un nouveau fond</h2>
    <form wire:submit.prevent="createFund" class="flex flex-col gap-3">
        <div class="flex gap-2 flex-col">
            <x-input-label for="name" value="Nom du fond"/>
            <x-text-input id="name" type="text" placeholder="Nom du fond" wire:model="form.name"/>
            @error('form.name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <x-input-label for="amount" value="Montant d'origine"/>
            <x-text-input id="amount" type="text" wire:model="form.amount"/>
            @error('form.amount')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex justify-end">
        <x-main-button>Créer ce fond</x-main-button>
        </div>
    </form>
</div>

