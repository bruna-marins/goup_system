@extends('layout.admin')

@section('content')

<div class="container mt-5">
    <h2 class="text-center mb-4">Detalhes da Holding: {{ $holding->nome }}</h2>

    <!-- Detalhes da holding -->
    <div class="mb-4">
        <h4>Dados da Holding:</h4>
        <p><strong>CNPJ:</strong> {{ $holding->cnpj }}</p>
        <p><strong>Endereço:</strong> {{ $holding->endereco }}</p>
        <p><strong>Telefone:</strong> {{ $holding->telefone }}</p>
        <p><strong>Email:</strong> {{ $holding->email }}</p>
    </div>

    <!-- Lista de empresas associadas à holding -->
    <div>
        <h4>Empresas cadastradas nesta Holding:</h4>

        <!-- Verificar se há empresas cadastradas -->
        @if($holding->empresas->isEmpty())
            <p>Não há empresas cadastradas nesta holding.</p>
        @else
            <table style="width: 100%; border-collapse: collapse; border: 1px solid #ddd;">
                <thead>
                    <tr>
                        <th style="border: 1px solid #ddd; padding: 12px;">ID</th>
                        <th style="border: 1px solid #ddd; padding: 12px;">Nome</th>
                        <th style="border: 1px solid #ddd; padding: 12px;">CNPJ</th>
                        <th style="border: 1px solid #ddd; padding: 12px;">Endereço</th>
                        <th style="border: 1px solid #ddd; padding: 12px;">Telefone</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($holding->empresas as $empresa)
                    <tr>
                        <td style="border: 1px solid #ddd; padding: 12px;">{{ $empresa->id }}</td>
                        <td style="border: 1px solid #ddd; padding: 12px;">{{ $empresa->nome }}</td>
                        <td style="border: 1px solid #ddd; padding: 12px;">{{ $empresa->cnpj }}</td>
                        <td style="border: 1px solid #ddd; padding: 12px;">{{ $empresa->endereco }}</td>
                        <td style="border: 1px solid #ddd; padding: 12px;">{{ $empresa->telefone }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>

@endsection
