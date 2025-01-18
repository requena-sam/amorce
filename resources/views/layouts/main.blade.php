<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Amorce</title>
</head>
<body class="bg-gray-200 h-screen" x-data="{ openNav: false }">
<h1 class="sr-only">Amorce</h1>
<button @click="openNav = !openNav" class="fixed top-8 left-8 z-50 bg-amber-400 text-black p-2 rounded">
    <template x-if="!openNav">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
             stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7"/>
        </svg>
    </template>
    <template x-if="openNav">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
             stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
        </svg>
    </template>
</button>
<nav :class="{'-translate-x-full': !openNav, 'translate-x-0': openNav}"
     class="bg-white flex flex-col gap-3 p-4 fixed-nav transition-transform fixed z-40 h-full w-80 overflow-y-auto">
    <h2 class="justify-self-center p-4 mt-5 font-bold text-3xl text-center">{{ __('Amorce') }}</h2>
    @livewire('nav.main-navigation')
{{--
    <x-navigation.navigation/>
--}}
</nav>
<main class="overflow-y-auto" x-data="{openMod:false, openAlert:false}" @openedmodal.window="openMod=true"
      @closedmodal.window="openMod=false"
      @openalert.window="openAlert = true; setTimeout(() => openAlert = false, 3000)">
    <x-profile-dropdown/>
    <div class="p-12 relative">
        {{ $slot }}
    </div>
    @livewire('modal')
</main>
</body>
</html>
