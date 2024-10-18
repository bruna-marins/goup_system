@extends('holdings.layout.admin')

@section('content')
    
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">Cadastrar Novo Cliente</h1>

                <form class="forms-sample" action="{{ route('holdings.clientes.store') }}" method="POST">
                    @csrf
                    @method('POST')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName1">Nome</label>
                                <input type="text" name="nome" id="nome" placeholder="Nome" value="{{ old('name') }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputName1">CNPJ</label>
                                <input type="text" name="cnpj" id="cnpj" placeholder="CNPJ" value="{{ old('name') }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputName1">Telefone</label>
                                <input type="text" name="telefone" id="telefone" placeholder="Telefone" value="{{ old('name') }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName1">E-mail</label>
                                <input type="text" name="email" id="email" placeholder="E-mail" value="{{ old('name') }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName1">Endereço</label>
                                <input type="text" name="endereco" id="endereco" placeholder="Endereço" value="{{ old('name') }}" class="form-control">
                            </div>
                        </div>                        
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary me-2">Cadastrar</button>
                        <button type="reset" class="btn btn-light">Cancelar</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection