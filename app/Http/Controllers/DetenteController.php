<?php

namespace App\Http\Controllers;

use App\Models\Detente;

class DetenteController extends Controller
{
    public function index()
    {
        $detentes = Detente::all();
        return view('detente.index', compact('detentes'));
    }

    public function show(Detente $detente)
    {
        return view('livewire.detente.individual', compact('detente'));
    }
}

