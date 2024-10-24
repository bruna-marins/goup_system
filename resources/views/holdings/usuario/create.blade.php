@extends('holdings.layout.admin')

@section('content')
    <!-- Cabeçalho -->
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Cadastrar Novo Usuário</h3>
        </div>
        <!-- botao -->
        <div class="ms-md-auto py-2 py-md-0">
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="{{ route('holdings.usuario.index') }}" class="btn btn btn-secondary btn-sm" title="Listar Usuários">
                    <i class="fa-solid fa-list"></i>
                </a>
            </div>
        </div>
        <!-- botao -->
    </div>
    <!-- Cabeçalho -->

    <x-alert />

    <!-- COnteudo -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <!--Inserir o COnteudo da página -->
                    <form action="{{ route('holdings.usuario.store') }}" method="POST">
                        @csrf
                        @method('POST')

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Nome Completo </label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}"
                                    class="form-control">
                            </div>

                            <div class="form-group col-md-2">
                                <label>CPF </label>
                                <input type="text" name="cpf" id="cpf" value="{{ old('name') }}"
                                    class="form-control">
                            </div>
                        
                            <div class="form-group col-md-2">
                                <label>Data de Nascimento </label>
                                <input type="date" name="nascimento" id="nascimento" value="{{ old('name') }}"
                                    class="form-control">
                            </div>

                            <div class="form-group col-md-2">
                                <label>Telefone </label>
                                <input type="text" name="telefone" id="telefone" value="{{ old('name') }}"
                                    class="form-control">
                            </div>

                            <div class="form-group col-md-4">
                                <label>E-mail </label>
                                <input type="text" name="email" id="email" value="{{ old('name') }}"
                                    class="form-control">
                            </div>                            
                        
                            <div class="form-group col-md-4">
                                <label>Cargo/Função </label>
                                <input type="text" name="cargo" id="cargo" value="{{ old('name') }}"
                                    class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Departamento </label>
                                <input type="text" name="departamento" id="departamento" value="{{ old('name') }}"
                                    class="form-control">
                            </div>                                                        
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <h4> Informações de Acesso ao Sistema </h4> <hr />
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>Nome de Usuário </label>
                                <input type="password" name="password" id="password" value="{{ old('name') }}"
                                    class="form-control">
                            </div>
                        
                            <div class="form-group col-md-3">
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

                        <div class="row pt-4">
                            <div class="col-md-12">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-secondary">Cadastrar</button>
                                    <button type="reset" class="btn btn-secondary">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--Inserir o COnteudo da página -->
                </div>
            </div>
        </div>
    </div>
@endsection
