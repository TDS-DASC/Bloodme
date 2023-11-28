<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
    <!-- Meta y títulos -->
    <meta charset="utf-8" />
    <title>Usuario</title>
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
                    <a class="nav-link" href="{{route('usuariosMainRuta')}}" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-dashboard-2-line fa-solid fa-circle-half-stroke text-danger"  style="color: #080908;"></i> <span class="ms-1" style="color: #080908;">Inicio</span> <!-- ===CAMBIAR ICONONOS A TODOS ========== -->
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-dashboard-2-line fa-solid fa-user text-danger"   style="color: #080908;"></i> <span class="ms-1" style="color: #080908;">Mapa</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-dashboard-2-line fa-solid fa-tents text-danger" style="color: #080908;"></i> <span class="ms-1" style="color: #080908;">Perfil</span>
                    </a>
                </li>
                
            </ul>
        </div>
    </div>
</nav>


    <!-- ========== FIN NAVBAR ========== -->
        <!-- Begin page -->
 <div id="layout-wrapper ">

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content mt-4 ">

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Campañas Activas</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="listjs-table" id="customerList">
                                <div class="row g-4 mb-3">
                                    <div class="col-sm-auto">
                                        <div>
                                            <button type="button" class="btn btn-danger add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#addModal" onclick="abrirURL('{{ route('agendarDonatorioRuta') }}')"><i class="ri-add-line align-bottom me-1"></i> Añadir</button>
                                           
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="d-flex justify-content-sm-end">
                                            <div class="search-box ms-2">
                                                <input type="text" class="form-control search" placeholder="Search...">
                                                <i class="ri-search-line search-icon"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive table-card mt-3 mb-1">
                                    <table class="table align-middle table-nowrap" id="customerTable">
                                        <thead class="table-light">
                                            <tr>
                                               
                                                <th class="sort" data-sort="customer_name">Nombre</th>
                                                <th class="sort" data-sort="email">Tipo de Sangre</th>
                                                <th class="sort" data-sort="phone">Ubicación</th>
                                                <th class="sort" data-sort="date">Unidades Solicitadas</th>
                                                <th class="sort" data-sort="date">Opciones</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            <tr>
                                                
                                                <td class="id" style="display:none;"><a href="javascript:void(0);" class="fw-medium link-primary">#VZ2101</a></td>
                                                <td class="customer_name">pedrito</td>
                                                <td class="email">A+</td>
                                                <td class="phone">googlemapas.com</td>
                                                <td class="phone">10</td>
                                                <td><button class="btn btn-sm btn-danger ir-item-btn" data-bs-toggle="modal" data-bs-target="#showModal">Ver</button></td>

                                               
                                            </tr>

                                            <td class="id" style="display:none;"><a href="javascript:void(0);" class="fw-medium link-primary">#VZ2101</a></td>
                                                <td class="customer_name">pedrito2</td>
                                                <td class="email">A+</td>
                                                <td class="phone">googlemapas.com</td>
                                                <td class="phone">10</td>
                                                <td><button class="btn btn-sm btn-danger ir-item-btn" data-bs-toggle="modal" data-bs-target="#showModal">          Ver       </button></td>
                                        </tbody>
                                    </table>
                                    
                                </div>
                            </div>
                        </div><!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

</div>
<!-- end main content-->

</div>
<!-- END layout-wrapper -->

</div>

<script>
  function abrirURL(url) {
    window.location.href = url;
  }
</script>
</body>

</html>