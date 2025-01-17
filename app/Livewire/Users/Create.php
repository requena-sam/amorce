<?php

namespace App\Livewire\Users;

use App\Livewire\Forms\CreateUserForm;
use App\Models\User;
use App\Traits\handlesImagesUpload;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads, handlesImagesUpload;

    public CreateUserForm $form;

    public function mount()
    {
    }

    public function createUser()
    {
        $this->validate();

        $data = $this->form->all();

        if ($this->form->image) {
            $data['picture_path'] = Storage::disk('public')
                ->put('images/users', $data['image']);
        }
        User::create($data);

        $this->dispatch('refresh-users');
        $this->dispatch('openalert', ['message' => 'Utilisateur créé avec succès']);
        $this->dispatch('modalClosed');


    }


    public function render()
    {
        return view('livewire.users.create');
    }
}
