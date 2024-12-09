<div x-data="counterAnimation({{ $fund->amount }}, {{ $fund->entrance }}, {{ $fund->exit }})"
     class="bg-white rounded-xl p-8 mb-4">
    <div
        id="fondline"
        class="flex justify-between items-center cursor-pointer relative"
        @click="openFund = !openFund; if(openFund) startAnimation()"
    >
        <h2 class="text-2xl">{{$fund->name}}</h2>
        <svg
            id="Calque_2"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20"
            class="w-6 h-6 transform transition-transform duration-300"
            :class="openFund ? 'rotate-180' : ''">
            <x-icons.dropdown/>
        </svg>
    </div>
    <div
        id="fondcontent"
        class="transition-all duration-300 overflow-hidden relative"
        x-collapse
        x-show="openFund">
        <x-edit-button modalcontent="finances.edit" :model="$fund"></x-edit-button>
        <div class="grid grid-cols-3 py-8 gap-6">
            <!-- Animation du solde -->
            <div class="bg-amber-300 text-black py-6 px-8 rounded-xl">
                <h3 class="text-xs">Solde</h3>
                <p class="text-4xl mt-2">
                    <template x-for="digit in animatedValues.amount">
                        <span x-text="digit"></span>
                    </template>
                    €
                </p>
                <div class="flex justify-between mt-5 text-xs">
                    <p>10 transactions</p>
                    <p>11% last month</p>
                </div>
            </div>

            <!-- Animation des entrées -->
            <div class="bg-green-300 text-black py-6 px-8 rounded-xl">
                <h3 class="text-xs">Entrée</h3>
                <p class="text-4xl mt-2">
                    <template x-for="digit in animatedValues.entrance">
                        <span x-text="digit"></span>
                    </template>
                    €
                </p>
                <div class="flex justify-between mt-5 text-xs">
                    <p>7 transactions</p>
                    <p>+12% last month</p>
                </div>
            </div>

            <!-- Animation des sorties -->
            <div class="bg-red-300 text-black py-6 px-8 rounded-xl">
                <h3 class="text-xs">Sortie</h3>
                <p class="text-4xl mt-2">
                    <template x-for="digit in animatedValues.exit">
                        <span x-text="digit"></span>
                    </template>
                    €
                </p>
                <div class="flex justify-between mt-5 text-xs">
                    <p>3 transactions</p>
                    <p>-4% last month</p>
                </div>
            </div>
        </div>

        <!-- Liste des transactions -->
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

            animationSpeed: 50, // Vitesse d'incrémentation (ms)

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

