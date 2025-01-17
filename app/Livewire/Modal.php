<?php

namespace App\Livewire;

use App\Traits\openModalTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class Modal extends Component
{
    use openModalTrait;

    public $childComponent;
    public $model;

    #[On('open-modal')]
    public function setChild($name, $model)
    {
        $this->childComponent = $name;
        if ($model) {
            $this->model = $model;
        }
    }

    public function render()
    {
        return view('livewire.modal');
    }
}
