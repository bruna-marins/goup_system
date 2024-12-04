<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmpresaController extends Controller
{
    public function indexEmpresa(){

        // Recuperar do banco de dados as informações do usuário logado
        $holdingId = Auth::user()->holding_id;
        $empresas = Empresa::where('holding_id', $holdingId)->get();

        return view('holdings.empresas.index', compact('empresas'));
    }

    public function showEmpresa($empresa){

        $empresa = Empresa::findOrFail($empresa);

        return view('holdings.empresas.show', ['empresa' => $empresa->id], compact('empresa'));
    }

    public function createEmpresa(){

        // Recuperar do banco de dados as informações do usuário logado
        $holdingId = Auth::user()->holding_id;
        $empresa = Empresa::where('holding_id', $holdingId)->get()->first();

        return view('holdings.empresas.create', ['empresa' => $empresa->id], compact('empresa'));
    }

    public function storeEmpresa(Request $request){

        // Recuperar do banco de dados as informações do usuário logado
        $holdingId = Auth::user()->holding_id;
        $empresa = Empresa::where('holding_id', $holdingId)->get()->first();

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

        Empresa::create([
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
            'holding_id' => $holdingId,
        ]);

        return redirect()->route('holdings.empresas.index');
    }

    public function editEmpresa(){

        // Recuperar do banco de dados as informações do usuário logado
        $holdingId = Auth::user()->holding_id;
        $empresa = Empresa::where('holding_id', $holdingId)->get()->first();

        return view('holdings.empresas.edit', ['empresa' => $empresa->id], compact('empresa'));
    }

    public function updateEmpresa(Request $request, Empresa $empresa){

        // Recuperar do banco de dados as informações do usuário logado
        $holdingId = Auth::user()->holding_id;
        $empresa = Empresa::where('holding_id', $holdingId)->get()->first();


        $request->validate([
            'nome' => 'required|string|max:255',
            'cnpj' => 'required',
            'telefone' => 'required',
            'email' => 'required|email|',
            'endereco' => 'required',
        ],[
            // Mensagens de erro
            'nome.required' => 'O campo Nome é obrigatório.',
            'cnpj.required' => 'O campo CNPJ é obrigatório.',
            'telefone.required' => 'O campo Telefone é obrigatório.',
            'email.required' => 'O campo E-mail é obrigatório.',
            'email.email' => 'Cnpj inválido.',
            'email.unique' => 'Esse E-mail já está sendo usado.',
            'endereco.required' => 'O campo Endereço é obrigatório.',
        ]);

        $empresa->update([
            'nome' => $request->nome,
            'cnpj' => $request->cnpj,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'endereco' => $request->endereco,
        ]);

        return redirect()->route('holdings.empresas.show', ['empresa' => $empresa->id])->with('success', 'Perfil editado com sucesso!');
    }

    public function colaboradoresEmpresa($empresa){

        $empresa = Empresa::where('id', $empresa)->get()->first();

        // Recupera os usuários da holding, ordenando o usuário logado como o primeiro
        $colaboradores = User::where('empresa_id', $empresa)->get();

        // Carrega a view
        return view('holdings.empresas.colaboradores', ['empresa' => $empresa, 'colaboradores' => $colaboradores]);
    }
}
