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
        $request->validate([
            'nome' => 'required|string|max:255',
            'cnpj' => 'required|cnpj',
            'telefone' => 'required',
            'site' => 'required|url',
            'email' => 'required|email',
            'nome_fantasia' => 'required',
            'data_abertura' => 'required',
            'inscricao_municipal' => 'required',
            'cep' => 'required',
            'logradouro' => 'required',
            'numero' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'cnae' => 'required',
            'capital_social' => 'required',
            'faturamento_anual' => 'required',
            'responsavel_contabil' => 'required',
            'codigo_tributacao' => 'required',
            'aliquota_fiscais' => 'required',
            'socio' => 'required',
            'cpf' => 'required|cpf',
            'participacao_societaria' => 'required',
            'cargo' => 'required',
            'natureza_juridica' => 'required',
            'regime_tributario' => 'required',
        ], [
            // Mensagens de erro
            'nome.required' => 'O campo Nome é obrigatório.',
            'cnpj.required' => 'O campo CNPJ é obrigatório.',
            'cnpj' => 'Informe um CNPJ válido para o campo CNPJ.',
            'telefone.required' => 'O campo Telefone é obrigatório.',
            'site.required' => 'O campo Site é obrigatório.',
            'site.url' => 'Informe uma URL válida para o campo Site.',
            'email.required' => 'O campo E-mail é obrigatório.',
            'email.email' => 'Informe um E-mail válido para o campo E-mail.',
            'nome_fantasia' => 'O campo Nome Fantasia é obrigatório.',
            'data_abertura' => 'O campo Data de Abertura é obrigatório.',
            'inscricao_municipal' => 'O campo Inscrição Municipal é obrigatório.',
            'cep' => 'O campo CEP é obrigatório.',
            'logradouro' => 'O campo Logradouro é obrigatório.',
            'numero' => 'O campo Número é obrigatório.',
            'bairro' => 'O campo Bairro é obrigatório.',
            'cidade' => 'O campo Cidade é obrigatório.',
            'estado' => 'O campo Estado é obrigatório.',
            'cnae' => 'O campo CNAE é obrigatório.',
            'capital_social' => 'O campo Capital Social é obrigatório.',
            'faturamento_anual' => 'O campo Faturamento Anual é obrigatório.',
            'responsavel_contabil' => 'O campo Responsável Contábil é obrigatório.',
            'codigo_tributacao' => 'O campo Código de Tributação é obrigatório.',
            'aliquota_fiscais' => 'O campo Alíquotas Fiscais é obrigatório.',
            'socio' => 'O campo Socio é obrigatório.',
            'cpf' => 'O campo CPF é obrigatório.',
            'cpf' => 'Informe um CPF válido para o campo CPF.',
            'participacao_societaria' => 'O campo Participação Societária é obrigatório.',
            'cargo' => 'O campo Cargo é obrigatório.',
            'natureza_juridica' => 'O campo Natureza Jurídica é obrigatório.',
            'regime_tributario' => 'O campo Regime Tributário é obrigatório.',
        ]);

        Holding::create($request->all());

        return redirect()->route('holdings.holding.index')->with('success', 'Holding cadastrada com sucesso!');
    }

    public function edit($holding)
    {
        $holding = Holding::findOrFail($holding);

        return view('holdings.holding.edit', compact('holding'));
    }

    public function update(Request $request, Holding $holding)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'cnpj' => 'required|cnpj',
            'telefone' => 'required',
            'site' => 'required|url',
            'email' => 'required|email',
            'nome_fantasia' => 'required',
            'data_abertura' => 'required',
            'inscricao_municipal' => 'required',
            'cep' => 'required',
            'logradouro' => 'required',
            'numero' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'cnae' => 'required',
            'capital_social' => 'required',
            'faturamento_anual' => 'required',
            'responsavel_contabil' => 'required',
            'codigo_tributacao' => 'required',
            'aliquota_fiscais' => 'required',
            'socio' => 'required',
            'cpf' => 'required|cpf',
            'participacao_societaria' => 'required',
            'cargo' => 'required',
            'natureza_juridica' => 'required',
            'regime_tributario' => 'required',
        ], [
            // Mensagens de erro
            'nome.required' => 'O campo Nome é obrigatório.',
            'cnpj.required' => 'O campo CNPJ é obrigatório.',
            'cnpj' => 'Informe um CNPJ válido para o campo CNPJ.',
            'telefone.required' => 'O campo Telefone é obrigatório.',
            'site.required' => 'O campo Site é obrigatório.',
            'site.url' => 'Informe uma URL válida para o campo Site.',
            'email.required' => 'O campo E-mail é obrigatório.',
            'email.email' => 'Informe um E-mail válido para o campo E-mail.',
            'nome_fantasia' => 'O campo Nome Fantasia é obrigatório.',
            'data_abertura' => 'O campo Data de Abertura é obrigatório.',
            'inscricao_municipal' => 'O campo Inscrição Municipal é obrigatório.',
            'cep' => 'O campo CEP é obrigatório.',
            'logradouro' => 'O campo Logradouro é obrigatório.',
            'numero' => 'O campo Número é obrigatório.',
            'bairro' => 'O campo Bairro é obrigatório.',
            'cidade' => 'O campo Cidade é obrigatório.',
            'estado' => 'O campo Estado é obrigatório.',
            'cnae' => 'O campo CNAE é obrigatório.',
            'capital_social' => 'O campo Capital Social é obrigatório.',
            'faturamento_anual' => 'O campo Faturamento Anual é obrigatório.',
            'responsavel_contabil' => 'O campo Responsável Contábil é obrigatório.',
            'codigo_tributacao' => 'O campo Código de Tributação é obrigatório.',
            'aliquota_fiscais' => 'O campo Alíquotas Fiscais é obrigatório.',
            'socio' => 'O campo Socio é obrigatório.',
            'cpf' => 'O campo CPF é obrigatório.',
            'cpf' => 'Informe um CPF válido para o campo CPF.',
            'participacao_societaria' => 'O campo Participação Societária é obrigatório.',
            'cargo' => 'O campo Cargo é obrigatório.',
            'natureza_juridica' => 'O campo Natureza Jurídica é obrigatório.',
            'regime_tributario' => 'O campo Regime Tributário é obrigatório.',
        ]);

        $holding->update($request->all());

        return redirect()->route('holdings.holding.show', $holding->id)->with('success', 'Holding editada com sucesso!');
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
