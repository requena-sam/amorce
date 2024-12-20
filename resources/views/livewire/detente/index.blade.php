<section class="flex flex-col gap-5">
    @livewire('alert', ['message' => 'Détente créer avec succes'])
    <div class="flex justify-between mb-5">
        <h2 class="text-3xl">Détentes</h2>
        <x-cta-opener modalcontent="">Créer une nouvelle détente</x-cta-opener>
    </div>
    <section class="mb-4">
        <h3 class="text-2xl font-medium mb-4">Détente en cours</h3>
        <div class="grid grid-cols-3 gap-10">
            @foreach($this->detentes as $detente)
                @if($detente->status === \App\Enums\DetenteStatus::ACTIVE->value)
                    <div class="px-5 py-3.5 bg-white rounded-lg flex gap-10 justify-between items-center">
                        <a href="{{ route('detente.individual', $detente->id) }}">
                            <div>
                                <p class="font-medium">{{ $detente->name }}</p>
                                <span class="text-sm">{{ $detente->created_at->format('d-m-Y') }}</span>
                                <p>Status : <span class="text-green-400">{{ $detente->status }}</span></p>
                            </div>
                            <div>
                                <x-arrow-btn href="{{ route('detente.individual', $detente->id) }}"/>
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </section>
    <section class="mb-4">
        <h3 class="text-2xl font-medium mb-4">Détente en attente</h3>
        <div class="grid grid-cols-3 gap-10">
            @foreach($this->detentes as $detente)
                @if($detente->status === \App\Enums\DetenteStatus::PENDING->value)
                    <div class="px-5 py-3.5 bg-white rounded-lg flex gap-10 justify-between items-center">
                        <a href="{{ route('detente.individual', $detente->id) }}">
                            <div>
                                <p class="font-medium">{{ $detente->name }}</p>
                                <span class="text-sm">{{ $detente->created_at->format('d-m-Y') }}</span>
                                <p>Status : <span class="text-blue-500">{{ $detente->status }}</span></p>
                            </div>
                            <div>
                                <x-arrow-btn href="{{ route('detente.individual', $detente->id) }}"/>
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </section>
    <section class="mb-4">
        <h3 class="text-2xl font-medium mb-4">Détente passées</h3>
        <div class="grid grid-cols-3 gap-10">
            @foreach($this->detentes as $detente)
                @if($detente->status === \App\Enums\DetenteStatus::CLOSED->value)
                    <div class="px-5 py-3.5 bg-white rounded-lg flex gap-10 justify-between items-center">
                        <a href="{{ route('detente.individual', $detente->id) }}">
                            <div>
                                <p class="font-medium">{{ $detente->name }}</p>
                                <span class="text-sm">{{ $detente->created_at->format('d-m-Y') }}</span>
                                <p>Status : <span class="text-red-500">{{ $detente->status }}</span></p>
                            </div>
                            <div>
                                <x-arrow-btn href="{{ route('detente.individual', $detente->id) }}"/>
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </section>
</section>
