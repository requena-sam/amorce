<?php

namespace App\Http\Controllers;


use Illuminate\Routing\Controller;

class ProjetsController extends Controller
{
    public function index()
    {
        return view('projets.index');

    }
}
