<?php

namespace App\Livewire\Transactions;

use App\Models\Transaction;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class History extends Component
{
    use withPagination;

    #[Computed]
    public function transactions()
    {
        return Transaction::orderBy('created_at', 'desc')->paginate(12);

    }

    public function mount()
    {
    }

    #[On('refresh-history')]
    public function render()
    {
        return view('livewire.transactions.history');
    }
}
