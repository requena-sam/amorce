<?php

namespace App\Livewire\Transactions;

use App\Models\Fund;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Create extends Component
{
    #[Computed]
    public function funds()
    {
        return Fund::all();
    }
    public function render()
    {
        return view('livewire.transactions.create');
    }
}
