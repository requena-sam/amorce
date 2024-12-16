<section class="p-5 bg-white rounded-lg">
    <h3 class="text-2xl mb-4">Historique de transactions</h3>
    <div class="overflow-x-auto">
        <table class="min-w-full text-nowrap">
            <thead class="border-b border-gray-200">
            <tr>
                <th class="px-4 py-3 text-left text-sm font-light text-gray-500">Source</th>
                <th class="px-4 py-3 text-left text-sm font-light text-gray-500">Destinataire</th>
                <th class="px-4 py-3 text-left text-sm font-light text-gray-500">Date</th>
                <th class="px-4 py-3 text-left text-sm font-light text-gray-500">Type</th>
                <th class="pl-16 py-3 text-left text-sm font-light text-gray-500">Montant</th>
            </tr>
            </thead>
            <tbody class="bg-white">
            @foreach($this->transactions as $transaction)
                <tr wire:key="{{$transaction->id}}" class="hover:bg-grey-50">
                    <td class="px-4 py-3 text-sm text-gray-700 capitalize">
                        {{ $transaction->source }}
                    </td>
                    <td class="px-4 py-3 text-sm text-gray-700 capitalize">
                            {{ $transaction->destination }}
                    </td>
                    <td class="px-4 py-3 text-sm text-gray-700">
                        {{ $transaction->created_at->translatedFormat('d F Y') }}
                    </td>
                    <td class="px-4 py-3 text-sm text-left font-medium">
                        @if($transaction->destination_id !== null && $transaction->source_id !== null)
                            <span class="text-blue-500">Transfert</span>
                        @elseif($transaction->destination_id !== null && $transaction->source_id === null)
                            <span class="text-green-500">Dépot</span>
                        @elseif($transaction->source_id !== null && $transaction->destination_id === null)
                            <span class="text-red-500">Retrait</span>
                        @endif
                    </td>
                    <td class="pl-16 py-3 text-sm text-left text-gray-700 font-medium">
                        {{ number_format($transaction->amount, 2, ',', ' ') }} €
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
