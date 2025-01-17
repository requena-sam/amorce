<?php

namespace App\Livewire\Users;

use App\Models\User;
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
    public function users()
    {
        return User::all();
    }

    #[On('refresh-users')]
    public function refreshUsers()
    {
        unset($this->users);
    }

    public function render()
    {
        return view('livewire.users.index');
    }
}
