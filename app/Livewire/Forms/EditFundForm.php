<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class EditFundForm extends Form
{
    #[Validate('required|string')]
    public string $name;

    #[Validate('nullable|numeric')]
    public int $amount = 0;

    public function hydrateForm($model)
    {
        $this->name = $model['name'];
        $this->amount = $model['amount'];
    }
}
