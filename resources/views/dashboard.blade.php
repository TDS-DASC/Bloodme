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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


    <style>
        header {
            background-color: #eff6ff;
        }

        nav.navbar {
            height: 50px; 
        }

    </style>

  
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
                            <!--<img class="rounded-circle header-profile-user" src="assets/images/users/avatar-1.jpg" alt="Avatar"    (aqui luego poner imagen)>-->
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
                        <i class="ri-dashboard-2-line fa-solid fa-circle-half-stroke text-danger"  style="color: #080908;"></i> <span class="ms-1" style="color: #080908;">Dashboards</span>
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
<div class="dashboards ml-5 mt-4">

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

            <div class="row"> <!-- AQUI EMPIEZA LA GRAFICA -->
    <div class="col-6 ml-4"> <!-- Cambiado a col-6 y añadida ml-4 -->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Task', 'Value', { role: 'style' }],
                    ['Campañas', 11, '#D90600'],
                    ['Solicitudes', 2, '#FF0700'],
                    ['Donaciones', 2, '#FF7470'],
                    ['Usuarios', 10, '#e6ebef'],
                    ['Donadores', 7, '#007eff']
                ]);

                var options = {
                    title: 'Datos generales',
                    bars: 'vertical',
                    legend: { position: 'none' },
                    hAxis: { title: 'Task' },
                    colors: ['#D90600', '#FF0700', '#FF7470', '#e6ebef', '#007eff']
                };

                var chart = new google.visualization.ColumnChart(document.getElementById('barchart'));

                chart.draw(data, options);
            }
        </script>
        <div id="barchart" style="width: 900px; height: 500px;"></div>
    </div>

    <div class="col-6 mt-4"> <!-- Cambiado a mt-4 -->
        <div class="col-12 w-50 ml-4"> <!-- Añadida ml-4 -->
            <div class="card card-animate" style="background-color: #EFF6FF;">
                <div class="card-body">
                    <div>
                        <p class="fw-medium text-muted mb-0">Usuarios</p>
                        <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value" data-target="28.05"><i class="fa-solid fa-user text-danger"></i> 0</span></h2>
                    </div>
                </div><!-- end card body -->
            </div>
        </div>
        <div class="col-12 mt-4 w-50 ml-3"> <!-- Añadida ml-3 -->
            <div class="card card-animate" style="background-color: #EFF6FF;">
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

<!-- NO FUNCIONA, INTENTO DE BARRA DE NAVEGACION FUNCIONAL -->
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