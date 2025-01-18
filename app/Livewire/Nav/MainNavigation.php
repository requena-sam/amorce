<?php

namespace App\Livewire\Nav;

use Livewire\Component;

class MainNavigation extends Component
{
    public array $links;

    public function mount()
    {
        $this->links = [
            'dashboard' => [
                'text' => 'Dashboard',
                'icon' => 'dashboard',
                'route' => 'dashboard',
            ],
            'finances' => [
                'text' => 'Finances',
                'icon' => 'coin',
                'route' => 'finances',
            ],
            'transactions' => [
                'text' => 'Transaction',
                'icon' => 'transaction',
                'route' => 'transactions',
            ],
            'users' => [
                'text' => 'Users',
                'icon' => 'user',
                'route' => 'users',
            ],
            'detente' => [
                'text' => 'Détentes',
                'icon' => 'random',
                'route' => 'detente',
            ],
            'projets' => [
                'text' => 'projets',
                'icon' => 'sheet',
                'route' => 'projets',
            ],
        ];
    }

    public function render()
    {
        return view('livewire.nav.main-navigation');
    }
}
