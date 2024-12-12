@props(['modalcontent'])

<button x-data @click="$wire.openmodal('{{$modalcontent}}'); $dispatch('openedmodal')" class="text-black bg-amber-400 py-3 px-6 rounded-lg hover:bg-black hover:text-amber-400 transition ease-in">
    {{ $slot }}
</button>