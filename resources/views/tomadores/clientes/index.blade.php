@extends('tomadores.layout.admin')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <!-- topo da página -->
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center py-2">
                            <h1 class="card-title mb-2 mb-md-0">Clientes</h1>
                            <a href="{{ route('tomadores.clientes.createCpf') }}"
                                class="btn btn-inverse-info btn-sm"title="Cadastrar Novo Tomador de Serviço">
                                <i class="fa-solid fa-plus btn-icon-prepend"></i>
                                Cliente CPF
                            </a>
                            <a href="{{ route('tomadores.clientes.createCnpj') }}"
                                class="btn btn-inverse-info btn-sm"title="Cadastrar Novo Tomador de Serviço">
                                <i class="fa-solid fa-plus btn-icon-prepend"></i>
                                Cliente CNPJ
                            </a>
                        </div>
                    </div>
                </div>
                <!-- topo da página -->

                <div class="row">
                    <div class="col-md-12">
                        <!--tabela -->
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
                                    @forelse($clientes as $cliente)
                                        <tr>
                                            <td>{{ $cliente->id }}</td>
                                            <td>{{ $cliente->nome }}</td>
                                            <td>{{ $cliente->cnpj }}</td>
                                            <td>{{ $cliente->endereco }}</td>
                                            <td>{{ $cliente->telefone }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    @if (is_null($cliente->cnpj))
                                                        <!-- Link para editCnpj -->
                                                        <a href="{{ route('tomadores.clientes.editCpf', $cliente->id) }}"
                                                            class="btn btn-primary">
                                                            <i class="fa-solid fa-edit btn-icon-append"></i>
                                                        </a>
                                                        <a href="{{ route('tomadores.clientes.showCpf', $cliente->id) }}"
                                                            class="btn btn-primary">
                                                            <i class="fa-solid fa-eye btn-icon-append"></i>
                                                        </a>
                                                    @else
                                                        <!-- Link para editCpf -->
                                                        <a href="{{ route('tomadores.clientes.editCnpj', $cliente->id) }}"
                                                            class="btn btn-secondary">
                                                            <i class="fa-solid fa-edit btn-icon-append"></i>
                                                        </a>
                                                        <a href="{{ route('tomadores.clientes.showCnpj', $cliente->id) }}"
                                                            class="btn btn-primary">
                                                            <i class="fa-solid fa-eye btn-icon-append"></i>
                                                        </a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <p>Nenhum Cliente Encontrado</p>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!--tabela -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
