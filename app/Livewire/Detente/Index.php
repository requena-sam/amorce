<?php

namespace App\Livewire\Detente;

use App\Models\Detente;
use App\Traits\openModalTrait;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    use openModalTrait;

    public function mount()
    {

    }
    #[Computed]
    public function detentes() : \Illuminate\Database\Eloquent\Collection
    {
        return Detente::all();
    }
    #[On('refresh-detentes')]
    public function refreshDetentes()
    {
        unset($this->detentes);
    }

    public function render()
    {
        return view('livewire.detente.index');
    }
}
