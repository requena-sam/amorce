<?php

namespace App\Livewire\Detente;

use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Detente;

class Edit extends Component
{
    public $detente;
    public $form = [
        'name' => '',
        'status' => '',
    ];
    public $errorMessage = '';
    public $participants = [];
    public $showDeleteModal = false;


    public function mount(Detente $detente)
    {
        $this->detente = $detente;
        $this->form['name'] = $detente->name;
        $this->form['status'] = $detente->status;
        $this->participants = $detente->donators->where('disponibility', false)->toArray();
    }

    public function updateDetente()
    {
        $this->validate([
            'form.name' => 'required|string|max:255',
            'form.status' => 'required|string',
        ]);

        if ($this->form['status'] === \App\Enums\DetenteStatus::ACTIVE->value) {
            foreach ($this->detente->donators as $donator) {
                if (!$donator->disponibility) {
                    $this->errorMessage = 'Tous les donateurs doivent être disponibles pour activer cette détente.';
                    return;
                }
            }

            foreach ($this->detente->donators as $donator) {
                $donator->last_detente = now();
                $donator->save();
            }
        }

        $this->detente->update($this->form);
        $this->redirect(route('detente'));
    }

    public function deleteDetente()
    {
        $this->detente->attendances()->delete();
        $this->detente->delete();
        return redirect()->route('detente');
    }

    #[On('refresh-editForm')]
    public function refreshForm()
    {
        $this->detente->load('donators');
        $this->participants = $this->detente->donators->where('disponibility', false)->toArray();
    }

    public function confirmDelete()
    {
        $this->showDeleteModal = true;
    }

    public function cancelDelete()
    {
        $this->showDeleteModal = false;
    }

    public function render()
    {
        return view('livewire.detente.edit');
    }
}
