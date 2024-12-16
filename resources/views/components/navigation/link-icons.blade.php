@props([
    'text' => 'Default',
    'icon' => null,
    'url' => '#',
])

@php
    $isActive = request()->url() === $url;
@endphp

<li class="relative flex items-center gap-4 p-3 pl-5 rounded-xl {{ $isActive ? 'bg-amber-400' : 'bg-white' }} hover:bg-amber-100">
    @if($icon !== null)
        <x-dynamic-component :component="'icons.'.$icon"/>
    @endif
    <a href="{{ $url }}" class="text-black">
        {{ $text }}
    </a>
</li>
