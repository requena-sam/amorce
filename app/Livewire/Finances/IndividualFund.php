<?php

namespace App\Livewire\Finances;

use App\Models\Fund;
use App\Traits\openModalTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class IndividualFund extends Component
{
    use openModalTrait;

    public $fund;
    public $childComponent = null;
    public $showDeleteModal = false;

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

    public function confirmDelete()
    {
        $this->showDeleteModal = true;
    }

    public function cancelDelete()
    {
        $this->showDeleteModal = false;
    }

    public function deleteFund()
    {
        $this->fund->transactions()->delete();
        $this->fund->delete();
        $this->dispatch('refresh-funds');
        $this->showDeleteModal = false;
    }
}
