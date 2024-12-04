@extends('tomadores.planos.layout.admin')

@section('content')

<div class="container mt-5">
    <h1 class="mb-4">Troca de Contador</h1>

    <!-- Formulário para Troca de Contador -->
    <form>
        <div class="mb-3">
            <label for="razao_social" class="form-label">Razão Social</label>
            <input type="text" class="form-control" id="razao_social" name="razao_social" required>
        </div>
        <div class="mb-3">
            <label for="cnpj" class="form-label">CNPJ</label>
            <input type="text" class="form-control" id="cnpj" name="cnpj" required>
        </div>
        <div class="mb-3">
            <label for="nome_fantasia" class="form-label">Nome Fantasia</label>
            <input type="text" class="form-control" id="nome_fantasia" name="nome_fantasia">
        </div>

        <h5 class="mt-4">Endereço</h5>
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="cep" class="form-label">CEP</label>
                <input type="text" class="form-control" id="cep" name="cep" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="estado" class="form-label">Estado</label>
                <input type="text" class="form-control" id="estado" name="estado" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="cidade" class="form-label">Cidade</label>
                <input type="text" class="form-control" id="cidade" name="cidade" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="bairro" class="form-label">Bairro</label>
                <input type="text" class="form-control" id="bairro" name="bairro" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="logradouro" class="form-label">Logradouro</label>
                <input type="text" class="form-control" id="logradouro" name="logradouro" required>
            </div>
            <div class="col-md-2 mb-3">
                <label for="numero" class="form-label">Número</label>
                <input type="text" class="form-control" id="numero" name="numero" required>
            </div>
            <div class="col-md-2 mb-3">
                <label for="complemento" class="form-label">Complemento</label>
                <input type="text" class="form-control" id="complemento" name="complemento">
            </div>
        </div>

        <div class="mb-3">
            <label for="inscricao_municipal" class="form-label">Inscrição Municipal</label>
            <input type="text" class="form-control" id="inscricao_municipal" name="inscricao_municipal">
        </div>
        <div class="mb-3">
            <label for="inscricao_estadual" class="form-label">Inscrição Estadual</label>
            <input type="text" class="form-control" id="inscricao_estadual" name="inscricao_estadual">
        </div>

        <div class="mb-3">
            <label for="documentos_empresa" class="form-label">Upload de Documentos</label>
            <input type="file" class="form-control" id="documentos_empresa" name="documentos_empresa[]"
                multiple>
        </div>

        <h2 class="mt-4">Sócios</h2>
        <div id="socios-container">
            <!-- Formulários Dinâmicos para Sócios serão adicionados aqui -->
        </div>
        <button type="button" class="btn btn-secondary mt-3" id="add-socio-btn">Adicionar Sócio</button>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Enviar Solicitação</button>
        </div>
    </form>
</div>

