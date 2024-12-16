<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsuarioRequest;
use App\Models\Empresa;
use App\Models\Holding;
use App\Models\HoldingUser;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsuarioController extends Controller
{
    public function indexEmpresa(){

        // Recuperar do banco de dados as informações do usuário logado
        $empresaId = Auth::user()->empresa_id;

        $empresa = Empresa::where('id', $empresaId)->get()->first();

        $usuarios = User::where('empresa_id', $empresaId)->get();

        return view('empresas.usuario.index', compact('usuarios', 'empresa'));
    }


    public function showEmpresa(User $usuario){

        $empresaId = Auth::user()->empresa_id;
        $empresa = Empresa::where('id', $empresaId)->get()->first();

        return view('empresas.usuario.show', compact('empresa'), ['user' => $usuario]);
    }


    public function createEmpresa(){

        //$roles = Role::pluck('name')->all();
        //return view('usuario.create', ['roles' => $roles]);

        return view('empresas.usuario.create');
    }


    public function storeEmpresa(Request $request){

        $empresaId = Auth::user()->empresa_id;

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $usuario = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'empresa_id' => $empresaId,
        ]);

        return redirect()->route('empresas.usuario.index')->with('success', 'Usuário cadastrado com sucesso!');
    }


    public function editEmpresa(User $usuario){

        //$roles = Role::pluck('name')->all();
        //$usuarioRoles = $usuario->roles->pluck('name')->first();
        //return view('usuario.edit', ['usuario' => $usuario, 'roles' => $roles, 'usuarioRoles' => $usuarioRoles]);

        return view('empresas.usuario.edit', ['usuario' => $usuario]);

    }


    public function updateEmpresa(Request $request, User $usuario){

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        // Atualiza os dados do usuário
        $usuario->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('empresas.usuario.show', ['usuario' => $request->usuario])->with('success', 'Usuário editado!');
    }


    public function editPasswordEmpresa(){

        // Recuperar do banco de dados as informações do usuário logado
        $usuario = User::where('id', Auth::id())->first();

        // Carrega a view
        return view('empresas.usuario.edit-password', ['user' => $usuario]);
    }


    public function updatePasswordEmpresa(Request $request)
    {
        // Recuperar do banco de dados as informações do usuário logado
        $usuario = User::where('id', Auth::id())->first();


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

        return redirect()->route('empresas.usuario.show', ['usuario' => $usuario->id])->with('success', 'Senha atualizada com sucesso!');
    }


    public function destroyEmpresa(User $usuario){

        try{
            //Excluir registro
            $usuario->delete();

            // Remove todos os papéis atribuídos ao usuário
            $usuario->syncRoles([]);

            //Redirecionar o usuário
            return redirect()->route('empresas.usuario.index')->with('success', 'Usuário excluido com sucesso!');
        } catch(Exception $e){
            return redirect()->route('empresas.usuario.index')->with('error', 'Usuário não excluído!');
        }

    }
}

