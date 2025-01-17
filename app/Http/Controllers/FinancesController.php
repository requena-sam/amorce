<?php

namespace App\Http\Controllers;

use App\Models\Fund;
use Illuminate\Routing\Controller;

class FinancesController extends Controller
{
    public function index()
    {
        $funds = Fund::all();

        return view('finances.index', compact('funds'));
    }
}

