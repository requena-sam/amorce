<section class="flex justify-end px-12 py-8 bg-white" x-data="{ openDropdown: false }">
    <div class="relative">
        <div class="flex gap-2 items-center cursor-pointer" @click="openDropdown = !openDropdown">
            <span class="block w-10 h-10 bg-amber-300 rounded-full"></span>
            <p>Bruce Wayne</p>
            <svg id="Calque_2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-4 h-4">
                <x-icons.dropdown/>
            </svg>
        </div>
        <div x-show="openDropdown" @click.outside="openDropdown = false"
             class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg z-50">
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
