<?php

namespace App\Livewire\Detente;

use App\Models\Donator;
use App\Models\Projet;
use Livewire\Component;

class Detente extends Component
{
    public $detente;
    public $projets;
    public $newProjetId;

    public function mount(\App\Models\Detente $detente)
    {
        $this->detente = $detente;
        $this->projets = Projet::all();
    }

    public function canVerifyDispo($donatorId)
    {
        $donator = Donator::find($donatorId);
        return $donator && $donator->count_detente == 1;
    }

    public function dispoYes($donatorId)
    {
        $donator = Donator::find($donatorId);
        if ($donator) {
            $donator->disponibility = true;
            $donator->save();
            $this->detente->refresh();
        }
        $this->dispatch('refresh-editForm');
    }

    public function dispoNo($donatorId)
    {
        $donator = Donator::find($donatorId);
        if ($donator) {
            $donator->disponibility = false;
            $donator->save();
            $this->detente->refresh();
        }
        $this->dispatch('refresh-editForm');
    }

    public function redrawDonator($donatorId)
    {
        $donator = Donator::find($donatorId);
        if ($donator) {
            $this->detente->donators()->detach($donator->id);

            $newDonator = Donator::where('is_drawable', true)
                ->whereNull('count_detente')
                ->inRandomOrder()
                ->first();

            if ($newDonator) {
                $newDonator->count_detente = 1;
                $newDonator->save();
                $this->detente->donators()->attach($newDonator->id);
            }

            $donator->count_detente = null;
            $donator->disponibility = false;
            $donator->save();

            $this->detente->refresh();
            $this->dispatch('refresh-editForm');
        }
    }

    public function addProjet()
    {
        if ($this->newProjetId) {
            $this->detente->projets()->attach($this->newProjetId);
            $this->detente->refresh();
            $this->newProjetId = null;
        }
    }

    public function removeProjet($projetId)
    {
        $this->detente->projets()->detach($projetId);
        $this->detente->refresh();
    }

    public function render()
    {
        return view('livewire.detente.detente', [
            'detente' => $this->detente,
            'projets' => $this->projets,
        ])->layout('layouts.main');
    }
}
