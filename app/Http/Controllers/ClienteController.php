<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    public function indexEmpresa(){

        // Recuperar do banco de dados as informações do usuário logado
        $holdingId = Auth::user()->holding_id;
        $empresas = Empresa::where('holding_id', $holdingId)->get();

        return view('holdings.clientes.index', compact('empresas'));
    }

    public function showEmpresa($cliente){

        $empresa = Empresa::findOrFail($cliente);

        return view('holdings.clientes.show', ['cliente' => $empresa->id], compact('empresa'));
    }

    public function createEmpresa(){

        // Recuperar do banco de dados as informações do usuário logado
        $holdingId = Auth::user()->holding_id;
        $empresa = Empresa::where('holding_id', $holdingId)->get()->first();

        return view('holdings.clientes.create', ['cliente' => $empresa->id], compact('empresa'));
    }

    public function storeEmpresa(Request $request){

        // Recuperar do banco de dados as informações do usuário logado
        $holdingId = Auth::user()->holding_id;
        $empresa = Empresa::where('holding_id', $holdingId)->get()->first();

        $request->validate([
            'nome' => 'required',
            'email' => 'required|email|unique:users',
            'cnpj' => 'required',
            'endereco' => 'required',
            'telefone' => 'required'
        ]);

        Empresa::create([
            'nome' => $request->nome, 
            'email' => $request->email,
            'cnpj' => $request->cnpj,
            'endereco' => $request->endereco,
            'telefone' => $request->telefone,
            'holding_id' => $holdingId,
        ]);

        return redirect()->route('holdings.clientes.index');
    }

    public function editEmpresa(){

        // Recuperar do banco de dados as informações do usuário logado
        $holdingId = Auth::user()->holding_id;
        $empresa = Empresa::where('holding_id', $holdingId)->get()->first();

        return view('holdings.clientes.edit', ['cliente' => $empresa->id], compact('empresa'));
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

        return redirect()->route('holdings.clientes.show', ['cliente' => $empresa->id])->with('success', 'Perfil editado com sucesso!');
    }

    public function colaboradoresEmpresa($cliente){

        $empresa = Empresa::where('id', $cliente)->get()->first();

        // Recupera os usuários da holding, ordenando o usuário logado como o primeiro
        $colaboradores = User::where('empresa_id', $cliente)->get();

        // Carrega a view
        return view('holdings.clientes.colaboradores', ['empresa' => $empresa, 'colaboradores' => $colaboradores]);
    }
}
