<section>
    @livewire('succes-alert')
    <div class="flex flex-col md:flex-row md:justify-between mb-5">
        <h2 class="text-3xl">{{__('Utilisateurs')}}</h2>
        <x-cta-opener modalcontent="users.create" class="mt-4 md:mt-0">Ajouter un utilisateur</x-cta-opener>
    </div>
    <ul class="grid gap-5 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
        @foreach($this->users as $user)
            <a href="" x-data="{ model: @js($user) }"
               @click.prevent="$wire.openmodal('users.user', model) ; $dispatch('openedmodal');">
                <li class="bg-white p-5 rounded-lg text-center">
                    @if($user->picture_path)
                        <img src="{{ $user->picture_path }}" alt="{{ $user->name }}"
                             class="w-16 h-16 rounded-full mx-auto">
                    @else
                        <img src="{{ asset('images/default-user.jpg') }}" alt="{{ $user->name }}"
                             class="w-16 h-16 rounded-full mx-auto">
                    @endif
                    <p class="mt-3">{{ $user->name }}</p>
                </li>
            </a>
        @endforeach
    </ul>
</section>
