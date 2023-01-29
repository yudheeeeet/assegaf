<?php

namespace App\Http\Controllers;

use App\Models\Butcher;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $butcher = Butcher::all();
        return view('dashboard', compact('butcher'));
    }
}
