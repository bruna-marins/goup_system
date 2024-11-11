@extends('empresas.layout.admin')

@section('content')
    <!-- Cabeçalho -->
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Cadastrar nova Empresa</h3>
        </div>
    </div>
    <!-- Cabeçalho -->

    <!-- COnteudo -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">

                            <x-alert />
                            
                            <!--Inserir o COnteudo da página -->
                            <form class="forms-sample" action="{{ route('empresas.cliente.store') }}" method="POST">
                                @csrf
                                @method('POST')

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <h4> Informações do Cliente </h4>
                                        <hr />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Nome</label>
                                            <input type="text" name="nome" id="nome" value="{{ old('nome') }}"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>CNPJ</label>
                                            <input type="text" name="cnpj" id="cnpj" value="{{ old('cnpj') }}"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>CPF</label>
                                            <input type="text" name="cpf" id="cpf" value="{{ old('cpf') }}"
                                                class="form-control">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <h4> Endereço </h4>
                                        <hr />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>CEP</label>
                                            <input type="text" name="cep" id="cep" value="{{ old('cep') }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Estado</label>
                                            <input type="text" name="estado" id="estado" value="{{ old('estado') }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Cidade</label>
                                            <input type="text" name="cidade" id="cidade" value="{{ old('cidade') }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Bairro</label>
                                            <input type="text" name="bairro" id="bairro" value="{{ old('bairro') }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Logradouro</label>
                                            <input type="text" name="logradouro" id="logradouro"
                                                value="{{ old('logradouro') }}" class="form-control">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <h4> Contato </h4>
                                        <hr />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Telefone</label>
                                            <input type="text" name="telefone" id="telefone"
                                                value="{{ old('telefone') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>E-mail</label>
                                            <input type="text" name="email" id="email"
                                                value="{{ old('email') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Site</label>
                                            <input type="text" name="site" id="site"
                                                value="{{ old('site') }}" class="form-control">
                                        </div>
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
        </div>
    </div>
@endsection
