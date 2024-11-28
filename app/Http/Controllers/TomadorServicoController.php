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

        return view('empresas.tomador.index', compact('clientes'));
    }

    public function create()
    {

        return view('empresas.tomador.create');
    }

    public function store(Request $request)
    {
        $empresaId = Auth::user()->empresa_id;

        $request->validate([
            'nome' => 'required|string|max:255',
            'cnpj' => 'nullable|cnpj',
            'telefone' => 'required',
            'email' => 'required|email',
            'razao_social' => 'required',
            'data_abertura' => 'nullable',
            'site' => 'nullable|url',
            'inscricao_municipal' => 'nullable',
            'cep' => 'required',
            'logradouro' => 'required',
            'numero' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'cnae' => 'nullable',
            'capital_social' => 'nullable',
            'faturamento_anual' => 'required',
            'responsavel_contabil' => 'nullable',
            'codigo_tributacao' => 'nullable',
            'aliquota_fiscais' => 'nullable',
            'natureza_juridica' => 'nullable',
            'regime_tributario' => 'nullable',
        ], [
            // Mensagens de erro
            'nome.required' => 'O campo Nome é obrigatório.',
            'cnpj.cnpj' => 'Informe um CNPJ válido para o campo CNPJ.',
            'telefone.required' => 'O campo Telefone é obrigatório.',
            'email.required' => 'O campo E-mail é obrigatório.',
            'email.email' => 'Informe um E-mail válido para o campo E-mail.',
            'site.url' => 'Informe uma URL válida.',
            'cep.required' => 'O campo CEP é obrigatório.',
            'logradouro.required' => 'O campo Logradouro é obrigatório.',
            'numero.required' => 'O campo Número é obrigatório.',
            'bairro.required' => 'O campo Bairro é obrigatório.',
            'cidade.required' => 'O campo Cidade é obrigatório.',
            'estado.required' => 'O campo Estado é obrigatório.',
        ]);

        TomadorServico::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'nome_fantasia' => $request->nome_fantasia,
            'cnpj' => $request->cnpj,
            'telefone' => $request->telefone,
            'site' => $request->site,
            'cep' => $request->cep,
            'numero' => $request->numero,
            'logradouro' => $request->logradouro,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'complemento' => $request->complemento,
            'regime_tributario' => $request->regime_tributario,
            'data_abertura' => $request->data_abertura,
            'inscricao_municipal' => $request->inscricao_municipal,
            'natureza_juridica' => $request->natureza_juridica,
            'cnae' => $request->cnae,
            'capital_social' => $request->capital_social,
            'aliquotas_fiscais' => $request->aliquotas_fiscais,
            'faturamento_anual' => $request->faturamento_anual,
            'responsavel_contabil' => $request->responsavel_contabil,
            'codigo_tributacao' => $request->codigo_tributacao,
            'empresa_id' => $empresaId,
        ]);

        return redirect()->route('empresas.tomador.index')->with('success', 'tomador cadastrado com sucesso!');
    }


    public function edit($tomadorservico)
    {
        $cliente = TomadorServico::findOrFail($tomadorservico);

        return view('empresas.tomador.edit', compact('cliente'));
    }

}
