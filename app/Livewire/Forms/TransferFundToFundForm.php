<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class TransferFundToFundForm extends Form
{

    #[Validate('required|string|not_in:default')]
    public string $target;
    #[Validate('required|string|not_in:default')]
    public string $base;

    #[Validate('required|numeric')]
    public string $amount;
}
