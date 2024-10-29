@extends('holdings.layout.admin')

@section('content')
    <x-alert />

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
                            <div class="form-group col-md-8">
                                <label>Nome Completo </label>
                                <input type="text" class="form-control" id="nome_completo"
                                    value="{{ $user->nome_completo }}"readonly>
                            </div>

                            <div class="form-group col-md-4">
                                <label>CPF </label>
                                <input type="text" name="cpf" class="form-control" id="cpf"
                                    value="{{ $user->cpf }}" readonly>
                            </div>

                            <div class="form-group col-md-3">
                                <label>Data de Nascimento </label>
                                <input type="text" name="nascimento" class="form-control" id="data_nascimento"
                                    value="{{ $user->data_nascimento }}" readonly>
                            </div>

                            <div class="form-group col-md-3">
                                <label>Telefone </label>
                                <input type="text" name="telefone" class="form-control" id="telefone"
                                    value="{{ $user->telefone }}" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label>E-mail </label>
                                <input type="email" class="form-control" id="email" value="{{ $user->email }}"
                                    readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Cargo/Função </label>
                                <input type="text" name="cargo" class="form-control" id="cargo"
                                    value="{{ $user->cargo }}" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Departamento </label>
                                <input type="text" name="departamento" class="form-control" id="departamento"
                                    value="{{ $user->departamento }}" readonly>
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <h4> Informações de Acesso ao Sistema </h4>
                                <hr />
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Nome de Usuário </label>
                                <input type="text" class="form-control" id="name"
                                    value="{{ $user->name }}"readonly>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Senha </label>
                                <input type="password" name="password" id="password" value="{{ old('name') }}"
                                    class="form-control">
                            </div>

                            <div class="form-group col-md-3">
                                <label>Nível de Acesso</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">Administrador</option>
                                    <option value="2"> Contador</option>
                                    <option value="3">Usuário</option>
                                    <option value="3">Padrão</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Status da Conta</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">Ativo</option>
                                    <option value="2"> Inativor</option>
                                </select>
                            </div>
                        </div>








                    </form>

                    <div class="row pt-4">
                        <div class="col-md-12">
                            <div class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('holdings.usuario.edit', ['usuario' => $user->id]) }}">
                                        <button class="btn btn-secondary">Editar Perfil</button>
                                    </a>
                                </div>
                                <div class="btn-group" role="group" aria-label="Basic example">
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
