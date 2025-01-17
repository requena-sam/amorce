<section>
    @livewire('succes-alert')
    <div class="flex flex-col sm:flex-row sm:justify-between mb-5">
        <h2 class="text-3xl">Transactions</h2>
        <x-cta-opener modalcontent="transactions.import" class="mt-4 sm:mt-0">Importer un fichier de transaction
        </x-cta-opener>
    </div>
    <div class="grid gap-5">
        <div class="grid grid-cols-1 lg:grid-cols-[2fr_1fr] gap-5">
            @livewire('transactions.create')
            @livewire('transactions.transfert')
        </div>
        <div class="overflow-scroll">
            @livewire('transactions.history')
        </div>

    </div>
</section>
