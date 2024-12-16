<?php


namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class NewTransferForm extends Form
{
    #[Validate('required|string|not_in:default')]
    public string $target;

    #[Validate('required|string')]
    public string $donator;

    #[Validate('required|email')]
    public string $donator_email;

    #[Validate('required|numeric')]
    public string $amount;

    #[Validate('required|string|not_in:default')]
    public string $transaction_type;
}
