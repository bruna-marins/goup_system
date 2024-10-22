<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>GoUp-System</title>
    <!-- base:css -->

    <link href="{{ asset('css/style.css.map') }}" rel="stylesheet">
    <link href="{{ asset('css/vendor.bundle.base.css') }}" rel="stylesheet">

    <link href="{{ asset('css/typicons.css') }}" rel="stylesheet">

    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">

    <script src='https://use.fontawesome.com/releases/v6.3.0/js/all.js' crossorigin='anonymous'></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- inject:css -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- endinject -->
    <link href="{{ asset('assets/images/favicon.ico') }}" rel="stylesheet">

    <style>
        .position-relative {
            position: relative; /* Define o pai como relativo */
        }
    
        .toggle-password {
            position: absolute; /* Para ser posicionado em relação ao pai */
            top: 50%; /* Centraliza verticalmente no input */
            right: 15px; /* Distância da borda direita do campo de input */
            transform: translateY(-50%); /* Ajuste fino para centralizar melhor verticalmente */
            cursor: pointer; /* Para indicar que o ícone é clicável */
            color: #6c757d; /* Cor do ícone */
        }
    
        .form-control {
            padding-right: 2.5rem; /* Cria espaço suficiente para o ícone à direita */
        }
    </style>

</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-start py-5 px-4 px-sm-5">
                            <div class="brand-logo text-center">
                                <img src="{{ asset('imagens/logo.png') }}" alt="Logo da Empresa">
                            </div>

                            <x-alert />

                            <form action="{{ route('login.process') }}" method="POST" class="pt-3">

                                @csrf
                                @method('POST')

                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" id="email"
                                        name="email" placeholder="E-mail" value="{{ old('email') }}">
                                </div>
                                <div class="form-group position-relative">
                                    <input type="password" class="form-control form-control-lg pr-5" id="password"
                                        name="password" placeholder="Senha">
                                    <i class="fas fa-eye position-absolute toggle-password" id="togglePassword"
                                        onclick="togglePassword()"></i>
                                </div>
                                <div class="mt-3 d-grid gap-2">
                                    <button class="btn btn-block btn-primary btn-lg fw-medium auth-form-btn"
                                        type="submit">Entrar</button>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input">
                                            Manter logado
                                        </label>
                                    </div>
                                    <a href="#" class="auth-link text-black">Esqueceu a Senha?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- base:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/template.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- endinject -->

    <!-- base:js -->
    <script src="{{ asset('js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->

    <!-- inject:js -->
    <script src="{{ asset('js/off-canvas.js') }}"></script>
    <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('js/template.js') }}"></script>
    <script src="{{ asset('js/settings.js') }}"></script>
    <script src="{{ asset('js/todolist.js') }}"></script>
    <!-- endinject -->

    <!-- Plugin js for this page-->
    <script src="{{ asset('js/chart.js') }}"></script>
    <script src="{{ asset('js/chartist.js') }}"></script>
    <script src="{{ asset('js/jquery.cookie.js') }}"></script>

    <script src="{{ asset('js/all.min.js') }}"></script>

    <script src="{{ asset('js/typeahead.bundle.min.js') }}"></script>
    <!-- End plugin js for this page-->

    <!-- Custom js for this page-->
    <script src="{{ asset('js/file-upload.js') }}"></script>
    <script src="{{ asset('js/typeahead.js') }}"></script>
    <script src="{{ asset('js/select2.js') }}"></script>

    <script src="{{ asset('js/dashboard.js') }}"></script>
    <!-- End custom js for this page-->

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('togglePassword');
    
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
    </script>

</body>

</html>
