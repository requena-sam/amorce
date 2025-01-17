<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateUserForm extends Form
{
    #[Validate('required|string')]
    public string $name;

    #[Validate('nullable|string')]
    public int $lastName;

    #[Validate('required|email')]
    public string $email;

    #[Validate('required|string')]
    public string $password;

    #[Validate('nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048|dimensions:max_width=1000,max_height=1000')]
    public $image;
}
