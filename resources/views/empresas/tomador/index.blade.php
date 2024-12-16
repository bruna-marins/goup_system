@extends('empresas.layout.admin')

@section('content')
    <div class="container">
        <h1 class="mb-4">Lista de Tomadores de Serviço</h1>

        <!-- Formulário de Filtro -->
        <form action="{{ route('empresas.tomador.index') }}" method="GET" class="mb-4">
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label for="situacao" class="form-label">Filtrar por Situação:</label>
                </div>
                <div class="col-auto">
                    <select name="situacao" id="situacao" class="form-select">
                        <option value="">Todas</option>
                        <option value="adimplente" {{ request('situacao') == 'adimplente' ? 'selected' : '' }}>Adimplente
                        </option>
                        <option value="inadimplente" {{ request('situacao') == 'inadimplente' ? 'selected' : '' }}>
                            Inadimplente</option>
                        <option value="abandono de carrinho"
                            {{ request('situacao') == 'abandono de carrinho' ? 'selected' : '' }}>Abandono de Carrinho
                        </option>
                        <option value="abertura de empresa"
                            {{ request('situacao') == 'abertura de empresa' ? 'selected' : '' }}>Abertura de Empresa
                        </option>
                    </select>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                </div>
            </div>
        </form>

        <!-- Tabela -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Razão Social</th>
                    <th>Nome Fantasia</th>
                    <th>CNPJ</th>
                    <th>Situação</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->razao_social }}</td>
                        <td>{{ $cliente->nome_fantasia }}</td>
                        <td>{{ $cliente->cnpj }}</td>
                        <td>{{ $cliente->situacao }}</td>
                        <td>
                            <button>
                                <a href="{{ route('empresas.tomador.show', $cliente->id) }}">Ver</a>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Nenhum tomador encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Paginação -->
        {{ $clientes->links() }}
    </div>
@endsection
