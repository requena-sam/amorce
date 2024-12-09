    <section>
        <div class="flex justify-between mb-5">
            <h2 class="text-3xl">Finances</h2>
            <x-cta-opener modalcontent="finances.create">Ajouter un nouveau fond</x-cta-opener>
        </div>
        @foreach($this->funds as $fund)
            @livewire('finances.individual-fund', ['fund' => $fund], key($fund->id))
        @endforeach
    </section>

