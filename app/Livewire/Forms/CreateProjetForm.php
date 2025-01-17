<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateProjetForm extends Form
{
    #[Validate('required|string')]
    public string $name;

    #[Validate('nullable|string')]
    public string $description;
}
