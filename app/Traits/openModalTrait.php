<?php

namespace App\Traits;

trait openModalTrait
{
    public function openmodal($which, $model = null)
    {
        $this->dispatch('open-modal', $which, $model);
    }

    public function closemodal($which)
    {
        $this->dispatch('close-modal', $which);
        $this->childComponent = null; // Réinitialiser le composant enfant
    }
}
