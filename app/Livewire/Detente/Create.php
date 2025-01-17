<?php

namespace App\Livewire\Detente;

use App\Livewire\Forms\CreateDetenteForm;
use App\Models\Detente;
use App\Models\Donator;
use App\Models\Projet;
use Illuminate\Support\Carbon;
use Livewire\Component;

class Create extends Component
{
    public CreateDetenteForm $form;
    public $participants;
    public $winners = [];
    public $errorMessage = '';
    public $projets;
    public $newProjetId;
    public $selectedProjets = [];

    public function mount()
    {
        $this->participants = Donator::whereIn('count_detente', [1, 2])->get();
        $this->projets = Projet::all();
    }

    public function drawWinners()
    {
        Donator::updateDrawableStatusForAll();

        $eligibleDonators = Donator::where('is_drawable', true)
            ->whereNull('count_detente')
            ->inRandomOrder()
            ->take(3)
            ->get()
            ->toArray();

        if (empty($eligibleDonators)) {
            $this->errorMessage = 'Aucun donateurs ne remplis les conditions pour participer à la détente.';
            return;
        }

        $this->winners = $eligibleDonators;
    }

    public function redrawWinner($index)
    {
        $newWinner = Donator::where('is_drawable', true)
            ->whereNull('count_detente')
            ->inRandomOrder()
            ->first()
            ->toArray();

        $this->winners[$index] = $newWinner;
    }

    public function disponibiltyYes($index)
    {
        $this->winners[$index]['disponibility'] = true;
        Donator::where('id', $this->winners[$index]['id'])->update(['disponibility' => true]);
    }

    public function disponibiltyNo($index)
    {
        $this->winners[$index]['disponibility'] = false;
        Donator::where('id', $this->winners[$index]['id'])->update(['disponibility' => false]);
    }

    public function addProjet()
    {
        if ($this->newProjetId) {
            $projet = Projet::find($this->newProjetId);
            if ($projet && !in_array($projet->id, array_column($this->selectedProjets, 'id'))) {
                $this->selectedProjets[] = ['id' => $projet->id, 'name' => $projet->name];
            }
            $this->newProjetId = null;
        }
    }

    public function removeProjet($projetId)
    {
        $this->selectedProjets = array_filter($this->selectedProjets, function ($projet) use ($projetId) {
            return $projet['id'] !== $projetId;
        });
    }

    public function createDetente()
    {
        $data = $this->form->validate();
        $status = $data['status'];

        if ($status !== \App\Enums\DetenteStatus::PENDING->value && $status !== \App\Enums\DetenteStatus::ACTIVE->value) {
            $this->errorMessage = 'Veuillez choisir le statut de la détente.';
            return;
        }

        if (empty($this->winners)) {
            $this->errorMessage = 'Vous devez tirer au sort les 3 nouveaux participants avant de créer une détente.';
            return;
        }

        if ($status === \App\Enums\DetenteStatus::ACTIVE->value) {
            foreach ($this->winners as $winner) {
                if (!$winner['disponibility']) {
                    $this->errorMessage = 'Tous les participants doivent être disponibles pour rendre la détente active.';
                    return;
                }
            }
        }

        $detente = Detente::create([
            'name' => $data['name'],
            'status' => $status,
        ]);

        foreach ($this->winners as $index => $winner) {
            $detente->donators()->attach($winner['id']);
            $donator = Donator::find($winner['id']);
            $donator->count_detente = 1;
            if ($status === \App\Enums\DetenteStatus::ACTIVE->value) {
                $donator->last_detente = Carbon::now();
            }
            $donator->save();
        }

        foreach ($this->participants as $participant) {
            $donator = Donator::find($participant['id']);
            $donator->count_detente = $donator->count_detente === 2 ? null : $donator->count_detente + 1;
            $donator->save();
        }

        $participantIds = $this->participants->pluck('id')->toArray();
        $detente->donators()->attach($participantIds);

        if (!empty($this->selectedProjets)) {
            $detente->projets()->attach(array_column($this->selectedProjets, 'id'));
        }

        $this->dispatch('refresh-detentes');
        $this->dispatch('openalert', ['message' => 'Détente créer avec succès']);
        $this->dispatch('modalClosed');
    }

    public function render()
    {
        return view('livewire.detente.create', [
            'participants' => $this->participants,
        ]);
    }
}
