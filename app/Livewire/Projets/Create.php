<?php

namespace App\Livewire\Projets;

use App\Livewire\Forms\CreateProjetForm;
use App\Models\Projet;
use Livewire\Component;

class Create extends Component
{
    public CreateProjetForm $form;

    public function createProjet()
    {
        $this->validate();

        $data = $this->form->all();

        Projet::create($data);

        $this->dispatch('refresh-projets');
        $this->dispatch('openalert', ['message' => 'Projet créé avec succès']);
        $this->dispatch('modalClosed');

    }
    public function render()
    {
        return view('livewire.projets.create');
    }
}
