<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
    <!-- Meta y títulos -->
    <meta charset="utf-8" />
    <title>Prueba</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <!-- BOOSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!--fontawesome-->
    <script src="https://kit.fontawesome.com/675de417d6.js" crossorigin="anonymous"></script>


    <style>
        header {
            background-color: #eff6ff;
        }

        nav.navbar {
            height: 50px; 
        }

    </style>

    <!-- Main HTML partial -->
    <link href="css/colores.css" rel="stylesheet" type="text/css" />


    <link href="assets/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />
    <!-- Layout config Js -->
    <script src="resources/assets/js/layout.js"></script>
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons CSS -->
    <link href="resources/assets/icons.csss" rel="stylesheet" type="text/css" />
    <!-- App CSS-->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- Custom CSS-->
    <link href="assets/css/custom.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <!--INICIO HEADER-->
    <header id="page-topbar" class="py-3 border-top border-bottom">
        <div class="layout-width">
            <div class="navbar-header d-flex justify-content-between">
                <div class="d-flex ms-5">
                    <!--DIV DEL LOGO -->
                    <div class="navbar-brand-box horizontal-logo">
                            <span class="logo-sm">
                                <img src="{{asset('images/logo.png')}}" alt="" width="70px">
                            </span>
                        </a>
                        <h2 style="display: inline-block" class="text-danger">BLOODME</h2>
                    </div>
                </div>

    
                <!--ESTE DIV ES EL AVATAR Y EL NOMBRE-->
                <div class="dropdown ms-sm-3 header-item topbar-user me-5">
                    <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <!--foto del usuario-->
                            <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-1.jpg" alt="Avatar">
                            <!--Nombre del usuario-->
                            <span class="text-start ms-xl-2">
                                <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">Nombre Usuario</span>
                                <span class="d-none d-xl-block ms-1 fs-12 user-name-sub-text">ROL</span>
                            </span>
                        </span>
                    </button>
                </div>
        </div>
    </header>
     <!--FIN HEADER-->


     <!-- ========== NAVBAR ========== -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-top border-bottom py-1">
        <div class="container">
            <div id="scrollbar" class="d-flex justify-content-start align-items-center">
                <ul class="navbar-nav">
                    <li class="nav-item" data-section="dashboard">
                        <a class="nav-link" href="#">
                            <i class="ri-dashboard-2-line"></i> <span class="ms-1">Dashboards</span>
                        </a>
                    </li>
                    <li class="nav-item" data-section="usuarios">
                        <a class="nav-link" href="#">
                            <i class="ri-dashboard-2-line"></i> <span class="ms-1">Usuarios</span>
                        </a>
                    </li>
                    <li class="nav-item" data-section="campañas">
                        <a class="nav-link" href="#">
                            <i class="ri-dashboard-2-line"></i> <span class="ms-1">Campañas</span>
                        </a>
                    </li>
                    <li class="nav-item" data-section="unidadesmedicas">
                        <a class="nav-link" href="#">
                            <i class="ri-dashboard-2-line"></i> <span class="ms-1">Unidades Medicas</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- ========== FIN NAVBAR ========== -->
        <!-- Begin page -->




<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->




<!-- end main content-->





<!-- apexcharts -->
<script src="assets/libs/apexcharts/apexcharts.min.js"></script>

<!-- Vector map-->
<script src="assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
<script src="assets/libs/jsvectormap/maps/world-merc.js"></script>

<!-- Dashboard init -->
<script src="assets/js/pages/dashboard-analytics.init.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> <!-- NO FUNCIONA, INTENTO DE BARRA DE NAVEGACION FUNCIONAL -->
<script>
    $(document).ready(function () {
        $('.nav-item').on('click', function (e) {
            e.preventDefault();
            var sectionId = $(this).data('section');
            $('html, body').animate({
                scrollTop: $('.' + sectionId).offset().top
            }, 1000);
        });
    });
</script>


</body>

</html>