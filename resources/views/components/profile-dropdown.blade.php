<section class="flex justify-end px-12 py-8 bg-white" x-data="{ openDropdown: false }">
    <h2 class="sr-only">Your profile</h2>
    <div class="relative">
        <div class="flex gap-2 items-center cursor-pointer" @click="openDropdown = !openDropdown">
            @if(auth()->user()->picture_path)
                <img src="{{ asset(auth()->user()->picture_path) }}" alt="" class="w-10 h-10 rounded-full">
            @else
                <img src="{{ asset('images/default-user.jpg') }}" alt="" class="w-10 h-10 rounded-full">
            @endif
            <p>{{ auth()->user()->name }}</p>
            <svg id="Calque_2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-4 h-4">
                <x-icons.dropdown/>
            </svg>
        </div>
        <div x-show="openDropdown" @click.outside="openDropdown = false"
             class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg z-50">
            <div class="px-4 py-2 text-gray-800">
                <p class="text-sm ">{{ auth()->user()->email}}</p>
            </div>
            <a href="{{ route('profile') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Afficher le
                profil</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="text-red-500 block w-full text-left px-4 py-2 text-gray-800 hover:bg-gray-100">Se
                    déconnecter
                </button>
            </form>
        </div>
    </div>
</section>