<script>
    let socioCount = 0;

    // Função para aplicar máscaras
    function applyMasks() {
        $('.cpf').mask('000.000.000-00');
        $('.cep').mask('00000-000');
        $('.telefone').mask('(00) 00000-0000');
    }

    $(document).ready(function() {
        applyMasks(); // Aplicar máscaras nos campos iniciais

        // Evento para adicionar um novo sócio
        $('#add-socio-btn').click(function() {
            socioCount++;

            // Template para Formulário de Sócio
            let socioForm = `
            <div class="card mt-4" id="socio-${socioCount}">
                <div class="card-header">
                    <h5>Sócio ${socioCount}</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="nome-${socioCount}" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nome-${socioCount}" name="socios[${socioCount}][nome]" required>
                    </div>
                    <div class="mb-3">
                        <label for="identidade-${socioCount}" class="form-label">Identidade</label>
                        <input type="text" class="form-control" id="identidade-${socioCount}" name="socios[${socioCount}][identidade]" required>
                    </div>
                    <div class="mb-3">
                        <label for="cpf-${socioCount}" class="form-label">CPF</label>
                        <input type="text" class="form-control cpf" id="cpf-${socioCount}" name="socios[${socioCount}][cpf]" required>
                    </div>
                    <div class="mb-3">
                        <label for="estado_civil-${socioCount}" class="form-label">Estado Civil</label>
                        <input type="text" class="form-control" id="estado_civil-${socioCount}" name="socios[${socioCount}][estado_civil]" required>
                    </div>
                    <div class="mb-3">
                        <label for="profissao-${socioCount}" class="form-label">Profissão</label>
                        <input type="text" class="form-control" id="profissao-${socioCount}" name="socios[${socioCount}][profissao]" required>
                    </div>
                    <h6 class="mt-3">Endereço</h6>
                    <div class="mb-3">
                        <label for="cep-${socioCount}" class="form-label">CEP</label>
                        <input type="text" class="form-control cep" id="cep-${socioCount}" name="socios[${socioCount}][cep]" required>
                    </div>
                    <div class="mb-3">
                        <label for="estado-${socioCount}" class="form-label">Estado</label>
                        <input type="text" class="form-control" id="estado-${socioCount}" name="socios[${socioCount}][estado]" required>
                    </div>
                    <div class="mb-3">
                        <label for="cidade-${socioCount}" class="form-label">Cidade</label>
                        <input type="text" class="form-control" id="cidade-${socioCount}" name="socios[${socioCount}][cidade]" required>
                    </div>
                    <div class="mb-3">
                        <label for="bairro-${socioCount}" class="form-label">Bairro</label>
                        <input type="text" class="form-control" id="bairro-${socioCount}" name="socios[${socioCount}][bairro]" required>
                    </div>
                    <div class="mb-3">
                        <label for="logradouro-${socioCount}" class="form-label">Logradouro</label>
                        <input type="text" class="form-control" id="logradouro-${socioCount}" name="socios[${socioCount}][logradouro]" required>
                    </div>
                    <div class="mb-3">
                        <label for="numero-${socioCount}" class="form-label">Número</label>
                        <input type="text" class="form-control" id="numero-${socioCount}" name="socios[${socioCount}][numero]" required>
                    </div>
                    <div class="mb-3">
                        <label for="complemento-${socioCount}" class="form-label">Complemento</label>
                        <input type="text" class="form-control" id="complemento-${socioCount}" name="socios[${socioCount}][complemento]">
                    </div>
                    <h6 class="mt-3">Documentos</h6>
                    <div class="mb-3">
                        <label for="documentos-${socioCount}" class="form-label">Upload de Documentos</label>
                        <input type="file" class="form-control" id="documentos-${socioCount}" name="socios[${socioCount}][documentos][]" multiple>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button type="button" class="btn btn-danger" onclick="removeSocio(${socioCount})">Remover Sócio</button>
                </div>
            </div>
        `;

            $('#socios-container').append(socioForm);
            applyMasks(); // Aplicar máscaras aos novos campos
        });

        // Função para remover sócio
        function removeSocio(id) {
            $(`#socio-${id}`).remove();
        }

        // Delegação de evento para busca de CEP
        $(document).on('blur', '.cep', function() {
            const cepInput = $(this);
            const socioId = cepInput.attr('id').split('-')[1]; // Extrair ID do sócio
            const cep = cepInput.val().replace(/\D/g, ''); // Remove caracteres não numéricos

            if (cep.length === 8) {
                fetch(`https://viacep.com.br/ws/${cep}/json/`)
                    .then(response => response.json())
                    .then(data => {
                        if (!data.erro) {
                            $(`#logradouro-${socioId}`).val(data.logradouro);
                            $(`#bairro-${socioId}`).val(data.bairro);
                            $(`#cidade-${socioId}`).val(data.localidade);
                            $(`#estado-${socioId}`).val(data.uf);
                        } else {
                            alert('CEP não encontrado.');
                        }
                    })
                    .catch(error => {
                        console.error('Erro ao buscar o CEP:', error);
                        alert('Erro ao buscar o CEP. Tente novamente.');
                    });
            } else {
                alert('CEP inválido. Digite um CEP com 8 números.');
            }
        });
    });
</script>

@endsection