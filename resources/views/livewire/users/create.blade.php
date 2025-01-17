<div>
    <h2 class="text-3xl font-bold mb-5">Créer un nouveau utilisateurs</h2>
    <form wire:submit.prevent="createUser" enctype="multipart/form-data" class="flex flex-col gap-3">
        <div class="flex gap-2 flex-col">
            <x-input-label for="name" value="Nom"/>
            <x-text-input id="name" type="text" placeholder="John Doe" wire:model="form.name"/>
            @error('form.name')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <x-input-label for="email" value="Email"/>
            <x-text-input id="email" type="email" placeholder="johndoe@example.be" wire:model="form.email"/>
            @error('form.email')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <x-input-label for="password" value="Mot de passe"/>
            <x-text-input id="password" type="password" wire:model="form.password"/>
            @error('form.password')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <x-input-label for="image" value="Photo de profil"/>
            <input id="image" type="file" wire:model="form.image" class="rounded"/>
            @error('form.image')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex justify-end">
            <x-main-button>Créer l'utilisateur</x-main-button>
        </div>
    </form>
</div>

