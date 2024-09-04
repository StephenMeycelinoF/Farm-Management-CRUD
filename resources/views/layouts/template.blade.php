<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/logo.svg">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Sistem Peternakan')</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />

    <!-- Stylesheets -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.2/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @yield('styles')
</head>

<body class="">
    <div class=" wrapper ">
        <div class=" sidebar" data-color="white" data-active-color="danger">
            <div class="logo">
                <a href="{{ route('layouts.dashboard') }}" class="simple-text logo-mini">
                    <div class="logo-image-small">
                        <img src="../assets/img/logo-small.png">
                    </div>
                </a>
                <a href="{{ route('layouts.dashboard') }}" class="simple-text logo-normal">
                    ADMIN
                </a>
            </div>
            <!-- Menu List -->
            <div class="sidebar-wrapper">
                <ul class="nav overflow-hidden">
                    <li class="{{ Route::currentRouteName() == 'layouts.dashboard' ? 'active' : '' }}">
                        <a href="{{ route('layouts.dashboard') }}">
                            <i class="nc-icon nc-bank"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="{{ Route::currentRouteName() == 'animals.index' ? 'active' : '' }}">
                        <a href="{{ route('animals.index') }}">
                            <i class="nc-icon nc-tile-56"></i>
                            <p>Data Hewan</p>
                        </a>
                    </li>
                    <li class="{{ Route::currentRouteName() == 'owners.index' ? 'active' : '' }}">
                        <a href="{{ route('owners.index') }}">
                            <i class="nc-icon nc-single-02"></i>
                            <p>Data Pemilik Ternak</p>
                        </a>
                    </li>
                    <!-- <li class="{{ Route::currentRouteName() == 'breeds.index' ? 'active' : '' }}">
                <a href="{{ route('breeds.index') }}">
                    <i class="bi bi-egg-fried"></i>
                    <p>Data Pakan Ternak</p>
                </a>
            </li> -->
                    <li class="{{ Route::currentRouteName() == 'medicalRecords.index' ? 'active' : '' }}">
                        <a href="{{ route('medicalRecords.index') }}">
                            <i class="bi bi-bandaid"></i>
                            <p>Data Rekam Medis</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="javascript:;">Sistem Peternakan</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                </div>
            </nav>
            <!-- End Navbar -->

            <!-- Content -->
            @yield("content")
            <!-- End Content -->

            <footer class="footer footer-black  footer-white ">
                <div class="container-fluid">
                    <div class="row">
                        <nav class="footer-nav">
                            <ul>
                                <li>Creative Tim</a></li>
                                <li>Blog</li>
                                <li>Licenses</li>
                            </ul>
                        </nav>
                        <div class="credits ml-auto">
                            <span class="copyright">
                                ©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>, made with <i class="fa fa-heart heart"></i> by Creative Tim
                            </span>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/jquery.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="../assets/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="../assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>
    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="../assets/demo/demo.js"></script>
    <script>
        $(document).ready(function () {
            // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
            demo.initChartsPages();
        });
    </script>

    @yield('page-scripts') 

    @yield('scripts')
</body>

</html>