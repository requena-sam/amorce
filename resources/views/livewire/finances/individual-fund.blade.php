<div x-data="counterAnimation({{ $balance }}, {{ $entranceBalance }}, {{ $exitBalance }})"
     class="bg-white rounded-xl p-8 mb-4 shadow-lg">
    <div
        id="fondline"
        class="flex justify-between items-center cursor-pointer relative border-b pb-4 mb-4"
        @click="openFund = !openFund; if(openFund) startAnimation()">
        <h3 class="text-2xl font-bold">{{$fund->name}}</h3>
        <svg
            id="Calque_2"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20"
            class="w-6 h-6 transform transition-transform duration-300"
            :class="openFund ? 'rotate-180' : ''">
            <x-icons.dropdown/>
        </svg>
    </div>
    <div class="flex gap-4 mt-4 text-gray-700" x-show="!openFund">
        <div class="text-sm text-gray-500">
            <p class="font-semibold">Solde:</p>
            <p>{{ $balance }} €</p>
        </div>
        <div class="text-sm">
            <p class="font-semibold">Entrée:</p>
            <p class="text-green-500">{{ $entranceBalance }} €</p>
        </div>
        <div class="text-sm">
            <p class="font-semibold">Sortie:</p>
            <p class="text-red-500">{{ $exitBalance }} €</p>
        </div>
    </div>
    <div
        id="fondcontent"
        class="transition-all duration-300 overflow-hidden relative mt-4"
        x-collapse
        x-show="openFund">
        <div class="flex justify-end">
            <x-edit-button modalcontent="finances.edit" :model="$fund">Editer</x-edit-button>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 py-8 gap-6">
            <div class="bg-amber-300 text-black py-6 px-8 rounded-xl">
                <h4 class="text-xs font-semibold">Solde</h4>
                <p class="text-4xl mt-2">
                    <template x-for="digit in animatedValues.amount">
                        <span x-text="digit"></span>
                    </template>
                    €
                </p>
                <div class="flex flex-col lg:flex-row justify-between mt-5 text-xs">
                    <p>10 transactions</p>
                    <p>11% last month</p>
                </div>
            </div>

            <div class="bg-green-300 text-black py-6 px-8 rounded-xl">
                <h4 class="text-xs font-semibold">Entrée</h4>
                <p class="text-4xl mt-2">
                    <template x-for="digit in animatedValues.entrance">
                        <span x-text="digit"></span>
                    </template>
                    €
                </p>
                <div class="flex flex-col lg:flex-row justify-between mt-5 text-xs">
                    <p>7 transactions</p>
                    <p>+12% last month</p>
                </div>
            </div>

            <div class="bg-red-300 text-black py-6 px-8 rounded-xl">
                <h4 class="text-xs font-semibold">Sortie</h4>
                <p class="text-4xl mt-2">
                    <template x-for="digit in animatedValues.exit">
                        <span x-text="digit"></span>
                    </template>
                    €
                </p>
                <div class="flex flex-col lg:flex-row justify-between mt-5 text-xs">
                    <p>3 transactions</p>
                    <p>-4% last month</p>
                </div>
            </div>
        </div>
        <div class="mt-4">
            @livewire('finances.transaction-history', ['fund' => $fund])
        </div>
    </div>
</div>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('counterAnimation', (targetAmount, targetEntrance, targetExit) => ({
            openFund: false,
            openMod: false,

            targets: {
                amount: targetAmount.toString().split(''),
                entrance: targetEntrance.toString().split(''),
                exit: targetExit.toString().split(''),
            },

            animatedValues: {
                amount: Array(targetAmount.toString().length).fill(0),
                entrance: Array(targetEntrance.toString().length).fill(0),
                exit: Array(targetExit.toString().length).fill(0),
            },

            animationSpeed: 50,

            startAnimation() {
                this.animate('amount', this.targets.amount);
                this.animate('entrance', this.targets.entrance);
                this.animate('exit', this.targets.exit);
            },

            animate(key, targetArray) {
                targetArray.forEach((digit, index) => {
                    this.animateDigit(key, index, parseInt(digit));
                });
            },

            animateDigit(key, index, targetDigit) {
                let currentDigit = 0;
                const interval = setInterval(() => {
                    if (currentDigit < targetDigit) {
                        this.animatedValues[key][index] = ++currentDigit;
                    } else {
                        clearInterval(interval);
                    }
                }, this.animationSpeed);
            },

            toggle() {
                this.openFund = !this.openFund;
            },
        }));
    });
</script>
