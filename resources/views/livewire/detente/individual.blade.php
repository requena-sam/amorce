@props(['detente'])
<x-main-layout>
    <h2>{{$detente->name}}</h2>
    <section class="py-4">
        <h3 class="text-2xl font-medium mb-4">Participants</h3>
        <ul class="grid grid-cols-3 gap-5">
            @for($i = 0; $i < 9; $i++)
                <li class="flex flex-col gap-1 px-5 py-3.5 relative rounded-lg bg-white">
                    <p class="mb-0.5 font-medium">Antoine Copas</p>
                    <a href="tel:0332425354" class="text-sm block">Tel : 0345 23 12 34</a>
                    <a href="mailto:antoinecopas@gmail.com" class="text-sm block">Email : antoinecopas@gmail.be</a>
                </li>
            @endfor
        </ul>
    </section>
    <section>
        <h3 class="text-2xl font-medium mb-4">Projets</h3>
    </section>
</x-main-layout>

