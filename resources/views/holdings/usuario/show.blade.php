@extends('holdings.layout.admin')

@section('content')
    <x-alert />

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <!-- Foto de Perfil -->
                <div class="card">
                    <div class="card-body text-center">

                        <img src="{{ $user->foto_perfil ? asset('storage/' . $user->foto_perfil) : asset('imagens/default-avatar.png') }}"
                            alt="Foto de perfil" width="183" height="183" class="rounded-circle img-fluid ">

                        <h4 class="mt-3">{{ $user->name }}</h4>

                        <p>{{ $holding->nome }}</p>

                        <!-- Último Acesso -->
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover mt-3">
                                <tbody>
                                    <tr>
                                        <td>
                                            <strong>Último Acesso:</strong>
                                        </td>
                                        <td>
                                            @if ($user->last_login_at)
                                                {{ $user->last_login_at->diffForHumans() }}
                                            @else
                                                Nunca logado
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <!-- Informações do Usuário -->
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2">
                            <div>
                                <h4 class="fw-bold mb-3">Dados Usuário</h4>
                            </div>
                            <!-- botao -->
                            <div class="ms-md-auto py-2 py-md-0">
                                <div class="btn-group" role="group" aria-label="Basic example">

                                    <form action="{{ route('holdings.usuario.destroy', ['usuario' => $user->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-secondary btn-sm" title="Excluir Produto"
                                            onclick="return confirm('Deseja excluir o item permanentemente?')"><i
                                                class="fa-solid fa-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                            <!-- botao -->
                        </div>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Nome</label>
                                    <input type="text" class="form-control" id="name"
                                        value="{{ $user->name }}"readonly>
                                </div>

                                <div class="form-group col-md-12">
                                    <label>E-mail</label>
                                    <input type="email" class="form-control" id="email" value="{{ $user->email }}"
                                        readonly>
                                </div>
                            </div>

                        </form>

                        <div class="row pt-4">
                            <div class="col-md-12">
                                <div class="text-center">
                                    <a href="{{ route('holdings.usuario.edit', ['usuario' => $user->id]) }}">
                                        <button class="btn btn-secondary">Editar Perfil</button>
                                    </a>
                                    <a href="{{ route('holdings.usuario.edit-password', ['usuario' => $user->id]) }}">
                                        <button class="btn btn-secondary">Alterar Senha</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
