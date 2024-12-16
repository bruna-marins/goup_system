@extends('empresas.layout.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Detalhes do Tomador</h1>

    <!-- Dados da Empresa -->
    <div class="card mb-4">
        <div class="card-header">
            <h4>Dados da Empresa</h4>
        </div>
        <div class="card-body">
            <p><strong>Razão Social:</strong> {{ $tomador->razao_social }}</p>
            <p><strong>Nome Fantasia:</strong> {{ $tomador->nome_fantasia }}</p>
            <p><strong>CNPJ:</strong> {{ $tomador->cnpj }}</p>
            <p><strong>Inscrição Municipal:</strong> {{ $tomador->inscricao_municipal }}</p>
            <p><strong>Inscrição Estadual:</strong> {{ $tomador->inscricao_estadual }}</p>
            <p><strong>Email:</strong> {{ $tomador->email }}</p>
            <p><strong>Endereço:</strong> {{ $tomador->logradouro }}, {{ $tomador->numero }}, {{ $tomador->bairro }}, {{ $tomador->cidade }} - {{ $tomador->estado }}, {{ $tomador->cep }}</p>
            <p><strong>Complemento:</strong> {{ $tomador->complemento ?? 'N/A' }}</p>
            <p><strong>Situação:</strong> {{ ucfirst($tomador->situacao) }}</p>
        </div>
    </div>

    <!-- Botões para Visualizar Mais Detalhes -->
    <div class="d-flex gap-3">
        <!-- Link para Sócios -->
        <a href="#" class="btn btn-primary">
            Visualizar Sócios
        </a>

        <!-- Link para Dados de Pagamento -->
        <a href="#" class="btn btn-success">
            Dados de Pagamento
        </a>

        <!-- Link para Documentação -->
        <a href="#" class="btn btn-info">
            Documentação
        </a>
    </div>
</div>
@endsection