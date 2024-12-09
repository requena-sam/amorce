<section class="p-5 px-8 bg-white rounded-lg ">
    <h3 class="text-2xl font-medium mb-4">Transfert de fond</h3>
    <form action="" class="flex flex-col gap-4">
        <div class="grid-cols-2 grid gap-4">
            <div class="flex flex-col gap-1">
                <x-input-label for="base" value="Fond à prélevé"/>
                <select id="base" name="base" wire:model="form.base"
                        class="border-gray-300 focus:border-amber-400 focus:ring-amber-400 rounded-md shadow-sm w-full box-border">
                    <option value="default" disabled selected>Choisir un fond</option>
                    @foreach($this->funds as $fund)
                        <option value="{{$fund->id}}">{{$fund->name}}</option>
                    @endforeach
                    @error('form.base')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </select>
                @error('form.base')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col gap-1">
                <x-input-label for="target" value="Fond destinataire"/>
                <select id="target" name="target" wire:model="form.target"
                        class="border-gray-300 focus:border-amber-400 focus:ring-amber-400 rounded-md shadow-sm w-full box-border">
                    <option value="default" disabled selected>Choisir un fond</option>
                    @foreach($this->funds as $fund)
                        <option value="{{$fund->id}}">{{$fund->name}}</option>
                    @endforeach
                    @error('form.base')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div>
            <x-input-label for="amount" value="Montant"/>
            <x-text-input id="amount" type="text" placeholder="100" wire:model="form.amount"/>
            @error('form.amount')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="px-4 py-3 bg-amber-400 hover:bg-black hover:text-amber-400 transition rounded-lg">
            Valider le transfert
        </button>
    </form>
</section>
