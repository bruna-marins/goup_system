@extends('empresas.layout.admin')

@section('content')
    <h1>Empresas</h1>

    @forelse ($empresas as $empresa)
        <table>
            <thead>
                <th>Nome</th>
                <th>CNPJ</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th></th>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $empresa->nome }}</td>
                    <td>{{ $empresa->cnpj }}</td>
                    <td>{{ $empresa->email }}</td>
                    <td>{{ $empresa->telefone }}</td>
                    <td>
                        <a href="#">
                            <button>Editar</button>
                        </a>
                        <a href="#">
                            <button>Ver</button>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    @empty
        <p>Nenhuma Empresa Encontrada</p>
    @endforelse
@endsection
