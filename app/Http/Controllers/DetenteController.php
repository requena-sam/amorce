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
}
