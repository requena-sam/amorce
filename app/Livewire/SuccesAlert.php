<?php

namespace App\Livewire;

use Livewire\Component;

class SuccesAlert extends Component
{
    public $message;
    public $openAlert = false;

    protected $listeners = ['openalert' => 'showAlert'];

    public function showAlert($data)
    {
        $this->message = $data['message'];
        $this->openAlert = true;
    }

    public function render()
    {
        return view('livewire.succes-alert', ['message' => $this->message]);
    }
}
