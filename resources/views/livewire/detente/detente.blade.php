<div>
    <h2 class="text-3xl">{{ $detente->name }}</h2>
    <section class="py-4">
        <h3 class="text-2xl font-medium mb-4">Participants</h3>
        <div class="relative grid grid-cols-1 md:grid-cols-[2fr_1fr] gap-6">
            <div class="order-2 md:order-1">
                @if($detente->status !== \App\Enums\DetenteStatus::ACTIVE->value)
                    <div class="mb-3.5">
                        <h4 class="text-xl font-medium mb-4">Participants en attente</h4>
                        <ul class="flex flex-col gap-5 h-fit">
                            @foreach($detente->donators->where('count_detente', 1)->where('disponibility', false) as $donator)
                                <li class="flex flex-col gap-1 px-5 py-3.5 relative rounded-lg bg-white"
                                    wire:key="donator-{{ $donator->id }}">
                                    <p class="mb-0.5 font-medium">{{ $donator->name }}</p>
                                    <a href="tel:{{ $donator->phone }}" class="text-sm block">Tel
                                        : {{ $donator->phone }}</a>
                                    <a href="mailto:{{ $donator->email }}" class="text-sm block">Email
                                        : {{ $donator->email }}</a>
                                    <div class="flex gap-3">

                                        @if($detente->status == \App\Enums\DetenteStatus::PENDING->value && $this->canVerifyDispo($donator->id))
                                            @if(!$donator->disponibility)
                                                <button type="button" wire:click="dispoYes({{ $donator->id }})"
                                                        class="text-sm px-2.5 py-1 bg-green-400 rounded w-fit">
                                                    Valider la présence
                                                </button>
                                            @else
                                                <button type="button" wire:click="dispoNo({{ $donator->id }})"
                                                        class="text-sm px-2.5 py-1 bg-red-400 rounded w-fit">
                                                    Annuler la présence
                                                </button>
                                            @endif
                                        @endif
                                        <button type="button" wire:click="redrawDonator({{ $donator->id }})"
                                                class="px-3 py-1 bg-amber-400 rounded w-fit ">
                                            Retirer
                                        </button>
                                    </div>

                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div>
                    <h4 class="text-xl font-medium mb-4">Participants confirmée</h4>
                    <ul class="grid gap-5 grid-cols-1 lg:grid-cols-2 h-fit">
                        @foreach($detente->donators->where('disponibility', true)->sortBy('id') as $donator)
                            <li class="flex flex-col gap-1 px-5 py-3.5 relative rounded-lg bg-white"
                                wire:key="donator-{{ $donator->id }}">
                                <div class="flex flex-col md:flex-row md:justify-between">
                                    <p class="mb-0.5 font-medium">{{ $donator->name }}</p>
                                    @if($detente->status == \App\Enums\DetenteStatus::PENDING->value && $this->canVerifyDispo($donator->id))
                                        @if(!$donator->disponibility)
                                            <button type="button" wire:click="dispoYes({{ $donator->id }})"
                                                    class="text-sm px-2.5 py-1 bg-green-400 rounded">
                                                Valider la présence
                                            </button>
                                        @else
                                            <button type="button" wire:click="dispoNo({{ $donator->id }})"
                                                    class="text-sm px-2.5 py-1 bg-red-400 rounded">
                                                Annuler la présence
                                            </button>
                                        @endif
                                    @endif
                                </div>
                                <a href="tel:{{ $donator->phone }}" class="text-sm block">Tel
                                    : {{ $donator->phone }}</a>
                                <a href="mailto:{{ $donator->email }}" class="text-sm block">Email
                                    : {{ $donator->email }}</a>

                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="order-1 md:order-2 sticky top-3 self-start z-10">
                @livewire('detente.edit', ['detente' => $detente])
            </div>
        </div>
    </section>
    <section class="flex-col flex gap-5">
        <h3 class="text-2xl font-medium mt-6">Projets</h3>
        <div>
            <x-input-label for="newProjet" value="Ajouter un projet"/>
            <select id="newProjet" wire:model="newProjetId"
                    class="border-gray-300 focus:border-amber-400 focus:ring-amber-400 rounded-md shadow-sm w-fit box-border">
                <option value="default">Sélectionner un projet</option>
                @foreach($projets as $projet)
                    <option value="{{ $projet->id }}">{{ $projet->name }}</option>
                @endforeach
            </select>
            <button type="button" wire:click="addProjet" class="mt-2 px-3 py-1 bg-amber-400 rounded">
                Ajouter
            </button>
        </div>
        <ul class="flex flex-col gap-5">
            @foreach($detente->projets as $projet)
                <li class="px-5 py-3.5 bg-white rounded">
                    <div class="flex justify-between items-center">
                        <h4 class="text-lg font-semibold">{{ $projet->name }}</h4>
                        <button type="button" wire:click="removeProjet({{ $projet->id }})"
                                class="px-3 py-1 bg-red-400 rounded">
                            Retirer
                        </button>
                    </div>
                    <h4 class="mt-2.5 font-semibold">Description</h4>
                    <p>{{ $projet->description }}</p>
                </li>
            @endforeach
        </ul>
    </section>
</div>
