@extends('holdings.layout.admin')

@section('content')

<!-- Cabeçalho -->
<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
    <div>
        <h3 class="fw-bold mb-3">Cadastrar nova Holding</h3>
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
                        <form class="forms-sample" action="{{ route('holdings.holding.store') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <h4> Informações da Empresa </h4> <hr />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Nome da Holding</label>
                                        <input type="text" name="nome" id="nome" value="{{ old('name') }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Nome Fantasia</label>
                                        <input type="text" name="nome-fantasia" id="nome-fantasia" value="{{ old('name') }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Data de Abertura</label>
                                        <input type="date" name="data-abertura" id="data-abertura" value="{{ old('name') }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>CNPJ</label>
                                        <input type="text" name="cnpj" id="cnpj" value="{{ old('name') }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Inscrição Municipal</label>
                                        <input type="text" name="inscricao-municipal" id="inscricao-municipal" value="{{ old('name') }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Natureza Jurídica</label>
                                        <select class="form-control" id="exampleFormControlSelect1">
                                            <option value="1">MEI</option>
                                            <option value="2">LTDA</option>
                                            <option value="3">SA</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <h4> Endereço </h4> <hr />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Endereço</label>
                                        <input type="text" name="endereco" id="endereco"  value="{{ old('name') }}" class="form-control">
                                    </div>
                                </div> 
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label>Número</label>
                                        <input type="text" name="numero" id="numero"  value="{{ old('name') }}" class="form-control">
                                    </div>
                                </div>  
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Complemento</label>
                                        <input type="text" name="complemento" id="complemento"  value="{{ old('name') }}" class="form-control">
                                    </div>
                                </div> 
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Bairro</label>
                                        <input type="text" name="bairro" id="bairro"  value="{{ old('name') }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Cidade</label>
                                        <input type="text" name="cidade" id="cidade"  value="{{ old('name') }}" class="form-control">
                                    </div>
                                </div> 
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Estado</label>
                                        <select class="form-control" id="exampleFormControlSelect1">
                                            <option value="1"></option>
                                            <option value="2"></option>
                                            <option value="3"></option>
                                        </select>
                                    </div>
                                </div> 
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>CEP</label>
                                        <input type="text" name="cep" id="cep"  value="{{ old('name') }}" class="form-control">
                                    </div>
                                </div> 
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <h4> Contato </h4> <hr />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Telefone</label>
                                        <input type="text" name="telefone" id="telefone" value="{{ old('name') }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>E-mail Corporativo</label>
                                        <input type="text" name="email" id="email"  value="{{ old('name') }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Site</label>
                                        <input type="text" name="site" id="site"  value="{{ old('name') }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <h4> Informações Financeiras e Fiscais </h4> <hr />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Regime Tributário</label>
                                        <select class="form-control" id="exampleFormControlSelect1">
                                            <option value="1">Simples Nacional</option>
                                            <option value="2">Lucro Presumido</option>
                                            <option value="3">Lucro Real</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>CNAE</label>
                                        <input type="text" name="cnae" id="cnae" value="{{ old('name') }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Capital Social</label>
                                        <input type="text" name="capital-social" id="capital-social" value="{{ old('name') }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Faturamento Anual</label>
                                        <input type="text" name="faturamento-anual" id="faturamento-anual" value="{{ old('name') }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Responsável Contábil</label>
                                        <input type="text" name="responsavel-contabil" id="responsavel-contabil" value="{{ old('name') }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Código de Tributação</label>
                                        <input type="text" name="codigo-tributacao" id="codigo-tributacao" value="{{ old('name') }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Alíquotas Fiscais</label>
                                        <input type="text" name="aliquotas-fiscais" id="aliquotas-fiscais" value="{{ old('name') }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <h4> Dados de Sócios ou Proprietários </h4> <hr />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Nome do Sócio/Proprietário</label>
                                        <input type="text" name="nome-socio" id="nome-socio" value="{{ old('name') }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>CPF</label>
                                        <input type="text" name="cpf" id="cpf" value="{{ old('name') }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Participação Societária</label>
                                        <input type="text" name="participacao-societaria" id="participacao-societaria" value="{{ old('name') }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Cargo/Função</label>
                                        <input type="text" name="cargo" id="cargo" value="{{ old('name') }}" class="form-control">
                                    </div>
                                </div>                                
                            </div>

                            <div class="row pt-4">
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-secondary">Cadastrar</button>
                                        <button type="reset" class="btn btn-secondary">Cancelar</button>
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
