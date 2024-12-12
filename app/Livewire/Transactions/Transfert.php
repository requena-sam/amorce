<?php

namespace App\Livewire\Transactions;

use App\Livewire\Forms\TransferFundToFundForm;
use App\Models\Fund;
use App\Models\Transactions;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Transfert extends Component
{
    public TransferFundToFundForm $form;
    #[Computed]
    public function funds()
    {
        return Fund::all();
    }

    public function fundToFund()
    {
        $this->validate();
        $data = $this->form->all();
        Transactions::create([
            'fund_id' => $data['target'],
            'amount' => $data['amount'],
            'transaction_type' => 'Dépot',
            'transfer_type' => 'transfer manuel',
            'giver' => 'admin',
            'giver_email' => 'admin',
            'user_id' => auth()->id(),
        ]);
        Transactions::create([
            'fund_id' => $data['base'],
            'amount' => $data['amount'],
            'transaction_type' => 'Retrait',
            'transfer_type' => 'transfer manuel',
            'giver' => 'admin',
            'giver_email' => 'admin',
            'user_id' => auth()->id(),
        ]);
        $this->dispatch('openalert');
        $this->dispatch('refresh-history');


    }
    public function render()
    {
        return view('livewire.transactions.transfert');
    }
}
