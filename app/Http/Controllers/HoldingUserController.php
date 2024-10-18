<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Holding;
use App\Models\HoldingUser;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HoldingUserController extends Controller
{
    public function indexHolding()
    {

        // Recuperar do banco de dados as informações do usuário logado
        $holdingId = Auth::user()->holding_id;

        $holding = Holding::where('id', $holdingId)->get()->first();

        $usuarios = HoldingUser::where('holding_id', $holdingId)->get();

        return view('holdings.usuario.index', compact('usuarios', 'holding'));
    }

    public function showHolding(HoldingUser $usuario)
    {

        // Recuperar do banco de dados as informações do usuário logado
        $holdingId = Auth::user()->holding_id;
        $holding = Holding::where('id', $holdingId)->get()->first();

        return view('holdings.usuario.show', compact('holding'), ['user' => $usuario]);
    }

    public function createHolding()
    {

        return view('holdings.usuario.create');
    }

    public function storeHolding(Request $request)
    {

        $holdingId = Auth::user()->holding_id;

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $usuario = HoldingUser::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'holding_id' => $holdingId,
        ]);

        return redirect()->route('holdings.usuario.index')->with('success', 'Cadastrado com sucesso!');
    }

    public function editHolding(HoldingUser $usuario)
    {

        return view('holdings.usuario.edit', ['usuario' => $usuario]);
    }

    public function updateHolding(Request $request, HoldingUser $usuario)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        // Atualiza os dados do usuário
        $usuario->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('holdings.usuario.show', ['usuario' => $request->usuario])->with('success', 'Usuário editado!');
    }

    public function editPasswordHolding()
    {
        $usuario = HoldingUser::where('id', Auth::id())->first();

        // Carrega a view
        return view('holdings.usuario.edit-password', ['user' => $usuario]);
    }

    public function updatePasswordHolding(Request $request)
    {
        $usuario = HoldingUser::where('id', Auth::id())->first();

        // Validar o upload
        $request->validate([
            'senha_atual' => 'required',
            'password' => 'required|min:6',
        ], [
            'senha_atual.required' => 'Você precisa informar sua senha atual.',
            'nova_senha.required' => 'Você precisa informar uma nova senha.',
            'password.min' => 'A senha deve conter no mínimo :min caracteres.'
        ]);

        // Verifica se a senha atual está correta
        if (!Hash::check($request->senha_atual, Auth::user()->password)) {
            return back()->withErrors(['senha_atual' => 'A senha atual está incorreta.']);
        }

        // Editar as informações no banco de dados
        $usuario->update([
            'password' => $request->password,
        ]);

        return redirect()->route('holdings.usuario.show', ['usuario' => $usuario->id])->with('success', 'Senha atualizada com sucesso!');
    }

    public function destroyHolding(HoldingUser $usuario)
    {

        try {
            //Excluir registro
            $usuario->delete();

            //Redirecionar o usuário
            return redirect()->route('holdings.usuario.index')->with('success', 'Usuário excluido com sucesso!');
        } catch (Exception $e) {
            return redirect()->route('holdings.usuario.index')->with('error', 'Usuário não excluído!');
        }
    }
}
