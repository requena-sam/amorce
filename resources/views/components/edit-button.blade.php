@props(['modalcontent', 'model'])
<button class="flex gap-2 text-right px-3.5 py-2 bg-amber-400 rounded" x-data="{model:@js($model)}" @click="$wire.openmodal('{{$modalcontent}}', model); $dispatch('openedmodal')">
    <x-icons.edit></x-icons.edit>
    <span class="text-sm">{{$slot}}</span>
</button>
