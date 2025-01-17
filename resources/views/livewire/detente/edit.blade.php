<div class="relative px-5 py-3.5 bg-white h-fit rounded-lg">
    <h2 class="text-2xl font-medium mb-5">Informations sur la détente</h2>
    <form wire:submit.prevent="updateDetente" class="flex flex-col gap-3">
        @if($errorMessage)
            <div class="text-red-500 text-sm mb-3">{{ $errorMessage }}</div>
        @endif
        <div class="flex gap-2 flex-col">
            <x-input-label for="name" value="Modifier le nom de la détente"/>
            <x-text-input id="name" type="text" placeholder="Nom de la détente" wire:model="form.name"/>
            @error('form.name')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <x-input-label for="status" value="Statut de la détente"/>
            <select name="status" id="status" wire:model="form.status"
                    class="border-gray-300 focus:border-amber-400 focus:ring-amber-400 rounded-md shadow-sm w-full box-border">
                <option value="default" selected>Choisir un status</option>
                <option
                    value="{{\App\Enums\DetenteStatus::PENDING->value}}">{{\App\Enums\DetenteStatus::PENDING->value}}</option>
                <option
                    value="{{\App\Enums\DetenteStatus::ACTIVE->value}}">{{\App\Enums\DetenteStatus::ACTIVE->value}}</option>
                <option
                    value="{{\App\Enums\DetenteStatus::CLOSED->value}}">{{\App\Enums\DetenteStatus::CLOSED->value}}</option>
            </select>
        </div>
        <div>
            <h3 class="text-lg font-medium mb-3.5">Participants en attente de vérification</h3>
            @if(count($participants) > 0)
                <ul class="flex flex-col gap-4">
                    @foreach($participants as $participant)
                        <li class="rounded bg-gray-200 py-3 px-4 items-center">
                            <div class="flex flex-col gap-1">
                                <p class="mb-1">{{$participant['name']}}</p>
                                <p class="text-sm">Email : {{$participant['email']}}</p>
                                <p class="text-sm">Tél : {{$participant['phone']}}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-green-500">Tous les participants sont disponibles.</p>
            @endif
        </div>
        <div class="flex justify-end gap-3">
            <button type="button" wire:click="confirmDelete"
                    class="text-white py-3 px-4 bg-red-500 hover:bg-red-700 hover:text-white transition ease-in rounded-lg">
                Supprimer
            </button>
            <x-main-button>Mettre à jour</x-main-button>
        </div>
    </form>
    @if($showDeleteModal)
        <div class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75">
            <div class="bg-white p-6 rounded-lg">
                <h2 class="text-xl font-bold mb-4">Confirmer la suppression</h2>
                <p>Êtes-vous sûr de vouloir supprimer ce projet ? Cette action est irréversible.</p>
                <div class="mt-6 flex justify-end gap-3">
                    <button type="button" wire:click="cancelDelete"
                            class="py-2 px-4 bg-gray-500 hover:bg-gray-700 text-white rounded-lg">
                        Annuler
                    </button>
                    <button type="button" wire:click="deleteDetente"
                            class="py-2 px-4 bg-red-500 hover:bg-red-700 text-white rounded-lg">
                        Supprimer
                    </button>
                </div>
            </div>
        </div>
    @endif

</div>
