<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Serviços</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container text-center mt-5">
        <h1 class="mb-4">Escolha o Serviço</h1>
        <div class="row justify-content-center">
            <!-- Link para Abertura de Empresa -->
            <div class="col-md-4 mb-3">
                <div class="card border-primary">
                    <div class="card-body">
                        <h5 class="card-title">Abertura de Empresa</h5>
                        <p class="card-text">Precisa abrir sua empresa? Clique no link abaixo e saiba mais.</p>
                        <a href="{{ route('tomadores.planos.aberturaEmpresa') }}" class="btn btn-primary">Abertura de Empresa</a>
                    </div>
                </div>
            </div>

            <!-- Link para Troca de Contador -->
            <div class="col-md-4 mb-3">
                <div class="card border-success">
                    <div class="card-body">
                        <h5 class="card-title">Troca de Contador</h5>
                        <p class="card-text">Deseja trocar de contador? Clique no link abaixo e veja como.</p>
                        <a href="{{ route('tomadores.planos.trocaContador') }}" class="btn btn-success">Troca de Contador</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
