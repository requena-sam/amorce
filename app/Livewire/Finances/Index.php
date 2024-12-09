<?php

namespace App\Livewire\Finances;

use App\Models\Fund;
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
    public function funds(): \Illuminate\Database\Eloquent\Collection
    {
        return Fund::all();
    }

    #[On('refresh-funds')]
    public function refreshFunds()
    {
        unset($this->funds);
    }

    public function render()
    {
        return view('livewire.finances.index');
    }
}
