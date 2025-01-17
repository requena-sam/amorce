<?php

namespace App\Livewire\Profile;

use App\Traits\openModalTrait;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    use openModalTrait;

    #[On('refresh-profile')]
    public function refreshProfile()
    {
        unset($this->user);
    }
    public function render()
    {
        $user = Auth::user();
        return view('livewire.profile.index', compact('user'));
    }
}
