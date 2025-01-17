<?php

namespace App\Livewire\Finances;

use App\Models\Fund;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class TransactionHistory extends Component
{
    use WithPagination;

    public $fund;


    public function mount(Fund $fund)
    {
        $this->fund = $fund;
    }

    #[Computed]
    public function transactions()
    {
        return $this->fund
            ->transactions()
            ->orderBy('created_at', 'desc')
            ->paginate(5);
    }

    public function render()
    {
        return view('livewire.finances.transaction-history');
    }
}
