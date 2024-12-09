<?php

namespace App\Http\Controllers;

use App\Models\Fund;

class FinancesController extends Controller
{
    public function index()
    {
        $funds = Fund::all();

        return view('finances.index', compact('funds'));
    }
}

