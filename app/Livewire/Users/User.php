<?php

namespace App\Livewire\Users;

use Livewire\Component;

class User extends Component
{
    public $model;

    public function mount($model = null)
    {
        $this->model = $model;
    }
    public function render()
    {
        return view('livewire.users.user');
    }
}
