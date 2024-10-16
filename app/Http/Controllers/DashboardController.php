<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function HoldingDashboard(){

        return view('holdings.dashboard.dashboard');
    }

    public function empresaDashboard(){

        return view('empresas.dashboard.dashboard');
    }
}
