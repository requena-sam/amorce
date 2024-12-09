<section class="flex flex-col items-center">
    <div class="flex flex-col gap-1 items-center">
        <h2 class="text-2xl order-2 mt-3">{{$this->model['name']}}</h2>
        @if($this->model['picture_path'])
            <img  src="{{$this->model['picture_path']}}" alt="" class="h-24 w-24 rounded-full order-1">
        @else
            <img src="{{asset('images/default-user.jpg')}}" alt="" class="h-24 w-24 rounded-full order-1">
        @endif
        <p class="order-3 text-amber-400">{{$this->model['email']}}</p>
    </div>

</section>
