<?php

namespace App\Livewire\Transactions;

use App\Traits\openModalTrait;
use Livewire\Component;

class Index extends Component
{
    use openModalTrait;

    public function render()
    {
        return view('livewire.transactions.index');
    }
}
