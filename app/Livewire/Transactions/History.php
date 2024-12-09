<?php

namespace App\Livewire\Transactions;

use App\Models\Transactions;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class History extends Component
{
    use withPagination;

    #[Computed]
    public function transactions()
    {
        return Transactions::orderBy('created_at', 'desc')->paginate(12);

    }

    public function mount()
    {
    }

    public function render()
    {
        return view('livewire.transactions.history');
    }
}
