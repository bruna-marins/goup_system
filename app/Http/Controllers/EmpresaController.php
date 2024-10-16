<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function index(){
        $empresas = Empresa::all();

        return view('empresas.empresa.index', compact('empresas'));
    }
}
