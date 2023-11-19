<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
    <!-- Meta y títulos -->
    <meta charset="utf-8" />
    <title>Dashboard</title>
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
<div class ="dashboard" data-section="dashboard">
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
    <div class="container-fluid ms-5">

        <div id="scrollbar" class="d-flex justify-content-start align-items-center">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-dashboard-2-line fa-solid fa-circle-half-stroke text-danger" " style="color: #080908;"></i> <span class="ms-1" style="color: #080908;">Dashboards</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-dashboard-2-line fa-solid fa-user text-danger"   style="color: #080908;"></i> <span class="ms-1" style="color: #080908;">Usuarios</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-dashboard-2-line fa-solid fa-tents text-danger" style="color: #080908;"></i> <span class="ms-1" style="color: #080908;">Campañas</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-dashboard-2-line fa-solid fa-hospital text-danger" style="color: #080908;"></i> <span class="ms-1" style="color: #080908;">Unidades Medicas</span>
                    </a>
                </li>
                
            </ul>
        </div>
    </div>
</nav>


    <!-- ========== FIN NAVBAR ========== -->
        <!-- Begin page -->
    <div id="layout-wrapper">



<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="dashboards ml-5 mt-5">

    <div class="page-content">
        <div class="container">

            <div class="row w-100 d-flex justify-content-center">
                <div class="col-3 ">
                    <div class="card card-animate"  style="background-color: #EFF6FF;">
                        <div class="card-body">
                                <div>
                                    <p class="fw-medium text-muted mb-0">Campañas</p>
                                    <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value" data-target="28.05"><i class="fa-solid fa-tents text-danger"></i> 0</span></h2>
                                </div>
                        </div><!-- end card body -->
                    </div>
                </div>
                <div class="col-3">
                    <div class="card card-animate"  style="background-color: #EFF6FF;">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="fw-medium text-muted mb-0">Solicitudes</p>
                                    <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value" data-target="28.05"><i class="fa-solid fa-envelope text-danger"></i> 0</span></h2>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div> <!-- end card-->
                </div>
                <div class="col-3">
                    <div class="card card-animate"  style="background-color: #EFF6FF;">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="fw-medium text-muted mb-0">Donaciones</p>
                                    <h2 class="mt-4 ff-secondary fw-semibold tex-center"><span class="counter-value" data-target="28.05"><i class="fa-solid fa-hand-holding-dollar text-danger"></i> 0</span></h2>
                                
                                </div>
                                
                            </div>
                        </div><!-- end card body -->
                    </div> <!-- end card-->
                </div>
            </div>
            <div class="row">
                <div class="col-6 mr-5">
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                        google.charts.load('current', {'packages':['corechart']});
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {

                            var data = google.visualization.arrayToDataTable([
                                ['Task', 'Hours per Day'],
                                ['Campañas',     11],
                                ['Solicitudes',      2],
                                ['Donaciones',  2],
                                ['Usuarios', 10],
                                ['Donadores',    7]
                            ]);

                            var options = {
                                title: 'Datos generales',
                                slices: {
                                    0: { color: '#77baff' },
                                    1: { color: '#ff5c57' },
                                    2: { color: '#1488ff' },
                                    3: { color: '#ff352e' },
                                    4: { color: '#007eff' }
                                }
                                
                            };

                            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                            chart.draw(data, options);
                        }
                    </script>
                    <div id="piechart" style="width: 900px; height: 500px;"></div>
                </div>
                <div class="col-6 mt-5">
                    <div class="col-12 w-50 ms-5"> 
                        <div class="card card-animate"  style="background-color: #EFF6FF;">
                            <div class="card-body">
                                    <div>
                                        <p class="fw-medium text-muted mb-0">Usuarios</p>
                                        <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value" data-target="28.05"><i class="fa-solid fa-user text-danger"></i> 0</span></h2>
                                    </div>
                            </div><!-- end card body -->
                        </div>
                    </div>
                    <div class="col-12 mt-5 w-50 ms-5">
                        <div class="card card-animate"  style="background-color: #EFF6FF;">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="fw-medium text-muted mb-0">Donadores</p>
                                        <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value" data-target="28.05"><i class="fa-solid fa-heart-circle-plus text-danger"></i> 0</span></h2>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div> <!-- end card-->
                    </div>
                    {{-- <div class="card card-height-100">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Usuarios Registrados</h4>
                            <div class="flex-shrink-0">
                                <div class="dropdown card-header-dropdown">
                                    <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="text-muted fs-16"><i class="mdi mdi-dots-vertical align-middle"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div><!-- end card header -->
                        <div class="card-body">
                            <div id="user_device_pie_charts" data-colors='["--vz-primary", "--vz-warning", "--vz-info"]' class="apex-charts" dir="ltr"></div>

                            <div class="table-responsive mt-3">
                                <table class="table table-borderless table-sm table-centered align-middle table-nowrap mb-0 w-10">
                                    <tbody class="border-0">
                                        <tr>
                                            <td>
                                                <h4 class="text-truncate fs-14 fs-medium mb-0"><i class="ri-stop-fill align-middle fs-18 text-primary me-2"></i>Usuarios</h4>
                                            </td>
                                            <td>
                                                <p class="text-muted mb-0"><i data-feather="users" class="me-2 icon-sm"></i>78.56k</p>
                                            </td>
                                            <td class="text-end">
                                                <p class="text-success fw-medium fs-12 mb-0"><i class="ri-arrow-up-s-fill fs-5 align-middle"></i>2.08% </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h4 class="text-truncate fs-14 fs-medium mb-0"><i class="ri-stop-fill align-middle fs-18 text-warning me-2"></i>Donadores</h4>
                                            </td>
                                            <td>
                                                <p class="text-muted mb-0"><i data-feather="users" class="me-2 icon-sm"></i>105.02k</p>
                                            </td>
                                            <td class="text-end">
                                                <p class="text-danger fw-medium fs-12 mb-0"><i class="ri-arrow-down-s-fill fs-5 align-middle"></i>10.52%
                                                </p>
                                            </td>
                                        </tr>
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card --> --}}
                </div><!-- end col -->
            </div>
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


</div>
<!-- end main content-->

</div>
<!-- END layout-wrapper -->



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

</div>
</body>

</html>