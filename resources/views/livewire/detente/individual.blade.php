@props(['detente'])
<x-main-layout>
    <h2 class="text-3xl">{{$detente->name}}</h2>
    <section class="py-4">
        <h3 class="text-2xl font-medium mb-4">Participants</h3>
        <ul class="grid grid-cols-3 gap-5">
            @foreach($detente->donators as $donator)
                <li class="flex flex-col gap-1 px-5 py-3.5 relative rounded-lg bg-white">
                    <p class="mb-0.5 font-medium">{{ $donator->name }}</p>
                    <a href="tel:{{ $donator->phone }}" class="text-sm block">Tel : {{ $donator->phone }}</a>
                    <a href="mailto:{{ $donator->email }}" class="text-sm block">Email : {{ $donator->email }}</a>
                </li>
            @endforeach
        </ul>
    </section>
    <section>
        <h3 class="text-2xl font-medium mb-4">Projets</h3>
    </section>
</x-main-layout>

