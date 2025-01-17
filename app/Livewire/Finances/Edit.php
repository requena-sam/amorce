<?php

namespace App\Livewire\Finances;

use App\Livewire\Forms\EditFundForm;
use App\Models\Fund;
use Livewire\Component;

class Edit extends Component
{
    public $model;
    public EditFundForm $form;

    public function mount($model = null)
    {
        $this->model = $model;
    }

    public function editFund()
    {
        $this->validate();
        $data = $this->form->all();
        $fund = Fund::find($this->model['id']);
        $fund->update($data);
        $this->dispatch('refresh-funds');
        $this->dispatch('openalert', ['message' => 'Fond mis à jour avec succès']);
        $this->dispatch('modalClosed');


    }

    public function render()
    {
        return view('livewire.finances.edit');
    }
}
