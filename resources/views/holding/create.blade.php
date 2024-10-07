@extends('layout.admin')

@section('content')
    <h1>Cadastrar nova Holding</h1>

    <form action="{{ route('holding.store') }}" method="POST">
        @csrf
        @method('POST')

        <label>Nome da Holding</label>
        <input type="text" name="nome" id="nome" placeholder="Nome da Holding" value="{{ old('name') }}">

        <label>CNPJ</label>
        <input type="text" name="cnpj" id="cnpj" placeholder="CNPJ" value="{{ old('name') }}">

        <label>Telefone</label>
        <input type="text" name="telefone" id="telefone" placeholder="Telefone" value="{{ old('name') }}">

        <label>E-mail</label>
        <input type="text" name="email" id="email" placeholder="E-mail" value="{{ old('name') }}">

        <label>Endereço</label>
        <input type="text" name="endereco" id="endereco" placeholder="Endereço" value="{{ old('name') }}">

        <button type="submit">Cadastrar</button>
        <button type="reset">Cancelar</button>
    </form>
@endsection
