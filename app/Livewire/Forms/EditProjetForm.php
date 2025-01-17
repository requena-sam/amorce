<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class EditProjetForm extends Form
{
    #[Validate('required|string')]
    public string $name;

    #[Validate('required|string')]
    public string $description;

    public function hydrateForm($model)
    {
        $this->name = $model['name'];
        $this->description = $model['description'];
    }
}
