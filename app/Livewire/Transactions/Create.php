<?php

namespace App\Livewire\Transactions;

use App\Enums\TransactionType;
use App\Livewire\Forms\NewTransferForm;
use App\Models\Donator;
use App\Models\Fund;
use App\Models\Transaction;
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
        $fundID = $data['target'];
        $source = null;
        $destination = null;
        $source_name = 'Donateur';
        $destination_name = 'Projet';
        if ($data['transaction_type'] === TransactionType::RETRAIT->value)
        {
            $source = $fundID;
            $source_name = Fund::find($fundID)->name;
        }
        elseif($data['transaction_type'] === TransactionType::DEPOT->value)
        {
            $destination = $fundID;
            $destination_name = Fund::find($fundID)->name;
        }


        Transaction::create([
            'source_id' => $source,
            'source' => $source_name,
            'destination_id' => $destination,
            'destination' => $destination_name,
            'amount' => $data['amount'],
            'transaction_type' => $data['transaction_type'],
            'transfer_type' => 'transfer manuel',
            'user_id' => auth()->id(),
        ]);

        Donator::create([
            'name' => $data['donator'],
            'email' => $data['donator_email'],
        ]);

        $this->dispatch('openalert');
        $this->dispatch('refresh-history');

    }

    public function render()
    {
        return view('livewire.transactions.create');
    }
}
