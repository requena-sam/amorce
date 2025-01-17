<section>
    @livewire('succes-alert')
    <div class="flex flex-col sm:flex-row justify-between mb-5">
        <h2 class="text-3xl">Finances</h2>
        <x-cta-opener modalcontent="finances.create" class="mt-4">Ajouter un nouveau fond</x-cta-opener>
    </div>
    @foreach($this->funds as $fund)
        @livewire('finances.individual-fund', ['fund' => $fund], key($fund->id))
    @endforeach
</section>
