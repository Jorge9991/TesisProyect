<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ProyecTesis') }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
    {{-- estilos personalizados --}}
    <link rel="stylesheet" href="{{ asset('css/stylos.css') }}">
    {{-- icono --}}
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/png" />
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    @guest
        <div id="app">
            {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Tesis Proyect') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="{{ route('login') }}">{{ __('Iniciar Sesi??n') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif

                        </ul>
                    </div>
                </div>
            </nav> --}}

            <main>
                @yield('content')
            </main>
        </div>
    @else
        <div class="wrapper">

            <!-- cargando -->
            <div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__shake" src="{{ asset('img/logo.png') }}" alt="AdminLTELogo" height="60"
                    width="160">
            </div>

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                                class="fas fa-bars"></i></a>
                    </li>

                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">


                    <li class="nav-item">
                        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                            <i class="fas fa-expand-arrows-alt"></i>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                                             document.getElementById('logout-form').submit();">
                                {{ __('Cerrar Sesi??n') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            <a class="dropdown-item" href="{{ route('password.request') }}">
                                {{ __('Cambiar Contrase??a') }}
                            </a>
                        </div>




                    </li>

                </ul>

            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- aqui va el logo -->
                <a href="{{ route('home') }}" class="brand-link ">
                    <div class="flex-column justify-content-center align-items-center">
                        <img class="animation__shake" src="{{ asset('img/logo.png') }}" alt="AdminLTELogo" height="50"
                            width="160">
                    </div>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            {{-- egresado --}}
                            @if (Auth::user()->tipo_usuario == 0)
                                <li class="nav-header">
                                    <h5>Men?? de opciones</h5>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('tutor.recurso.descargar') }}"
                                        class="nav-link {{ request()->routeIs('tutor.recurso.descargar') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-file-word"></i>
                                        <p>Recursos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('egresado.postulation.index') }}"
                                        class="nav-link {{ request()->routeIs('egresado.postulation.index') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-list-alt"></i>
                                        <p>Cupo ofertado</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('information.index') }}"
                                        class="nav-link {{ request()->routeIs('information.*') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-folder"></i>
                                        <p>Actividad</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('informe.index') }}"
                                        class="nav-link {{ request()->routeIs('informe.*') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-file-code"></i>
                                        <p>Informe Final</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('informedigital.index') }}"
                                        class="nav-link {{ request()->routeIs('informedigital.*') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-desktop"></i>
                                        <p>Informe Digitalizado</p>
                                    </a>
                                </li>
                            @endif

                            {{-- gestor --}}
                            @if (Auth::user()->tipo_usuario == 1)
                                <li class="nav-header">
                                    <h5>Men?? de opciones</h5>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('user.index') }}"
                                        class="nav-link {{ request()->routeIs('user.*') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-users"></i>
                                        <p>Usuarios</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('reporte') }}"
                                        class="nav-link {{ request()->routeIs('reporte') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-file-pdf"></i>
                                        <p>Reportes</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('tutor.recurso.index') }}"
                                        class="nav-link {{ request()->routeIs('tutor.recurso.*') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-file-word"></i>
                                        <p>Recursos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('tutor.convenio.index') }}"
                                        class="nav-link {{ request()->routeIs('tutor.convenio.*') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-building"></i>
                                        <p>Convenios</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('tutor.oferta_cupo.index') }}"
                                        class="nav-link {{ request()->routeIs('tutor.oferta_cupo.*') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-briefcase"></i>
                                        <p>Ofertas</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('egresado.postulation.postulaciones') }}"
                                        class="nav-link {{ request()->routeIs('egresado.postulation.*') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-list"></i>
                                        <p>Postulaciones</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('asignacion.index') }}"
                                        class="nav-link {{ request()->routeIs('asignacion.*') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-sitemap"></i>
                                        <p>Asignaci??n</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('informe.revision') }}"
                                        class="nav-link {{ request()->routeIs('informe.*') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-folder"></i>
                                        <p>Informes Finales</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('tutor_envio.index') }}"
                                        class="nav-link {{ request()->routeIs('tutor_envio.*') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-user"></i>
                                        <p>Asignaci??n a tutor</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('titulacion.titulacion') }}"
                                        class="nav-link {{ request()->routeIs('titulacion.*') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-book"></i>
                                        <p>Informe Titulaci??n</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('informedigital.indexgestor') }}"
                                        class="nav-link {{ request()->routeIs('informedigital.*') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-desktop"></i>
                                        <p>Informe Digitalizado</p>
                                    </a>
                                </li>
                            @endif
                            {{-- convenio --}}
                            @if (Auth::user()->tipo_usuario == 2)
                                <li class="nav-header">
                                    <h5>Men?? de opciones</h5>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('tutor.oferta_cupo.index') }}"
                                        class="nav-link {{ request()->routeIs('tutor.oferta_cupo.*') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-briefcase"></i>
                                        <p>Ofertas</p>
                                    </a>
                                </li>
                            @endif
                            {{-- docente o tutor --}}
                            @if (Auth::user()->tipo_usuario == 3)
                                <li class="nav-header">
                                    <h5>Men?? de opciones</h5>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('asignacion.asignaciontutor') }}"
                                        class="nav-link {{ request()->routeIs('asignacion.*') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-sitemap"></i>
                                        <p>Asignaci??n</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('activity.index') }}"
                                        class="nav-link {{ request()->routeIs('activity.*') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-check-square"></i>
                                        <p>Actividad</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('informe.informe') }}"
                                        class="nav-link {{ request()->routeIs('informe.*') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-list"></i>
                                        <p>Informes</p>
                                    </a>
                                </li>
                            @endif
                            {{-- vicerrectorado --}}
                            @if (Auth::user()->tipo_usuario == 4)
                                <li class="nav-header">
                                    <h5>Men?? de opciones</h5>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('estudiantes.index') }}"
                                        class="nav-link {{ request()->routeIs('estudiantes.*') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-users"></i>
                                        <p>Estudiantes</p>
                                    </a>
                                </li>
                            @endif
                            {{-- titulaci??n --}}
                            @if (Auth::user()->tipo_usuario == 5)
                                <li class="nav-header">
                                    <h5>Men?? de opciones</h5>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('estudiantes.index') }}"
                                        class="nav-link {{ request()->routeIs('estudiantes.*') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-users"></i>
                                        <p>Estudiantes</p>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                @yield('content')
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->



            </div>
        @endguest
</body>


<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            // "buttons": [ "csv", "excel", "pdf", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

</html>
