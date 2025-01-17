<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateDetenteForm extends Form
{
    #[Validate('required|string')]
    public string $name;

    #[Validate('required|string|not_in:default')]
    public string $status;

}

