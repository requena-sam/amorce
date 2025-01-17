<?php

namespace App\Livewire\Projets;

use App\Models\Projet;
use App\Models\User;
use App\Traits\openModalTrait;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    use openModalTrait;

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

    public function render()
    {
        return view('livewire.projets.index');
    }
}
