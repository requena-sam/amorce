<div class="relative">
    <h2 class="text-3xl font-bold mb-5">Créer une nouvelle détente</h2>
    <form wire:submit.prevent="createDetente" class="flex flex-col gap-3">
        <div class="flex gap-2 flex-col">
            <x-input-label for="name" value="Nom de la détente"/>
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
            </select>
            @error('form.status')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="">
            <div class="flex gap-2  items-center content-center">
                <h3 class="text-lg font-medium">Tirage au sort des 3 nouveaux membres</h3>
                <button type="button" wire:click="drawWinners" class="px-3 py-1 bg-amber-400 rounded">
                    <x-icons.draw/>
                </button>
            </div>
            <ul class="mt-2 flex-col flex gap-3">
                @foreach($winners as $index => $winner)
                    <li class="flex justify-between rounded bg-gray-200 py-3 px-4 items-center">
                        <div class="flex flex-col gap-1">
                            <p>{{ $winner['name'] }}</p>
                            <p class="text-sm">Email : {{ $winner['email'] }}</p>
                            <p class="text-sm">Tél : {{ $winner['phone'] }}</p>
                            <div class="flex gap-2 items-center">
                                @if($winner['disponibility'])
                                    <button type="button" wire:click="disponibiltyNo({{ $index }})"
                                            class="px-2.5 py-1 bg-red-400 rounded mt-3">
                                        Annuler la presence
                                    </button>
                                @else
                                    <button type="button" wire:click="disponibiltyYes({{ $index }})"
                                            class="px-2.5 py-1 bg-green-400 rounded mt-3">
                                        Valider la presence
                                    </button>
                                @endif
                            </div>
                        </div>
                        <button type="button" wire:click="redrawWinner({{ $index }})"
                                class="px-3 py-1 bg-amber-400 rounded h-fit">
                            <x-icons.draw/>
                        </button>
                    </li>
                @endforeach
            </ul>
        </div>
        <div>
            <h3 class="text-lg font-medium mb-3.5">Membre de la détente actuel</h3>
            <ul class="grid gap-4 grid-cols-1 md:grid-cols-2">
                @foreach($participants as $participant)
                    <li class="flex flex-col gap-1 rounded bg-gray-200 py-3 px-4">
                        <p class="mb-1">{{$participant->name}}</p>
                    </li>
                @endforeach
            </ul>
        </div>
        <div>
            <div>
                <x-input-label for="newProjet" value="Ajouter un projet"/>
                <select id="newProjet" wire:model="newProjetId"
                        class="border-gray-300 focus:border-amber-400 focus:ring-amber-400 rounded-md shadow-sm w-full box-border">
                    <option value="">Sélectionner un projet</option>
                    @foreach($projets as $projet)
                        <option value="{{ $projet->id }}">{{ $projet->name }}</option>
                    @endforeach
                </select>
                <button type="button" wire:click="addProjet" class="mt-2 px-3 py-1 bg-amber-400 rounded">
                    Ajouter
                </button>
            </div>
            <ul class="flex flex-col gap-5 mt-4">
                @foreach($selectedProjets as $projet)
                    <li class="flex justify-between items-center px-5 py-3.5 bg-gray-200 rounded">
                        <span>{{ $projet['name'] }}</span>
                        <button type="button" wire:click="removeProjet({{ $projet['id'] }})"
                                class="px-3 py-1 bg-red-400 rounded">
                            Retirer
                        </button>
                    </li>
                @endforeach
            </ul>
        </div>
        @if($errorMessage)
            <div class="text-red-500 text-sm mb-3 mt-3 py-3.5 px-5 bg-red-100 rounded">{{ $errorMessage }}</div>
        @endif
        <div class="flex justify-end">
            <x-main-button>Créer cette détente</x-main-button>
        </div>
    </form>
</div>
