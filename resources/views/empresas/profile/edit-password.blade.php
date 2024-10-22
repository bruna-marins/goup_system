@extends('empresas.layout.admin')

@section('content')
    <x-alert />
    <div class="container mt-5">
        <h2>Editar Senha</h2>
        <form action="{{ route('empresas.profile.update-password') }}" method="POST">
            @csrf
            @method('PUT')

            <label for="senha_atual">Senha Atual</label>
            <input type="password" name="senha_atual" id="senha_atual" class="form-control">

            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </form>
    </div>
@endsection
