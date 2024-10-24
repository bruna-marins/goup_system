@extends('holdings.layout.admin')

@section('content')
    <!-- Cabeçalho -->
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Editar Usuário</h3>
        </div>
    </div>
    <!-- Cabeçalho -->

    <x-alert />

    <!-- COnteudo -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <!--Inserir o COnteudo da página -->
                    <form action="{{ route('holdings.usuario.update', ['usuario' => $usuario->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Nome Completo </label>
                                <input type="text" name="name" id="name"
                                    value="{{ old('name', $usuario->name) }}" class="form-control">
                            </div>

                            <div class="form-group col-md-2">
                                <label>CPF </label>
                                <input type="text" name="cpf" id="cpf"
                                    value="{{ old('cpf', $usuario->name) }}" class="form-control">
                            </div>
                        
                            <div class="form-group col-md-2">
                                <label>Data de Nascimento </label>
                                <input type="text" name="nascimento" id="nascimento"
                                    value="{{ old('nascimento', $usuario->name) }}" class="form-control">
                            </div>

                            <div class="form-group col-md-2">
                                <label>Telefone </label>
                                <input type="text" name="telefone" id="telefone"
                                    value="{{ old('telefone', $usuario->name) }}" class="form-control">
                            </div>

                            <div class="form-group col-md-4">
                                <label>E-mail </label>
                                <input type="text" name="email" id="email"
                                    value="{{ old('email', $usuario->email) }}" class="form-control">
                            </div>                            
                        
                            <div class="form-group col-md-4">
                                <label>Cargo/Função </label>
                                <input type="text" name="cargo" id="cargo"
                                    value="{{ old('cargo', $usuario->name) }}" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Departamento </label>
                                <input type="text" name="departamento" id="departamento"
                                    value="{{ old('departamento', $usuario->name) }}" class="form-control">
                            </div>                                                        
                        </div>

                        <div class="row pt-4">
                            <div class="col-md-12">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-secondary">Editar</button>
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
    <!-- COnteudo -->
@endsection