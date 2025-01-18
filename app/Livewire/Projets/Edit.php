<?php

namespace App\Livewire\Projets;

use App\Models\Projet;
use Livewire\Component;

class Edit extends Component
{
    public $model;
    public $form = [
        'name' => '',
        'description' => '',
    ];

    public function mount(Projet $model)
    {
        $this->model = $model;
        $this->form = $model->toArray();
    }

    public function editProjet()
    {
        $this->validate([
            'form.name' => 'required|string|max:100',
            'form.description' => 'required|string|max:255',
        ]);

        $this->model->update($this->form);
        $this->dispatch('refresh-projets');
        $this->dispatch('openalert', ['message' => 'Projet mis à jour avec succès']);
        $this->dispatch('modalClosed');
    }

    public function render()
    {
        return view('livewire.projets.edit');
    }
}
