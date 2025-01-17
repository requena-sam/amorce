<?php

namespace App\Livewire\Finances;

use App\Traits\openModalTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class IndividualFund extends Component
{
    use openModalTrait;

    public $fund;
    public $childComponent = null;


    #[On('refresh-funds')]
    public function render()
    {
        return view('livewire.finances.individual-fund', [
            'fundId' => $this->fund->id,
            'balance' => $this->fund->balance,
            'entranceBalance' => $this->fund->entranceBalance,
            'exitBalance' => $this->fund->exitBalance,
        ]);
    }
}
