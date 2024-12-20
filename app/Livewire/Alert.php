<?php

namespace App\Livewire;

use Livewire\Component;

class Alert extends Component
{
    public string $message = '';

    public function mount(string $message)
    {
        $this->message = $message;
    }

    public function render()
    {
        return view('livewire.alert');
    }
}
