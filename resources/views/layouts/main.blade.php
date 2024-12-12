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
<body class="grid grid-cols-[1fr_4fr] bg-gray-200 h-screen">
<!-- Navigation latérale -->
<nav class="bg-white flex flex-col gap-3 p-4">
    <h1 class="justify-self-center p-4 mt-5 font-bold text-3xl text-center">{{ __('Amorce') }}</h1>
    <x-navigation.navigation/>
</nav>
<!-- Contenu principal -->
<main class="overflow-y-auto" x-data="{openMod:false, openAlert:false}" @openedmodal.window="openMod=true" @closedmodal.window="openMod=false" @openalert.window="openAlert = true; setTimeout(() => openAlert = false, 3000)">
    <section class="flex justify-end px-12 py-8 bg-white">
        <div class="flex gap-2 items-center">
            <span class="block w-10 h-10 bg-amber-300 rounded-full"></span>
            <p>Bruce Wayne</p>
            <svg id="Calque_2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-4 h-4">
                <x-icons.dropdown/>
            </svg>
        </div>
    </section>
    <section class="p-12 relative">
    {{ $slot }}
    </section>
    @livewire('modal')
</main>
</body>
</html>
