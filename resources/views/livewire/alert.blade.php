<div
    x-show="openAlert"
    x-transition:enter="transform transition-transform duration-500 ease-out"
    x-transition:enter-start="translate-x-full"
    x-transition:enter-end="translate-x-0"
    x-transition:leave="transform transition-transform duration-500 ease-in"
    x-transition:leave-start="translate-x-0"
    x-transition:leave-end="translate-x-full"
    class="bg-green-200 border-green-600 text-green-600 border-l-4 p-4 absolute top-0 right-0 shadow-md rounded-md z-50"
    role="alert">
    <p class="font-bold">Succès</p>
    <p>{{ $message }}</p>
</div>
