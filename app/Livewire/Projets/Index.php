<?php

namespace App\Livewire\Projets;

use App\Models\Projet;
use App\Traits\openModalTrait;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    use openModalTrait;

    public $showDeleteModal = false;
    public $projetToDelete;

    #[Computed]
    public function projets()
    {
        return Projet::all();
    }

    #[On('refresh-projets')]
    public function refreshProjets()
    {
        unset($this->projets);
    }

    public function confirmDelete($projetId)
    {
        $this->projetToDelete = Projet::find($projetId);
        $this->showDeleteModal = true;
    }

    public function cancelDelete()
    {
        $this->showDeleteModal = false;
        $this->projetToDelete = null;
    }

    public function deleteProjet()
    {
        if ($this->projetToDelete) {
            $this->projetToDelete->delete();
            $this->dispatch('refresh-projets');
            $this->showDeleteModal = false;
        }
    }

    public function render()
    {
        return view('livewire.projets.index');
    }
}
