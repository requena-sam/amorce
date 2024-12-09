<section class="p-5 px-8 bg-white rounded-lg ">
    <h3 class="text-2xl font-medium mb-4">Ajouter une transaction</h3>
    <form action="" class="flex flex-col gap-4">
        <div class="flex flex-col gap-1">
            <x-input-label for="target" value="Fond destinataire"/>
            <select id="target" name="target" wire:model="form.target"  class="border-gray-300 focus:border-amber-400 focus:ring-amber-400 rounded-md shadow-sm w-full box-border">
                <option value="default" disabled selected>Choisir un fond</option>
                @foreach($this->funds as $fund)
                    <option value="{{$fund->id}}">{{$fund->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="flex gap-2 flex-col">
                <x-input-label for="donator" value="Nom du donateur"/>
                <x-text-input id="donator" type="text" placeholder="Nom du donator" wire:model="form.donator"/>
                @error('form.donator')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex gap-2 flex-col">
                <x-input-label for="email_donator" value="Email du donateur"/>
                <x-text-input id="email_donator" type="text" placeholder="Email du donateur"
                              wire:model="form.email_donator"/>
                @error('form.email_donator')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="flex gap-2 flex-col">
            <x-input-label for="amount" value="Montant"/>
            <x-text-input id="amount" type="text" placeholder="100" wire:model="form.amount"/>
            @error('form.amount')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="px-4 py-3 bg-amber-400 hover:bg-black hover:text-amber-400 transition rounded-lg">Envoyer le virement</button>
    </form>
</section>

