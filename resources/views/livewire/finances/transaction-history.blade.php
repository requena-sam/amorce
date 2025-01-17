<section>
    <h3 class="text-2xl">Transactions</h3>
    <div class="overflow-x-auto">
        <table class="min-w-full">
            <thead class="border-b border-gray-200">
            <tr>
                <th class="px-4 py-3 text-left text-sm font-light text-gray-500">Transfert</th>
                <th class="px-4 py-3 text-left text-sm font-light text-gray-500">Auteur</th>
                <th class="px-4 py-3 text-left text-sm font-light text-gray-500">Date</th>
                <th class="px-4 py-3 text-right text-sm font-light text-gray-500">Montant</th>
                <th class="px-4 py-3 text-left text-sm font-light text-gray-500">Type</th>
            </tr>
            </thead>
            <tbody class="bg-white">
            @foreach($this->transactions as $transaction)
                <tr wire:key="{{$transaction->id}}" class="hover:bg-gray-50">
                    <td class="px-4 py-3 text-sm text-gray-700">
                        {{ $transaction->transfer_type }}
                    </td>
                    <td class="px-4 py-3 flex items-center space-x-3">
                        <span class="bg-amber-300 w-5 h-5 rounded-full"></span>
                        <span class="text-gray-700">{{ $transaction->author->name }}</span>
                    </td>
                    <td class="px-4 py-3 text-sm text-gray-700">
                        {{ $transaction->created_at->format('d/m/Y') }}
                    </td>
                    <td class="px-4 py-3 text-sm text-right text-gray-700 font-medium">
                        {{ number_format($transaction->amount, 2, ',', ' ') }} €
                    </td>
                    <td class="px-4 py-3 text-sm font-medium">
                        @if($transaction->destination_id === $fund->id)
                            <span class="text-green-500">Dépot</span>
                        @elseif($transaction->source_id === $fund->id)
                            <span class="text-red-500">Retrait</span>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{$this->transactions->links()}}
    </div>
</section>
