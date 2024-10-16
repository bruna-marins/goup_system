@extends('holdings.layout.admin')

@section('content')
  
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Editar a Empresa - <strong> {{ $holding->nome }}  </strong></h1>
                
                <!-- alerta -->
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <p class="card-description">
                        Add tags <code>&lt;h1&gt;</code> to <code>&lt;h6&gt;</code> or class <code>.h1</code> to <code>.h6</code>
                    </p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <!-- alerta -->
            

                <form action="{{ route('holdings.holding.update', ['holding' => $holding->id]) }}" method="POST">
                    @csrf
                    @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName1">Nome da Holding</label>
                            <input type="text" name="nome" id="nome" placeholder="Nome da Holding" value="{{ old('name', $holding->nome) }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="exampleInputName1">CNPJ</label>
                            <input type="text" name="cnpj" id="cnpj" placeholder="CNPJ" value="{{ old('name', $holding->cnpj) }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="exampleInputName1">Telefone</label>
                            <input type="text" name="telefone" id="telefone" placeholder="Telefone" value="{{ old('name', $holding->telefone) }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName1">E-mail</label>
                            <input type="text" name="email" id="email" placeholder="E-mail" value="{{ old('name', $holding->email) }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName1">Endereço</label>
                            <input type="text" name="endereco" id="endereco" placeholder="Endereço" value="{{ old('name', $holding->endereco) }}" class="form-control">
                        </div>
                    </div>                        
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary me-2">Editar</button>
                    <button type="reset" class="btn btn-light">Cancelar</button>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection