<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    public function indexCliente()
    {

        $clientes = Cliente::all();

        return view('tomadores.clientes.index', compact('clientes'));
    }

    public function showClienteCpf($cliente)
    {
        $dadosCliente = Cliente::findOrFail($cliente);

        return view('tomadores.clientes.showCpf', ['cliente' => $dadosCliente->id], compact('dadosCliente'));
    }

    public function createClienteCpf()
    {

        return view('tomadores.clientes.createCpf');
    }

    public function storeClienteCpf(Request $request)
    {
        $tomadorId = Auth::user()->id;

        // Validações
        $request->validate([
            'nome' => 'required|string|max:255',
            'sobrenome' => 'required|string|max:255',
            'cpf' => 'required|string',
            'telefone' => 'required|string|max:20',
            'email' => 'required|email',
            'site' => 'nullable|url|max:255',
        ], [
            'nome.required' => 'O campo Nome é obrigatório.',
            'sobrenome.required' => 'O campo Sobrenome é obrigatório.',
            'cpf.required' => 'O campo CPF é obrigatório.',
            'telefone.required' => 'O campo Telefone é obrigatório.',
            'email.required' => 'O campo E-mail é obrigatório.',
            'email.email' => 'O E-mail informado não é válido.',
            'site.url' => 'O campo Site deve conter uma URL válida.',
        ]);

        // Cadastra o cliente
        Cliente::create([
            'nome' => $request->nome,
            'sobrenome' => $request->sobrenome,
            'cpf' => $request->cpf,
            'telefone' => $request->telefone,
            'email' => $request->email,
            'site' => $request->site,
            'tomador_servico_id' => $tomadorId,
        ]);

        // Retorna sucesso
        return redirect()->route('tomadores.clientes.index')->with('success', 'Cliente cadastrado com sucesso!');
    }

    public function editClienteCpf($cliente)
    {
        $dadosCliente = Cliente::findOrFail($cliente);

        return view('tomadores.clientes.editCpf', ['cliente' => $dadosCliente->id], compact('dadosCliente'));
    }

    public function updateClienteCpf(Request $request, Cliente $cliente)
    {
        // Validações dos campos
        $request->validate([
            'nome' => 'required|string|max:255',
            'sobrenome' => 'required|string|max:255',
            'cpf' => 'required|string',
            'telefone' => 'required|string|max:20',
            'email' => 'required|email',
            'site' => 'nullable|url|max:255',
        ], [
            'nome.required' => 'O campo Nome é obrigatório.',
            'sobrenome.required' => 'O campo Sobrenome é obrigatório.',
            'cpf.required' => 'O campo CPF é obrigatório.',
            'cpf.unique' => 'O CPF informado já está cadastrado.',
            'telefone.required' => 'O campo Telefone é obrigatório.',
            'email.required' => 'O campo E-mail é obrigatório.',
            'email.email' => 'O E-mail informado não é válido.',
            'email.unique' => 'O E-mail informado já está cadastrado.',
            'site.url' => 'O campo Site deve conter uma URL válida.',
        ]);

        // Atualização do cliente
        $cliente->update($request->only([
            'nome',
            'sobrenome',
            'cpf',
            'telefone',
            'email',
            'site',
        ]));

        // Retorna sucesso
        return redirect()->route('tomadores.clientes.showCpf', ['cliente' => $cliente->id])->with('success', 'Cliente atualizado com sucesso!');
    }

    public function showClienteCnpj($cliente)
    {
        $dadosCliente = Cliente::findOrFail($cliente);

        return view('tomadores.clientes.showCnpj', ['cliente' => $dadosCliente->id], compact('dadosCliente'));
    }

    public function createClienteCnpj()
    {

        return view('tomadores.clientes.createCnpj');
    }

    public function storeClienteCnpj(Request $request)
    {
        $tomadorId = Auth::user()->id;

        // Validações dos campos
        $request->validate([
            'nome' => 'required|string|max:255',
            'razao_social' => 'required|string|max:255',
            'cnpj' => 'required|string',
            'telefone' => 'required|string|max:20',
            'email' => 'required|email',
            'site' => 'nullable|url|max:255',
        ], [
            'nome.required' => 'O campo Nome Fantasia é obrigatório.',
            'razao_social.required' => 'O campo Razão Social é obrigatório.',
            'cnpj.required' => 'O campo CNPJ é obrigatório.',
            'cnpj.size' => 'O CNPJ deve ter exatamente 14 caracteres.',
            'telefone.required' => 'O campo Telefone é obrigatório.',
            'email.required' => 'O campo E-mail é obrigatório.',
            'email.email' => 'O E-mail informado não é válido.',
            'site.url' => 'O campo Site deve conter uma URL válida.',
        ]);

        // Cadastro de cliente
        Cliente::create([
            'nome' => $request->nome,
            'razao_social' => $request->razao_social,
            'cnpj' => $request->cnpj,
            'telefone' => $request->telefone,
            'email' => $request->email,
            'site' => $request->site,
            'tomador_servico_id' => $tomadorId,
        ]);

        // Retorna sucesso
        return redirect()->route('tomadores.clientes.index')->with('success', 'Cliente cadastrado com sucesso!');
    }

    public function editClienteCnpj($cliente)
    {
        $dadosCliente = Cliente::findOrFail($cliente);

        return view('tomadores.clientes.editCnpj', ['cliente' => $dadosCliente->id], compact('dadosCliente'));
    }

    public function updateClienteCnpj(Request $request, Cliente $cliente)
    {
        // Validações dos campos
        $request->validate([
            'nome' => 'required|string|max:255',
            'razao_social' => 'required|string|max:255',
            'cnpj' => 'required|string',
            'telefone' => 'required|string|max:20',
            'email' => 'required|email',
            'site' => 'nullable|url|max:255',
        ], [
            'nome.required' => 'O campo Nome Fantasia é obrigatório.',
            'razao_social.required' => 'O campo Razão Social é obrigatório.',
            'cnpj.required' => 'O campo CNPJ é obrigatório.',
            'cnpj.unique' => 'O CNPJ informado já está cadastrado.',
            'telefone.required' => 'O campo Telefone é obrigatório.',
            'email.required' => 'O campo E-mail é obrigatório.',
            'email.email' => 'O E-mail informado não é válido.',
            'email.unique' => 'O E-mail informado já está cadastrado.',
            'site.url' => 'O campo Site deve conter uma URL válida.',
        ]);

        // Atualização da empresa
        $cliente->update($request->only([
            'nome',
            'razao_social',
            'cnpj',
            'telefone',
            'email',
            'site',
        ]));

        // Retorna sucesso
        return redirect()->route('tomadores.clientes.showCnpj', ['cliente' => $cliente->id])->with('success', 'Cliente atualizada com sucesso!');
    }

    public function destroyCliente() {}
}
