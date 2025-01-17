<section>
    <div class="flex flex-col gap-1 items-center">
        <h2 class="text-2xl order-2 mt-3">{{$this->model['name']}}</h2>
        @if($this->model['picture_path'])
            <img  src="{{$this->model['picture_path']}}" alt="" class="h-24 w-24 rounded-full order-1">
        @else
            <img src="{{asset('images/default-user.jpg')}}" alt="" class="h-24 w-24 rounded-full order-1">
        @endif
        <p class="order-3 text-amber-400">{{$this->model['email']}}</p>
    </div>
    <div>
        <h2 class="text-xl mt-3 font-semibold">Gestion des roles</h2>
        <div class="bg-blue-400 px-5 py-3.5 rounded border-blue-700 flex flex-col gap-2 mt-6">
            <h3 class="text-lg font-semibold">Fonctionnalité en cours de développement</h3>
            <p class="text-sm">
                Cette fonctionnalité est actuellement en cours de création. Nous vous remercions pour votre patience et votre
                compréhension.
            </p>
        </div>
    </div>
</section>
