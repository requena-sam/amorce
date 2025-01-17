<?php

namespace App\Livewire\Projets;

use App\Livewire\Forms\EditProjetForm;
use App\Models\Projet;
use Livewire\Component;

class Edit extends Component
{
    public $model;
    public EditProjetForm $form;

    public function mount($model = null)
    {
        $this->model = $model;
    }

    public function editProjet()
    {
        $this->validate();
        $data = $this->form->all();
        $fund = Projet::find($this->model['id']);
        $fund->update($data);
        $this->dispatch('refresh-projets');
        $this->dispatch('openalert', ['message' => 'Projet mis à jour avec succès']);
        $this->dispatch('modalClosed');


    }
    public function render()
    {
        return view('livewire.projets.edit');
    }
}
