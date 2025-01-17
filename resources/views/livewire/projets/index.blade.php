<section>
    @livewire('succes-alert')
    <div class="flex flex-col sm:flex-col md:flex-row md:justify-between mb-5">
    <h2 class="text-3xl">{{__('Projets')}}</h2>
    <x-cta-opener modalcontent="projets.create">Ajouter un projet</x-cta-opener>
</div>
   <ul class="grid grid-cols-1 md:grid-cols-2 gap-5">
    @foreach($this->projets as $projet)
        <li class="bg-white px-5 py-3.5 rounded-lg h-full relative">
            <h3 class="text-lg font-semibold mb-2.5">{{$projet->name }}</h3>
            <h4 class="font-semibold">Description du projet</h4>
            <p class="mb-3">{{$projet->description}}</p>
            <x-edit-button modalcontent="projets.edit" :model="$projet">Modifier</x-edit-button>
        </li>
    @endforeach
</ul>
</section>
