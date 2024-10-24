@extends('holdings.layout.admin')

@section('content')

    <!-- COnteudo -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                        <!--Inserir o COnteudo da página -->
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <h3> Detalhes da Holding - <strong> {{ $holding->nome }}  </strong></h3> <hr />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p><strong>Nome Fantasia:</strong><br /> {{ $holding->nome }} </p>
                                    <p><strong>Inscrição Estadual:</strong><br /> {{ $holding->nome }} </p>
                                    <p><strong>E-mail Corporativo:</strong><br /> {{ $holding->email }} </p>
                                    <p><strong>Endereço:</strong> <br />{{ $holding->endereco }} </p>
                                </div>
                                <div class="col-md-4">
                                    <p><strong>CNPJ:</strong><br /> {{ $holding->cnpj }} </p>
                                    <p><strong>Inscrição Municipal:</strong><br /> {{ $holding->nome}} </p>
                                    <p><strong>Site:</strong><br /> {{ $holding->email }} </p>
                                </div>
                                <div class="col-md-4">
                                    <p><strong>Data de Abertura:</strong><br /> {{ $holding->nome }} </p>
                                    <p><strong>Natureza Jurídica:</strong><br /> {{ $holding->nome }} </p>
                                    <p><strong>Telefone:</strong> <br />{{ $holding->telefone }} </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p><strong>Nome do Sócio/Proprietário:</strong><br /> {{ $holding->email }} </p>
                                </div>
                                <div class="col-md-4">
                                    <p><strong>CPF:</strong><br /> {{ $holding->email }} </p>
                                </div>
                                <div class="col-md-4">
                                    <p><strong>Participação Societária:</strong> <br />{{ $holding->email }} </p>
                                </div>
                            </div>

                            <div class="row pt-3">
                                <div class="form-group col-md-12">
                                    <h4>Informações Financeiras e Fiscais</h4> <hr />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p><strong>Regime Tributário:</strong><br /> {{ $holding->email }} </p>
                                    <p><strong>Faturamento Anual:</strong><br /> {{ $holding->email }} </p>
                                    <p><strong>Código de Tributação:</strong><br /> {{ $holding->email }} </p>
                                </div>
                                <div class="col-md-4">
                                    <p><strong>CNAE:</strong><br /> {{ $holding->email }} </p>
                                    <p><strong>Responsável Contábil:</strong><br /> {{ $holding->email }} </p>
                                    <p><strong>Alíquotas Fiscais:</strong><br /> {{ $holding->email }} </p>
                                </div>
                                <div class="col-md-4">
                                    <p><strong>Capital Social:</strong><br /> {{ $holding->email }} </p>
                                    <p><strong>Cargo/Função:</strong><br /> {{ $holding->email }} </p>
                                </div>
                            </div>
                        <!--Inserir o COnteudo da página -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- COnteudo -->

    <!-- Cabeçalho -->
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-4 pb-3">
        <div>
            <h3 class="fw-bold mb-3">Empresas cadastradas - <strong> {{ $holding->nome }}  </strong></h3>
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
                        <!--Inserir o COnteudo da página -->
                            <!-- Verificar se há empresas cadastradas -->
                            @if ($holding->empresas->isEmpty())
                                <!-- alerta -->
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <p class="card-description">
                                        Não há empresas cadastradas nesta holding.
                                    </p>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                <!-- alerta -->
                            @else

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
                                        @foreach ($holding->empresas as $empresa)
                                            <tr>
                                            <tr>
                                                <td>{{ $empresa->id }}</td>
                                                <td>{{ $empresa->nome }}</td>
                                                <td>{{ $empresa->cnpj }}</td>
                                                <td>{{ $empresa->endereco }}</td>
                                                <td>{{ $empresa->telefone }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="{{ route('holdings.holding.show-empresa', ['holding' => $holding->id, 'empresa' => $empresa->id]) }}"
                                                            class="btn btn-secondary btn-sm btn-icon-text  me-3"
                                                            title="Detalhes">
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
                        <!--Inserir o COnteudo da página -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

