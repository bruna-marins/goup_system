@extends('layout.admin')

@section('content')
    <h1>Editar {{ $holding->nome }}</h1>


    <form action="{{ route('holding.update', ['holding' => $holding->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nome da Holding</label>
        <input type="text" name="nome" id="nome" placeholder="Nome da Holding" value="{{ old('name', $holding->nome) }}">

        <label>CNPJ</label>
        <input type="text" name="cnpj" id="cnpj" placeholder="CNPJ" value="{{ old('name', $holding->cnpj) }}">

        <label>Telefone</label>
        <input type="text" name="telefone" id="telefone" placeholder="Telefone" value="{{ old('name', $holding->telefone) }}">

        <label>E-mail</label>
        <input type="text" name="email" id="email" placeholder="E-mail" value="{{ old('name', $holding->email) }}">

        <label>Endereço</label>
        <input type="text" name="endereco" id="endereco" placeholder="Endereço" value="{{ old('name', $holding->endereco) }}">

        <button type="submit">Editar</button>
        <button type="reset">Cancelar</button>
    </form>
@endsection