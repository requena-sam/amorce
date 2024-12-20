<?php

namespace App\Http\Controllers;

class DetenteController extends Controller
{
    public function index()
    {
        return view('detente.index');
    }
    public function show()
    {
        return view('livewire.detente.individual');
    }
}
