<?php

namespace App\Livewire\Transactions;

use App\Livewire\Forms\NewTransferForm;
use App\Models\Fund;
use App\Models\Transactions;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Create extends Component
{
    public $target;
    public $giver;
    public $giver_email;
    public $amount;
    public NewTransferForm $form;

    public function mount()
    {
    }

    #[Computed]
    public function funds()
    {
        return Fund::all();
    }

    public function newTransfer()
    {
        $this->validate();
        $data = $this->form->all();
        Transactions::create([
            'fund_id' => $data['target'],
            'amount' => $data['amount'],
            'transaction_type' => $data['transaction_type'],
            'transfer_type' => 'transfer manuel',
            'user_id' => auth()->id(),
            'giver' => $data['giver'],
            'giver_email' => $data['giver_email'],
        ]);
        $this->dispatch('openalert');
        $this->dispatch('refresh-history');

    }

    public function render()
    {
        return view('livewire.transactions.create');
    }
}
