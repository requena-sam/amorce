<?php

namespace App\Livewire\Dashboard;

use App\Models\Transaction;
use App\Models\Detente;
use Auth;
use Livewire\Component;

class Index extends Component
{
    public $latestDonations;
    public $latestActiveDetente;
    public $userProfile;

    public function mount()
    {
        $this->latestDonations = Transaction::latest()->take(5)->get();
        $this->latestActiveDetente = Detente::with('donators')->where('status', 'ACTIVE')->latest()->first();
        $this->userProfile = Auth::user();
    }

    public function render()
    {
        return view('livewire.dashboard.index', [
            'latestDonations' => $this->latestDonations,
            'latestActiveDetente' => $this->latestActiveDetente,
            'userProfile' => $this->userProfile,
        ]);
    }
}
