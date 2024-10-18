@extends('holdings.layout.admin')

@section('content')
    <x-alert />

    <h1>Perfil {{ $holding->nome }}</h1>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <!-- Informações do Usuário -->
                <div class="card">
                    <div class="card-header">
                        <h4>Informações {{ $holding->nome }}</h4>
                    </div>
                    <div class="card-body">
                        <form>
                            <label class="form-label">Nome</label>
                            <input type="text" class="form-control" id="name" value="{{ $holding->nome }}" readonly>

                            <label class="form-label">CNPJ</label>
                            <input type="text" class="form-control" id="email" value="{{ $holding->cnpj }}" readonly>

                            <label for="role" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="role" value="{{ $holding->email }}"
                                readonly>

                            <label class="form-label">telefone</label>
                            <input type="text" class="form-control" id="role" value="{{ $holding->telefone }}"
                                readonly>

                            <label class="form-label">Colaboradores</label>
                            <input type="text" class="form-control" id="email"
                                value="{{ $colaboradores->usuarios->count() }}" readonly>


                            <label class="form-label">Endereço</label>
                            <input type="text" class="form-control" id="cep"
                                value="{{ $holding->endereco }}"readonly>
                        </form>
                    </div>

                    <a href="{{ route('holdings.holding_profile.edit') }}">
                        <button class="btn btn-primary">Editar Perfil</button>
                    </a>
                    <a href="{{ route('holdings.holding_profile.colaboradores') }}">
                        <button class="btn btn-primary">Colaboradores</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
