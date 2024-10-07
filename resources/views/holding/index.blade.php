@extends('layout.admin')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Lista de Holdings</h2>

        <!-- Estilos CSS Internos -->
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
            }

            table th,
            table td {
                border: 1px solid #ddd;
                padding: 12px;
                text-align: center;
            }

            table th {
                background-color: #f2f2f2;
            }

            .btn {
                display: inline-block;
                padding: 8px 16px;
                text-align: center;
                text-decoration: none;
                color: #fff;
                border-radius: 4px;
                transition: background-color 0.3s ease;
            }

            .btn-edit {
                background-color: #4CAF50;
                /* Verde para o botão Editar */
            }

            .btn-edit:hover {
                background-color: #45a049;
            }

            .btn-details {
                background-color: #008CBA;
                /* Azul para o botão Detalhes */
            }

            .btn-details:hover {
                background-color: #007bb5;
            }

            .btn-container {
                display: flex;
                justify-content: center;
                gap: 10px;
            }
        </style>

        <a href="{{ route('holding.create') }}">
            <button>Cadastrar Nova Holding</button>
        </a>

        <!-- Tabela de Holdings -->
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>CNPJ</th>
                    <th>Endereço</th>
                    <th>Telefone</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($holdings as $holding)
                    <tr>
                        <td>{{ $holding->nome }}</td>
                        <td>{{ $holding->cnpj }}</td>
                        <td>{{ $holding->endereco }}</td>
                        <td>{{ $holding->telefone }}</td>
                        <td>
                            <div class="btn-container">
                                <!-- Botão Editar -->
                                <a href="{{ route('holding.edit', $holding->id) }}" class="btn btn-edit">Editar</a>

                                <!-- Botão Detalhes -->
                                <a href="{{ route('holding.show', $holding->id) }}" class="btn btn-details">Detalhes</a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <p>Nenhuma Empresa Encontrada</p>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
