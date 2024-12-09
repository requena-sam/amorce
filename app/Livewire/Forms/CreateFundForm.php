<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateFundForm extends Form
{
    #[Validate('required|string')]
    public string $name;

    #[Validate('nullable|numeric')]
    public int $amount = 0;
}
