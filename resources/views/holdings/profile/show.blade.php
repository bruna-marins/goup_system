@extends('holdings.layout.admin')

@section('content')
    <x-alert />

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <!-- Foto de Perfil -->
                <div class="card">
                    <div class="card-body text-center">

                        <!-- Último Acesso -->
                        <p class="small">
                            Último Acesso:
                            @if (Auth::user()->last_login_at)
                                {{ Auth::user()->last_login_at->diffForHumans() }}
                            @else
                                Nunca logado
                            @endif
                        </p>

                        <img src="{{ $user->foto_perfil ? asset('storage/' . $user->foto_perfil) : asset('imagens/default-avatar.png') }}"
                            alt="Foto de perfil" width="150" height="150" class="rounded-circle img-fluid">


                        <h4 class="mt-3">{{ Auth::user()->name }}</h4>

                        <p>{{ $holding->nome }}</p>

                        <!-- Botão para alterar a foto de perfil -->
                        <a href="{{ route('holdings.profile.edit-foto') }}">
                            <button type="button" class="btn btn-primary mt-3">
                                Alterar Foto de Perfil
                            </button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <!-- Informações do Usuário -->
                <div class="card">
                    <div class="card-header">
                        <h4>Minhas Informações</h4>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label for="name" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="name" value="{{ Auth::user()->name }}"
                                    readonly>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" class="form-control" id="email" value="{{ Auth::user()->email }}"
                                    readonly>
                            </div>
                        </form>
                        <div class="mb-3">
                            <a href="{{ route('holdings.profile.edit') }}">
                                <button class="btn btn-primary"> Editar Perfil</button>
                            </a>
                            <a href="{{ route('holdings.holding_profile.show') }}">
                                <button class="btn btn-primary">Perfil {{ $holding->nome }}</button>
                            </a>
                            <a href="{{ route('holdings.profile.edit-password') }}">
                                <button class="btn btn-danger">Alterar Senha</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
