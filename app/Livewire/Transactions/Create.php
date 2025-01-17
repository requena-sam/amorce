<?php

namespace App\Livewire\Transactions;

use App\Enums\TransactionType;
use App\Livewire\Forms\NewTransferForm;
use App\Models\Donator;
use App\Models\Fund;
use App\Models\Transaction;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Create extends Component
{
    public $target;
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

        if ($data['transaction_type'] === TransactionType::RETRAIT->value) {
            $source = $fundID;
            $source_name = Fund::find($fundID)->name;
        } elseif ($data['transaction_type'] === TransactionType::DEPOT->value) {
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

        $donator = Donator::query()
            ->where(function ($query) use ($data) {
                $query->where('name', $data['donator'])
                    ->where('email', $data['donator_email']);
            })
            ->orWhere(function ($query) use ($data) {
                $query->where('name', $data['donator'])
                    ->where('phone', $data['donator_phone']);
            })
            ->orWhere(function ($query) use ($data) {
                $query->where('email', $data['donator_email'])
                    ->where('phone', $data['donator_phone']);
            })
            ->first();

        if ($donator) {
            $donator->update([
                'name' => $donator->name !== $data['donator'] ? $data['donator'] : $donator->name,
                'email' => $donator->email !== $data['donator_email'] ? $data['donator_email'] : $donator->email,
                'phone' => $donator->phone !== $data['donator_phone'] ? $data['donator_phone'] : $donator->phone,
            ]);

            $donationDate = Carbon::now()->addMonth(2)->format('Y-m');  // Format Mois-Année (ex: 2024-12)
            $donationsDates = $donator->donations_dates ?? [];

            if (!is_array($donationsDates)) {
                $donationsDates = [];
            }

            if (!in_array($donationDate, $donationsDates)) {
                $donationsDates[] = $donationDate;
                $donator->donations_dates = $donationsDates;
                $donator->save();
            }
        } else {
            $donator = Donator::create([
                'name' => $data['donator'],
                'email' => $data['donator_email'],
                'phone' => $data['donator_phone'],
                'donations_dates' => [Carbon::now()->format('Y-m')],
            ]);
        }

        $this->dispatch('openalert', ['message' => 'Transaction créer avec succès']);
        $this->dispatch('refresh-history');
    }

    public function render()
    {
        return view('livewire.transactions.create');
    }
}
