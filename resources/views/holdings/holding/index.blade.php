@extends('holdings.layout.admin')

@section('content')

<!-- Cabeçalho -->
<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
    <div>
        <h3 class="fw-bold mb-3">Lista de Holdings</h3>
    </div>
    <!-- botao -->
    <div class="ms-md-auto py-2 py-md-0">
        <div class="btn-group" role="group" aria-label="Basic example">
            <a href="{{ route('holdings.holding.create') }}" class="btn btn btn-secondary btn-sm" title="Cadastrar Nova Holding">
                <i class="fa-solid fa-plus"></i>
            </a>
        </div>
    </div>
    <!-- botao -->
</div>
<!-- Cabeçalho -->

<!-- COnteudo -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                    <!--Inserir o COnteudo da página -->
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover mt-3">
                                <thead class="table-dark">
                                    <tr>
                                        <th class="ms-5">ID</th>
                                        <th>Empresa</th>
                                        <th>CNPJ</th>
                                        <th>Endereço</th>
                                        <th>Telefone</th>
                                        <th style="width: 100px;">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($holdings as $holding)
                                        <tr>
                                            <td>{{ $holding->id }}</td>
                                            <td>{{ $holding->nome }}</td>
                                            <td>{{ $holding->cnpj }}</td>
                                            <td>{{ $holding->endereco }}</td>
                                            <td>{{ $holding->telefone }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="{{ route('holdings.holding.edit', $holding->id) }}" class="btn  btn-secondary btn-sm btn-icon-text me-3" title="Editar Holding">
                                                        <i class="fa-solid fa-edit btn-icon-append"></i>                          
                                                    </a>
                                                    <a href="{{ route('holdings.holding.show', $holding->id) }}" class="btn  btn-secondary btn-sm btn-icon-text  me-3" title="Detalhes">
                                                        <i class="fa-regular fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('holdings.holding.pdf-dados', $holding->id) }}" class="btn  btn-secondary btn-sm btn-icon-text  me-3" title="Gerar pdf">
                                                        <i class="fa-regular fa-file"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>

                                    @empty
                                        <p>Nenhuma Empresa Encontrada</p>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!--tabela -->
                    <!--Inserir o COnteudo da página -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



 
    

        

  
@endsection
