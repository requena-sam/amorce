<section class="p-5 px-8 bg-white rounded-lg ">
    <h3 class="text-2xl font-medium mb-4">Ajouter une transaction</h3>
    <form wire:submit.prevent="newTransfer" class="flex flex-col gap-4">
        <div class="grid grid-cols-2 gap-4">
            <div class="flex flex-col gap-2">
                <x-input-label for="target" value="Fond concerné"/>
                <select id="target" name="target" wire:model="form.target"
                        class="border-gray-300 focus:border-amber-400 focus:ring-amber-400 rounded-md shadow-sm w-full box-border">
                    <option value="default" selected>Choisir un fond</option>
                    @foreach($this->funds as $fund)
                        <option value="{{$fund->id}}">{{$fund->name}}</option>
                    @endforeach
                </select>
                @error('form.target')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex gap-2 flex-col">
                <x-input-label for="transaction_type" value="Type de transaction"/>
                <select name="transaction_type" id="transaction_type" wire:model="form.transaction_type"
                        class="border-gray-300 focus:border-amber-400 focus:ring-amber-400 rounded-md shadow-sm w-full box-border">
                    <option value="default" selected>Choisir un type de transaction</option>
                    <option value="Dépot">Dépot</option>
                    <option value="Retrait">Retrait</option>
                </select>
                @error('form.transaction_type')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
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
                <x-input-label for="donator_email" value="Email du donateur"/>
                <x-text-input id="donator_email" type="text" placeholder="Email du donateur"
                              wire:model="form.donator_email"/>
                @error('form.donator_email')
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

        <button type="submit" class="px-4 py-3 bg-amber-400 hover:bg-black hover:text-amber-400 transition rounded-lg">
            Envoyer le virement
        </button>
    </form>
</section>

