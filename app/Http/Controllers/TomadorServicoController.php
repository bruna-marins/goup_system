<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TomadorServico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TomadorServicoController extends Controller
{
    public function index()
    {

        $clientes = TomadorServico::all();

        return view('empresas.cliente.index', compact('clientes'));
    }

    public function create()
    {

        return view('empresas.cliente.create');
    }

    public function store(Request $request)
    {
        $empresaId = Auth::user()->empresa_id;

        $request->validate([
            'nome' => 'required|string|max:255',
            'cnpj' => 'required|cnpj',
            //'cpf' => 'required|cpf',
            'telefone' => 'required',
            'site' => 'required|url',
            'email' => 'required|email',
            'cep' => 'required',
            'logradouro' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'estado' => 'required',

            // Mensagens de erro
            'nome.required' => 'O campo Nome é obrigatório.',
            'cnpj.required' => 'O campo CNPJ é obrigatório.',
            'cnpj.cnpj' => 'Informe um CNPJ válido para o campo CNPJ.',
            //'cpf' => 'O campo CPF é obrigatório.',
            //'cpf' => 'Informe um CPF válido para o campo CPF.',
            'telefone.required' => 'O campo Telefone é obrigatório.',
            'site.required' => 'O campo Site é obrigatório.',
            'site.url' => 'Informe uma URL válida para o campo Site.',
            'email.required' => 'O campo E-mail é obrigatório.',
            'email.email' => 'Informe um E-mail válido para o campo E-mail.',
            'cep.required' => 'O campo CEP é obrigatório.',
            'logradouro.required' => 'O campo Logradouro é obrigatório.',
            'bairro.required' => 'O campo Bairro é obrigatório.',
            'cidade.required' => 'O campo Cidade é obrigatório.',
            'estado.required' => 'O campo Estado é obrigatório.',
        ]);

        TomadorServico::create([
            'nome' => $request->nome, 
            'email' => $request->email,
            'cnpj' => $request->cnpj,
            'telefone' => $request->telefone,
            'site' => $request->site,
            'cep' => $request->cep,
            'logradouro' => $request->logradouro,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'empresa_id' => $empresaId,
        ]);

        return redirect()->route('empresas.cliente.index')->with('success', 'Cliente cadastrado com sucesso!');
    }
}
