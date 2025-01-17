<div>
    <h2 class="text-3xl font-bold mb-5">Modifier le profil</h2>
    <form wire:submit.prevent="updateProfile" enctype="multipart/form-data" class="flex flex-col gap-3">
        <div class="flex gap-2 flex-col">
            <x-input-label for="name" value="Nom"/>
            <x-text-input id="name" type="text" wire:model="form.name"/>
            @error('form.name')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <x-input-label for="email" value="Email"/>
            <x-text-input id="email" type="email" wire:model="form.email"/>
            @error('form.email')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <x-input-label for="new_password" value="Nouveau mot de passe"/>
            <x-text-input id="new_password" type="password" wire:model="form.new_password"/>
            @error('form.new_password')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <x-input-label for="new_password_confirmation" value="Confirmer le nouveau mot de passe"/>
            <x-text-input id="new_password_confirmation" type="password" wire:model="form.new_password_confirmation"/>
            @error('form.new_password_confirmation')
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
            <x-main-button>Mettre à jour le profil</x-main-button>
        </div>
    </form>
</div>
