<div class="sm:flex sm:flex-col grid gap-5">
    <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-[1fr_2fr] gap-5">
        <div class="px-5 py-3.5 rounded-lg bg-white">
            <h3 class="text-xl font-semibold">Informations sur vous</h3>
            <div class="flex items-center gap-5 mt-6">
                @if($userProfile->picture_path)
                    <img src="{{ $userProfile->picture_path }}" alt="{{ $userProfile->name }}"
                         class="w-16 h-16 rounded-full">
                @else
                    <img src="{{ asset('images/default-user.jpg') }}" alt="{{ $userProfile->name }}"
                         class="w-16 h-16 rounded-full">
                @endif
                <div>
                    <p class="font-medium">Votre nom :<span
                            class="text-sm font-normal"> {{ $userProfile->name }}</span>
                    </p>
                    <p class="font-medium">Votre email :<span
                            class="text-sm font-normal"> {{ $userProfile->email }}</span></p>
                </div>
            </div>
            <div class="mt-6 flex justify-center">
                <a class="w-fit py-3 px-4 bg-amber-400 hover:bg-black hover:text-amber-400 transition ease-in rounded-lg"
                   href="{{ route('profile', $userProfile->id) }}">Voir votre profil</a>
            </div>
        </div>
        <div class="px-5 py-3.5 rounded-lg bg-white">
            @if($latestActiveDetente)
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center">
                    <h3 class="text-xl font-semibold">Détente active</h3>
                    <p class="text-sm mt-2 sm:mt-0">Publié le {{ $latestActiveDetente->updated_at->format('d/m/Y') }}
                        à {{ $latestActiveDetente->updated_at->format('H:i') }}</p>
                </div>
                <p class="font-medium mt-3">Nom de la détente<span
                        class="block text-sm"> {{ $latestActiveDetente->name }}</span></p>
                <div class="mt-4">
                    <h4 class="text-lg font-semibold">Participants</h4>
                    <div class="flex flex-wrap mt-2">
                        @foreach($latestActiveDetente->donators as $donator)
                            <span class="text-sm text-gray-600 mr-2 mb-2">{{ $donator->name }}</span>
                        @endforeach
                    </div>
                </div>
            @else
                <p>Aucune détente actuellement</p>
            @endif
        </div>
    </div>

    <div class="md:col-span-1 bg-white p-4 rounded-lg shadow">
        <h3 class="text-xl font-bold mb-4">Les 5 dernières transactions</h3>
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead class="border-b border-gray-200">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-light text-gray-500 hidden sm:table-cell">Transfert</th>
                    <th class="px-4 py-3 text-left text-sm font-light text-gray-500 hidden md:table-cell">Auteur</th>
                    <th class="px-4 py-3 text-left text-sm font-light text-gray-500">Date</th>
                    <th class="px-4 py-3 text-right text-sm font-light text-gray-500">Montant</th>
                </tr>
                </thead>
                <tbody class="bg-white">
                @foreach($latestDonations as $donation)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 text-sm text-gray-700 hidden sm:table-cell">{{ $donation->transfer_type }}</td>
                        <td class="px-4 py-3 flex items-center space-x-3 hidden md:table-cell">
                            <span class="bg-amber-300 w-5 h-5 rounded-full"></span>
                            <span class="text-gray-700">{{ $donation->author->name }}</span>
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-700">{{ $donation->created_at->format('d/m/Y') }}</td>
                        <td class="px-4 py-3 text-sm text-right text-gray-700 font-medium">{{ number_format($donation->amount, 2, ',', ' ') }}
                            €
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
