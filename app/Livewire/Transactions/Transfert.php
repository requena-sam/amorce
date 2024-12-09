<?php

namespace App\Livewire\Transactions;

use App\Models\Fund;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Transfert extends Component
{
    #[Computed]
    public function funds()
    {
        return Fund::all();
    }
    public function render()
    {
        return view('livewire.transactions.transfert');
    }
}
