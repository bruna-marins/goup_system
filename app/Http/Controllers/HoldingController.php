<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use App\Models\Holding;
use Illuminate\Http\Request;

class HoldingController extends Controller
{
    public function index()
    {

        $holdings = Holding::all();

        return view('holdings.holding.index', compact('holdings'));
    }

    public function show($holding)
    {

        $empresas = Holding::with('empresas')->findOrFail($holding);

        $holding = Holding::findOrFail($holding);

        return view('holdings.holding.show', compact('holding', 'empresas'));
    }

    public function create()
    {

        $holdings = Holding::all();

        return view('holdings.holding.create');
    }

    public function store(Request $request)
    {

        dd($request);

        return;
    }

    public function edit($holding)
    {

        $holding = Holding::findOrFail($holding);

        return view('holdings.holding.edit', compact('holding'));
    }

    public function update(Request $request)
    {

        dd($request);

        return;
    }

    public function showEmpresa($holding_id, $empresa_id)
    {
        // Buscar a holding pelo ID
        $holding = Holding::findOrFail($holding_id);

        // Verificar se a empresa pertence à holding
        $empresa = Empresa::where('id', $empresa_id)
            ->where('holding_id', $holding_id)
            ->firstOrFail();

        $colaboradores = Empresa::with('usuarios')->findOrFail($empresa_id);

        // Retornar a view com os dados da holding e da empresa
        return view('holdings.holding.show-empresa', compact('holding', 'empresa', 'colaboradores'));
    }
}
