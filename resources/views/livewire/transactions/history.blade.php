<section class="p-5 bg-white rounded-lg">
    <h3 class="text-2xl mb-4">Historique de transactions</h3>
    <div class="overflow-x-auto">
        <table class="min-w-full">
            <thead class="border-b border-gray-200">
            <tr>
                <th class="px-4 py-3 text-left text-sm font-light text-gray-500">Nom du fond</th>
                <th class="px-4 py-3 text-left text-sm font-light text-gray-500">Date</th>
                <th class="px-4 py-3 text-right text-sm font-light text-gray-500">Montant</th>
                <th class="px-4 py-3 text-left text-sm font-light text-gray-500">Type</th>
            </tr>
            </thead>
            <tbody class="bg-white">
            @foreach($this->transactions as $transaction)
                <tr wire:key="{{$transaction->id}}" class="hover:bg-gray-50">
                    <td class="px-4 py-3 text-sm text-gray-700">
                        {{ $transaction->fund->name}}
                    </td>
                    <td class="px-4 py-3 text-sm text-gray-700">
                        {{ $transaction->created_at->format('d/m/Y') }}
                    </td>
                    <td class="px-4 py-3 text-sm text-right text-gray-700 font-medium">
                        {{ number_format($transaction->amount, 2, ',', ' ') }} €
                    </td>
                    <td class="px-4 py-3 text-sm font-medium">
                        @if($transaction->transaction_type === 'Dépot')
                            <span class="text-green-500">{{ $transaction->transaction_type }}</span>
                        @else
                            <span class="text-red-500">{{ $transaction->transaction_type }}</span>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-6">
        {{$this->transactions->links()}}
    </div>
</section>
