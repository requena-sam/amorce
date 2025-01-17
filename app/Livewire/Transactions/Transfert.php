<?php

namespace App\Livewire\Transactions;

use App\Livewire\Forms\TransferFundToFundForm;
use App\Models\Fund;
use App\Models\Transaction;
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
        $source = $data['source'];
        $destination = $data['target'];
        $source_name = Fund::find($source)->name;
        $destination_name = Fund::find($destination)->name;
        Transaction::create([
            'source_id' => $source,
            'source' => $source_name,
            'destination_id' => $destination,
            'destination' => $destination_name,
            'amount' => $data['amount'],
            'transaction_type' => 'Transfert',
            'transfer_type' => 'Transfert manuel',
            'user_id' => auth()->id(),
        ]);
        $this->dispatch('openalert', ['message' => 'Transfert effectué avec succès']);
        $this->dispatch('refresh-history');

    }

    public function render()
    {
        return view('livewire.transactions.transfert');
    }
}
