<?php

namespace App\Livewire\Finances;

use App\Livewire\Forms\CreateFundForm;
use App\Models\Fund;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $amount;
    public CreateFundForm $form;

    public function createFund()
    {
        $this->validate();
        $data = $this->form->all();
        Fund::create($data);
        $this->dispatch('refresh-funds');
        $this->dispatch('openalert', ['message' => 'Fond créer avec succès']);
        $this->dispatch('modalClosed');

    }

    public function render()
    {
        return view('livewire.finances.create');
    }

}
