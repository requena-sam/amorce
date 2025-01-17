@props(['modalcontent'])

<button x-data @click="$wire.openmodal('{{$modalcontent}}'); $dispatch('openedmodal')" class="text-black bg-amber-400 py-2 px-4 sm:py-3 sm:px-6 rounded-lg hover:bg-black hover:text-amber-400 transition ease-in mt-3 sm:mt-0">
    {{ $slot }}
</button>
