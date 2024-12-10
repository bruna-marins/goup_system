<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function indexCliente(){

        $clientes = Cliente::all();

        return view('tomadores.clientes.index', compact('clientes'));
    }

    public function showCliente(){
        
    }

    public function createClienteCpf(){

        return view('tomadores.clientes.createCpf');
    }

    public function storeClienteCpf(){
        
    }

    public function editClienteCpf(){
        
    }
    
    public function updateClienteCpf(){
        
    }

    public function createClienteCnpj(){

        return view('tomadores.clientes.createCnpj');
    }

    public function storeClienteCnpj(){
        
    }

    public function editClienteCnpj(){
        
    }
    
    public function updateClienteCnpj(){
        
    }

    public function destroyCliente(){
        
    }

    
}
