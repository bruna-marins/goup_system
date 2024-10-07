@extends('layout.admin')

@section('content')

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <!-- topo da página -->
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center py-2">
                            <h2 class="text-center mb-4">Detalhes da Holding - <strong> {{ $holding->nome }} </strong></h2>
                        </div>
                    </div>
                </div>
                <!-- topo da página -->

                <div class="row">
                    <div class="col-md-4">
                        <address>
                            <p class="fw-bold"> CNPJ: </p>
                            <p class="mb-2">  {{ $holding->cnpj }} </p>
                            <p class="fw-bold"> Telefone: </p>
                            <p> {{ $holding->telefone }} </p>
                        </address>
                    </div>
                    <div class="col-md-4">
                        <address>
                            <p class="fw-bold"> E-mail: </p>
                            <p> {{ $holding->email }} </p>
                        </address>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <address>
                            <p class="fw-bold">  Endereço: </p>
                            <p>{{ $holding->endereco }}</p>
                        </address>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <!-- topo da página -->
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center py-2">
                            <h4 class="text-center mb-4">Empresas cadastradas nesta Holding</h4>
                            <a href="{{ route('holding.create') }}" class="btn btn-inverse-info btn-sm"title="Cadastrar Nova Holding">
                                <i class="fa-solid fa-plus btn-icon-prepend"></i>
                                Nova Holding
                            </a>
                        </div>
                    </div>
                </div>
                <!-- topo da página -->
                
                    <!-- Verificar se há empresas cadastradas -->
                    @if($holding->empresas->isEmpty())
                        <!-- alerta -->
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <p class="card-description">
                                Não há empresas cadastradas nesta holding.
                            </p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <!-- alerta -->
                    @else

                    <div class="table-responsive pt-3">
                        <table class="table table-striped project-orders-table table-hover">
                            <thead>
                                <tr>
                                    <th class="ms-5">ID</th>
                                    <th>Nome</th>
                                    <th>CNPJ</th>
                                    <th>Endereço</th>
                                    <th>Telefone</th>
                                    <th style="width: 100px;">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($holding->empresas as $empresa)
                                <tr>
                                    <tr>
                                        <td>{{ $empresa->id }}</td>
                                        <td>{{ $empresa->nome }}</td>
                                        <td>{{ $empresa->cnpj }}</td>
                                        <td>{{ $empresa->endereco }}</td>
                                        <td>{{ $empresa->telefone }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="{{ route('holding.edit', $holding->id) }}" class="btn btn-inverse-info btn-sm btn-icon-text me-3" title="Editar Holding">
                                                    <i class="fa-solid fa-edit btn-icon-append"></i>                          
                                                </a>
                                                <a href="{{ route('holding.show', $holding->id) }}" class="btn btn-inverse-info btn-sm btn-icon-text  me-3" title="Detalhes">
                                                    <i class="fa-regular fa-eye"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>

            </div>
        </div>
    </div>

@endsection
