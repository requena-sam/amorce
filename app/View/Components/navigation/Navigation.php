<?php

namespace App\View\Components\navigation;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navigation extends Component
{
    public array $links;

    public function __construct()
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

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navigation.navigation', ['links' => $this->links]);
    }
}
