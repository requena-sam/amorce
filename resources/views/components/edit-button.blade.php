@props(['modalcontent', 'model'])
<button class="flex absolute top-0 right-0 gap-2 text-right" x-data="{model:@js($model)}" @click="$wire.openmodal('{{$modalcontent}}', model); $dispatch('openedmodal')">
    <x-icons.edit></x-icons.edit>
    <span>Editer</span>
</button>
