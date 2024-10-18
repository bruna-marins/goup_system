@extends('holdings.layout.admin')

@section('content')
    <div class="container mt-5">
        <h2>Editar Perfil {{ $holding->nome }}</h2>

        <x-alert />

        <form action="{{ route('holdings.holding_profile.update', $holding->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Nome do Usuário -->
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome"
                    value="{{ old('nome', $holding->nome) }}">
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">CNPJ</label>
                <input type="text" class="form-control" id="cnpj" name="cnpj"
                    value="{{ old('cnpj', $holding->cnpj) }}">
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email"
                    value="{{ old('email', $holding->email) }}">
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone"
                    value="{{ old('telefone', $holding->telefone) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Endereço</label>
                <input type="text" class="form-control" id="endereco" name="endereco"
                    value="{{ old('endereco', $holding->endereco) }}">
            </div>

            <!-- Botão para Salvar -->
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </form>
    </div>
@endsection
