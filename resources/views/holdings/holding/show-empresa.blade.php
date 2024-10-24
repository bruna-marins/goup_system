@extends('holdings.layout.admin')

@section('content')

<x-alert />

<!-- Cabeçalho -->
<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
    <div>
        <h3 class="fw-bold mb-3">Perfil da Empresa - <strong> {{ $empresa->nome }}</strong></h3>
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
                        <div class="row">
                            <div class="col-md-4">
                                <p><strong>Nome Fantasia:</strong><br /> {{ $empresa->nome }} </p>
                                <p><strong>Inscrição Estadual:</strong><br /> {{ $empresa->nome }} </p>
                                <p><strong>E-mail Corporativo:</strong><br /> {{ $empresa->email }} </p>
                                <p><strong>Endereço:</strong> <br />{{ $empresa->endereco }} </p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>CNPJ:</strong><br /> {{ $empresa->cnpj }} </p>
                                <p><strong>Inscrição Municipal:</strong><br /> {{ $empresa->nome}} </p>
                                <p><strong>Site:</strong><br /> {{ $empresa->email }} </p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>Data de Abertura:</strong><br /> {{ $empresa->nome }} </p>
                                <p><strong>Natureza Jurídica:</strong><br /> {{ $empresa->nome }} </p>
                                <p><strong>Telefone:</strong> <br />{{ $empresa->telefone }} </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p><strong>Nome do Sócio/Proprietário:</strong><br /> {{ $empresa->email }} </p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>CPF:</strong><br /> {{ $empresa->email }} </p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>Participação Societária:</strong> <br />{{ $empresa->email }} </p>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="form-group col-md-12">
                                <h4>Informações Financeiras e Fiscais</h4> <hr />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p><strong>Regime Tributário:</strong><br /> {{ $empresa->email }} </p>
                                <p><strong>Faturamento Anual:</strong><br /> {{ $empresa->email }} </p>
                                <p><strong>Código de Tributação:</strong><br /> {{ $empresa->email }} </p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>CNAE:</strong><br /> {{ $empresa->email }} </p>
                                <p><strong>Responsável Contábil:</strong><br /> {{ $empresa->email }} </p>
                                <p><strong>Alíquotas Fiscais:</strong><br /> {{ $empresa->email }} </p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>Capital Social:</strong><br /> {{ $empresa->email }} </p>
                                <p><strong>Cargo/Função:</strong><br /> {{ $empresa->email }} </p>
                            </div>
                        </div>
                    <!--Inserir o COnteudo da página -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

