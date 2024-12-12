<section>
    @livewire('alert', ['message' => 'Transaction ajoutée avec succès'])

    <div class="flex justify-between mb-5">
        <h2 class="text-3xl">Transactions</h2>
        <x-cta-opener modalcontent="">Importer un fichier de transaction</x-cta-opener>
    </div>
    <div class="grid grid-cols-2 gap-5">
        <div>
            @livewire('transactions.history')
        </div>
        <div class="flex flex-col gap-5">
            @livewire('transactions.create')
            @livewire('transactions.transfert')
        </div>
    </div>
</section>
