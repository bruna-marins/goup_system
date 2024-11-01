@extends('holdings.layout.admin')

@section('content')
    <!-- Cabeçalho -->
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Editar a Empresa - <strong> {{ $holding->nome }} </strong></h3>
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

                            <x-alert/>

                            <!--Inserir o COnteudo da página -->
                            <form class="forms-sample" action="{{ route('holdings.holding.update', $holding->id) }}"
                                method="POST">

                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <h4> Editar - {{ $holding->nome }} </h4>
                                        <hr />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Nome da Holding</label>
                                            <input type="text" name="nome" id="nome" value="{{ old('name', $holding->nome) }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Nome Fantasia</label>
                                            <input type="text" name="nome_fantasia" id="nome_fantasia"
                                                value="{{ old('nome_fantasia', $holding->nome_fantasia) }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Data de Abertura</label>
                                            <input type="date" name="data_abertura" id="data_abertura"
                                                value="{{ old('data_abertura', $holding->data_abertura) }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>CNPJ</label>
                                            <input type="text" name="cnpj" id="cnpj" value="{{ old('cnpj', $holding->cnpj) }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Inscrição Municipal</label>
                                            <input type="text" name="inscricao_municipal" id="inscricao_municipal"
                                                value="{{ old('inscricao_municipal', $holding->inscricao_municipal) }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Natureza Jurídica</label>
                                            <select class="form-control" id="natureza_juridica" name="natureza_juridica">
                                                <option value="MEI"
                                                    {{ old('natureza_juridica', $empresa->natureza_juridica ?? '') == 'MEI' ? 'selected' : '' }}>
                                                    MEI
                                                </option>
                                                <option value="EI"
                                                    {{ old('natureza_juridica', $empresa->natureza_juridica ?? '') == 'EI' ? 'selected' : '' }}>
                                                    EI
                                                </option>
                                                <option value="Ltda."
                                                    {{ old('natureza_juridica', $empresa->natureza_juridica ?? '') == 'Ltda.' ? 'selected' : '' }}>
                                                    Ltda.
                                                </option>
                                                <option value="SS"
                                                    {{ old('natureza_juridica', $empresa->natureza_juridica ?? '') == 'SS' ? 'selected' : '' }}>
                                                    SS
                                                </option>
                                                <option value="SA"
                                                    {{ old('natureza_juridica', $empresa->natureza_juridica ?? '') == 'SA' ? 'selected' : '' }}>
                                                    SA
                                                </option>
                                                <option value="SLU"
                                                    {{ old('natureza_juridica', $empresa->natureza_juridica ?? '') == 'SLU' ? 'selected' : '' }}>
                                                    SLU
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <h4> Endereço </h4>
                                        <hr />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>CEP</label>
                                            <input type="text" name="cep" id="cep"
                                                value="{{ old('cep', $holding->cep) }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Estado</label>
                                            <input type="text" name="estado" id="estado" value="{{ old('estado', $holding->estado) }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Cidade</label>
                                            <input type="text" name="cidade" id="cidade"
                                                value="{{ old('cidade', $holding->cidade) }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Bairro</label>
                                            <input type="text" name="bairro" id="bairro" value="{{ old('bairro', $holding->bairro) }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Logradouro</label>
                                            <input type="text" name="logradouro" id="logradouro" value="{{ old('logradouro', $holding->logradouro) }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Número</label>
                                            <input type="text" name="numero" id="numero" value="{{ old('numero', $holding->numero) }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Complemento <small>(Opcional)</small> </label>
                                            <input type="text" name="complemento" id="complemento"
                                                value="{{ old('complemento', $holding->complemento) }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <h4> Contato </h4>
                                        <hr />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Telefone</label>
                                            <input type="text" name="telefone" id="telefone"
                                                value="{{ old('telefone', $holding->telefone) }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>E-mail Corporativo</label>
                                            <input type="text" name="email" id="email"
                                                value="{{ old('email', $holding->email) }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Site</label>
                                            <input type="text" name="site" id="site"
                                                value="{{ old('site', $holding->site) }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <h4> Informações Financeiras e Fiscais </h4>
                                        <hr />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Regime Tributário</label>
                                            <select class="form-control" id="regime_tributario" name="regime_tributario">
                                                <option value="Simples Nacional"
                                                    {{ old('regime_tributario', $empresa->regime_tributario ?? '') == 'Simples Nacional' ? 'selected' : '' }}>
                                                    Simples Nacional
                                                </option>
                                                <option value="Lucro Presumido"
                                                    {{ old('regime_tributario', $empresa->regime_tributario ?? '') == 'Lucro Presumido' ? 'selected' : '' }}>
                                                    Lucro Presumido
                                                </option>
                                                <option value="Lucro Real"
                                                    {{ old('regime_tributario', $empresa->regime_tributario ?? '') == 'Lucro Real' ? 'selected' : '' }}>
                                                    Lucro Real
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>CNAE</label>
                                            <input type="text" name="cnae" id="cnae"
                                                value="{{ old('cnae', $holding->cnae) }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Capital Social</label>
                                            <input type="text" name="capital_social" id="capital_social"
                                                value="{{ old('capital_social', $holding->capital_social) }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Faturamento Anual</label>
                                            <input type="text" name="faturamento_anual" id="faturamento_anual"
                                                value="{{ old('faturamento_anual', $holding->faturamento_anual) }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Responsável Contábil</label>
                                            <input type="text" name="responsavel_contabil" id="responsavel_contabil"
                                                value="{{ old('responsavel_contabil', $holding->responsavel_contabil) }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Código de Tributação</label>
                                            <input type="text" name="codigo_tributacao" id="codigo_tributacao"
                                                value="{{ old('codigo_tributacao', $holding->codigo_tributacao) }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Alíquotas Fiscais</label>
                                            <input type="text" name="aliquota_fiscais" id="aliquota_fiscais"
                                                value="{{ old('aliquota_fiscais', $holding->aliquota_fiscais) }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <h4> Dados de Sócios ou Proprietários </h4>
                                        <hr/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Nome do Sócio/Proprietário</label>
                                            <input type="text" name="socio" id="socio"
                                                value="{{ old('socio', $holding->socio) }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>CPF</label>
                                            <input type="text" name="cpf" id="cpf"
                                                value="{{ old('cpf', $holding->cpf) }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Participação Societária</label>
                                            <input type="text" name="participacao_societaria"
                                                id="participacao_societaria" value="{{ old('participacao_societaria', $holding->participacao_societaria) }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Cargo/Função</label>
                                            <input type="text" name="cargo" id="cargo"
                                                value="{{ old('cargo', $holding->cargo) }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row pt-4">
                                    <div class="col-md-12">
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-secondary">Editar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!--Inserir o COnteudo da página -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
