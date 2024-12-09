@props([
    'text' => 'Default',
    'icon' => null,
    'url' => '#',
])

@php
    $isActive = request()->url() === $url;
@endphp

<li class="relative flex items-center gap-4 p-3 pl-5 rounded-xl border-l-8 {{ $isActive ? 'bg-amber-400 border-l-amber-400' : 'border-l-white' }} hover:bg-amber-100 hover:border-l-amber-400">
    <!-- Pseudo-élément pour la bordure intérieure -->
    <span
        class="absolute inset-y-0 left-0 w-2 bg-amber-400 rounded-l-lg opacity-0 transition-opacity duration-300 hover:opacity-100 {{ $isActive ? 'opacity-100' : '' }}">
    </span>
    @if($icon !== null)
        <x-dynamic-component :component="'icons.'.$icon"/>
    @endif
    <a href="{{ $url }}" class="text-black">
        {{ $text }}
    </a>
</li>
