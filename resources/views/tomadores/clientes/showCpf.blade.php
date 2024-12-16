@extends('tomadores.layout.admin')

@section('content')
    <div class="container">
        <h1>Detalhes do {{ $dadosCliente->nome . ' ' . $dadosCliente->sobrenome }}</h1>

        <form>
            <div class="form-group mb-3">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" class="form-control" value="{{ $dadosCliente->nome }}" readonly>
            </div>

            <div class="form-group mb-3">
                <label for="sobrenome">Sobrenome:</label>
                <input type="text" id="sobrenome" class="form-control" value="{{ $dadosCliente->sobrenome }}" readonly>
            </div>

            <div class="form-group mb-3">
                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" class="form-control" value="{{ $dadosCliente->cpf }}" readonly>
            </div>

            <div class="form-group mb-3">
                <label for="telefone">Telefone:</label>
                <input type="text" id="telefone" class="form-control" value="{{ $dadosCliente->telefone }}" readonly>
            </div>

            <div class="form-group mb-3">
                <label for="email">Email:</label>
                <input type="email" id="email" class="form-control" value="{{ $dadosCliente->email }}" readonly>
            </div>

            <div class="form-group mb-3">
                <label for="site">Site:</label>
                <input type="url" id="site" class="form-control" value="{{ $dadosCliente->site }}" readonly>
            </div>
        </form>
        <button class="btn btn-primary">
            <a href="#">
                Gerar Nota Fiscal
            </a>
        </button>
    </div>
@endsection
