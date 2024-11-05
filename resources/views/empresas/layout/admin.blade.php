<!DOCTYPE html>
<html lang="pt-br">

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

</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex justify-content-center">
                <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
                    <a class="navbar-brand brand-logo" href="{{ route('empresas.dashboard.dashboard') }}"><img src="{{ asset('imagens/logo.svg') }}"
                            alt="Logo da Empresa"></a>
                    <a class="navbar-brand brand-logo-mini" href="{{ route('empresas.dashboard.dashboard') }}"><img
                            src="{{ asset('imagens/logo-mini.svg') }}" alt="Logo da Empresa"></a>
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-toggle="minimize">
                        <i class="fa-solid fa-bars mx-0"></i>
                    </button>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <ul class="navbar-nav me-lg-2">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                            @if (Auth::check())
                                <div class="avatar-lg">
                                    <img src="{{ Auth::user()->foto_perfil ? asset('storage/' . Auth::user()->foto_perfil) : asset('imagens/default-avatar.png') }}"
                                        alt="Foto de perfil" class="avatar-img rounded">
                                </div>
                                <span class="nav-profile-name">
                                    {{ auth()->user()->name }}
                                </span>
                            @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="{{ route('empresas.profile.show') }}">
                                <i class="fa-solid fa-user"></i>
                                Meu Perfil
                            </a>
                            <a class="dropdown-item" href="{{ route('empresas.empresa_profile.show') }}">
                                <i class="fa-solid fa-store"></i>
                                Perfil Empresa
                            </a>
                            <a class="dropdown-item" href="{{ route('login.destroy') }}">
                                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                Sair
                            </a>
                        </div>
                    </li>
                    <li class="nav-item nav-user-status dropdown">
                        @if (Auth::user()->last_login_at)
                            <p>Último login: {{ Auth::user()->last_login_at->diffForHumans() }}</p>
                        @else
                            <p>Você ainda não fez login anteriormente.</p>
                        @endif
                    </li>
                </ul>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-date dropdown">
                        <a class="nav-link d-flex justify-content-center align-items-center" href="javascript:;">
                            <h6 class="date mb-0">Hoje : {{ now()->format('d/m/Y') }}</h6>
                            <i class="typcn "></i> <i class="fa-regular fa-calendar-days"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center"
                            id="messageDropdown" href="#" data-bs-toggle="dropdown">
                            <i class="fa-regular fa-envelope mx-0"></i>
                            <span class="count"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                            aria-labelledby="messageDropdown">
                            <p class="mb-0 fw-normal float-start dropdown-header">Mensagens</p>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <img src="{{ asset('imagens/faces/face4.jpg') }}" alt="nome da pessoa"
                                        class="profile-pic">
                                </div>
                                <div class="preview-item-content flex-grow">
                                    <h6 class="preview-subject ellipsis fw-normal">David Grey
                                    </h6>
                                    <p class="fw-light small-text text-muted mb-0">
                                        The meeting is cancelled
                                    </p>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown me-0">
                        <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center"
                            id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                            <i class="fa-regular fa-bell mx-0"></i>
                            <span class="count"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                            aria-labelledby="notificationDropdown">
                            <p class="mb-0 fw-normal float-start dropdown-header">Notificações</p>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-success">
                                        <i class="fa-solid fa-info"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject fw-normal">Application Error</h6>
                                    <p class="fw-light small-text mb-0 text-muted">
                                        Just now
                                    </p>
                                </div>
                            </a>

                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <i class="fa-solid fa-bars mx-0"></i>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <nav class="navbar-breadcrumb col-xl-12 col-12 d-flex flex-row p-0">
            <div class="navbar-links-wrapper d-flex align-items-stretch">
                <div class="nav-link">
                    <a href="{{ route('empresas.tarefa.index') }}" title="Agenda"><i class="fa-regular fa-calendar-days mx-0"></i></a>
                </div>
                <div class="nav-link">
                    <a href="javascript:;"><i class="fa-regular fa-envelope-days mx-0"></i></a>
                </div>
                <div class="nav-link">
                    <a href="javascript:;"><i class="fa-regular fa-folder mx-0"></i></a>
                </div>
                <div class="nav-link">
                    <a href="javascript:;"><i class="fa-regular fa-document mx-0"></i></a>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <ul class="navbar-nav me-lg-2">
                    <li class="nav-item ms-0">
                        <h4 class="mb-0">Dashboard</h4>
                    </li>
                    <li class="nav-item">
                        <div class="d-flex align-items-baseline">
                            <p class="mb-0">Home</p>
                            &nbsp;<small><i class="fa-solid fa-arrow-right"></i></small> &nbsp;
                            <p class="mb-0"> Dahboard</p>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-search d-none d-md-block me-0">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Buscar..." aria-label="search"
                                aria-describedby="search">
                            <div class="input-group-prepend d-flex">
                                <span class="input-group-text" id="search">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('empresas.dashboard.dashboard') }}">
                            
                            <i class="fa-solid fa-chart-line espaco menu-icon" style="color:#FF914D;"></i>
                            <span class="menu-title">Dashboard</span>
                            <!-- <div class="badge badge-danger">new</div> -->
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('empresas.cliente.index') }}">
                            <i class="fa-regular fa-building espaco menu-icon" style="color:#FF914D;"></i>
                            <span class="menu-title">Clientes</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false"
                            aria-controls="auth">
                            <i class="fa-regular fa-user espaco menu-icon" style="color:#FF914D;"></i>
                            <span class="menu-title">Usuários</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="auth">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{ route('empresas.usuario.index') }}">
                                        Usuários </a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('empresas.usuario.create') }}">
                                        Cadastrar Usuário </a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                            aria-controls="ui-basic">
                            <i class="fa-regular fa-folder espaco menu-icon" style="color:#FF914D;"></i>
                            <span class="menu-title">Drop</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link"
                                        href="#">Buttons</a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="#">Dropdowns</a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="#">Typography</a></li>
                            </ul>
                        </div>
                    </li>
                    <!--

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false"
                            aria-controls="auth">
                            <i class="fa-regular fa-user espaco menu-icon" style="color:#FF914D;"></i>
                            <span class="menu-title">Usuário</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="auth">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="../../pages/samples/blank-page.html">
                                        Blank Page </a></li>
                                <li class="nav-item"> <a class="nav-link" href="../../pages/samples/error-404.html">
                                        404 </a></li>
                                <li class="nav-item"> <a class="nav-link" href="../../pages/samples/error-500.html">
                                        500 </a></li>
                                <li class="nav-item"> <a class="nav-link" href="../../pages/samples/login.html">
                                        Login </a></li>
                                <li class="nav-item"> <a class="nav-link" href="../../pages/samples/register.html">
                                        Register </a></li>
                            </ul>
                        </div>
                    </li>
                    -->
                    <li class="nav-item">
                        <a class="nav-link" href="../../../docs/documentation.html">
                            <i class="fa-regular fa-file espaco menu-icon" style="color:#FF914D;"></i>
                            <span class="menu-title">Documentação</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- partial -->

            <!-- main-panel ends -->
            <div class="main-panel">
                <div class="content-wrapper">

                    @yield('content')

                </div>

                <!-- footer -->
                <footer class="footer">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright ©
                                    {{ date('Y') }}
                                    <a href="https://dinerb.com.br/" class="text-muted" target="_blank">DINERB</a>.
                                    Todos os direitos reservados.</span>
                                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center text-muted">
                                    Política de Privacidade | Termo de Uso</span>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- footer -->

            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>

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

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>
