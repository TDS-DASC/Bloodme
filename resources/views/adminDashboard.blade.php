<!DOCTYPE html>

<!-- =========================================================
* Vuexy - Bootstrap Admin Template | v9.0.0
==============================================================

* Product Page: https://1.envato.market/vuexy_admin
* Created by: Pixinvent
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright Pixinvent (https://pixinvent.com)

=========================================================
 -->
<!-- beautify ignore:start -->


<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Administrador | Dashboard</title>

    
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 5" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://1.envato.market/vuexy_admin">
    <!-- BOOSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- ? PROD Only: Google Tag Manager (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-5J3LMKC');</script>
    <!-- End Google Tag Manager -->
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../images/logo.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;ampdisplay=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="../../assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/tabler-icons.css"/>
    <link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../assets/css/demo.css" />
    
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../../assets/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/typeahead-js/typeahead.css" /> 
    <link rel="stylesheet" href="../../assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->
    
    <!--jquery-->
<!-- Incluir date-fns (para manejar fechas) -->
<script src="https://cdn.skypack.dev/date-fns@2.22.1"></script>

<!-- Incluir flatpickr (para el selector de fechas) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


<!--fontawesome-->
<script src="https://kit.fontawesome.com/675de417d6.js" crossorigin="anonymous"></script>




   
    
</head>

<body>

  
  <!-- ?PROD Only: Google Tag Manager (noscript) (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5DDHKGP" height="0" width="0" style="display: none; visibility: hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  
  <!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar  ">
  <div class="layout-container">

    
    




<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

  
  <div class="app-brand demo ">
    <a href="{{ route('adminDashboardRuta') }}" class="app-brand-link">
    <span class="app-brand-logo demo">
        <svg width="40" height="40" viewBox="0 0 40 40" fill="none">
            <img src="../../images/logo.png" alt="Logo de BLOODME" style="width: 130%; height: auto;">
        </svg>
    </span>
      <span class="app-brand-text demo menu-text fw-bold">BLOODME</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
      <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
      <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  
  
  <ul class="menu-inner py-1">

    <!-- NavBar -->
    
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Barra de Navegación</span>
    </li>

    <ul style="margin-left: 12px; margin-top:20px">
      <a href="{{ route('adminDashboardRuta') }}" class="menu-link">
      <span class="menu-header-text">Dashboard</span>
      </a>
    </ul>

    <ul style="margin-left: 12px; margin-top:20px">
      <a href="{{ route('adminUsuariosRutas') }}" class="menu-link">
      <span class="menu-header-text">Administrar Usuarios</span>
      </a>
    </ul>


    <ul style="margin-left: 12px; margin-top:20px">
      <a href="{{ route('adminCitasRutas') }}" class="menu-link">
      <span class="menu-header-text">Administrar Citas</span>
      </a>
    </ul>

    <ul style="margin-left: 12px; margin-top:20px">
      <a href="{{ route('adminCampañasRutas') }}" class="menu-link">
      <span class="menu-header-text">Administrar Campañas</span>
      </a>
    </ul>

    <ul style="margin-left: 12px; margin-top:20px">
      <a href="{{ route('adminUnidadesRutas') }}" class="menu-link">
      <span class="menu-header-text">Administrar Unidades Medicas</span>
      </a>
    </ul>

   <!-- FIN NAVBAR-->


  </ul>
  

</aside>
<!-- / Menu -->

    <!-- Layout container -->
    <div class="layout-page">
      

<!-- Navbar -->

<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
  
      <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0   d-xl-none ">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
          <i class="ti ti-menu-2 ti-sm"></i>
        </a>
      </div>
      

      <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

        
        <!-- HEADER -->
        <div class="navbar-nav align-items-center">
          <div class="nav-item navbar-search-wrapper mb-0">
              <span class="d-none d-md-inline-block text-muted">DASHBOARD ADMINISTRATIVOS</span>
            </a>
          </div>
        </div>
        <!-- /HEADER -->
        

        <ul class="navbar-nav flex-row align-items-center ms-auto">
        
          <!-- User -->
          <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
              <div class="avatar avatar-online">
                <img src="../../assets/img/avatars/1.png" alt class="h-auto rounded-circle">
              </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                <a class="dropdown-item" href="pages-account-settings-account.html">
                  <div class="d-flex">
                    <div class="flex-shrink-0 me-3">
                      <div class="avatar avatar-online">
                        <img src="../../assets/img/avatars/1.png" alt class="h-auto rounded-circle">
                      </div>
                    </div>
                    <div class="flex-grow-1">
                      <span class="fw-medium d-block">John Doe</span>
                      <small class="text-muted">Admin</small>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <div class="dropdown-divider"></div>
              </li>
             
              <li>
                <a class="dropdown-item" href="{{route('loginHome')}}">
                  <i class="ti ti-logout me-2 ti-sm"></i>
                  <span class="align-middle">Log Out</span>
                </a>
              </li>
            </ul>
          </li>
          <!--/ User -->
          


        </ul>
      </div>
      
      <!-- Search Small Screens -->
      
      
      
</nav>

<!-- / Navbar -->

      

      <!-- Content wrapper -->
      <div class="content-wrapper">

        <!-- Content -->
        
          <div class="container-xxl flex-grow-1 container-p-y">
            
<div class="d-flex flex-direction-row ">
  <div class="w-40">
    <div class="row" style="margin-left: 50%">
      <div style="margin-left: 5%">
        <div id="calendarioContainer" class="col-6 mt-5"></div>
        <div class="puntito"></div>
        <p style="display: inline-block; margin-top: 15px;">Día con citas</p>
      </div>
    </div>
  </div>
  <div style="margin-left: 30%">
    <div class="row">
      <div class="col-xl-3 col-md-4 col-6 mb-4 w-50">
        <div class="card h-100 d-flex flex-column">
          <div class="card-header pb-0">
            <h5 class="card-title mb-0">Usuarios</h5>
            <small class="text-muted">Número de usuarios</small>
          </div>
          <div id="salesLastYear"></div>
          <div class="card-body pt-0">
            <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
              <h4 class="mb-0">
                <i class="fa-solid fa-user"></i>
                <span id="usuariosDiv"></span>
              </h4>
              <small class="text-danger"></small>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-4 col-6 mb-4 w-50">
        <div class="card h-100 d-flex flex-column">
            <div class="card-header pb-0">
                <h5 class="card-title mb-0">Donadores</h5>
                <small class="text-muted">Número de donadores</small>
            </div>
            <div class="card-body">
                <div id="sessionsLastMonth"></div>
                <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
                    <h4>
                        <i class="fa-solid fa-hand-holding-dollar"></i>
                        <span id="donadoresCount"></span>
                    </h4>
                </div>
            </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xl-3 col-md-4 col-6 mb-4 w-50">
        <div class="card h-100 d-flex flex-column">
            <div class="card-header pb-0">
                <h5 class="card-title mb-0">Campañas activas</h5>
                <small class="text-muted">Número de campañas activas</small>
            </div>
            <div class="card-body">
                <div id="sessionsLastMonth"></div>
                <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
                    <h4>
                        <i class="fa-solid fa-house"></i>
                        <span id="campagnasActivas"></span>
                    </h4>
                </div>
            </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-4 col-6 mb-4 w-50">
        <div class="card h-100 d-flex flex-column">
            <div class="card-header pb-0">
                <h5 class="card-title mb-0">Unidades médicas</h5>
                <small class="text-muted">Número de unidades médicas</small>
            </div>
            <div class="card-body">
                <div id="sessionsLastMonth"></div>
                <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
                    <h4>
                        <i class="fa-solid fa-notes-medical"></i>
                        <span id="unidadesMedicas"></span>
                    </h4>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>    
{{-- <div class="row"> --}}

  <!-- Sales last year -->
  {{-- <div class="col-xl-3 col-md-4 col-6 mb-4">
    <div class="card h-100 d-flex flex-column">
      <div class="card-header pb-0">
        <h5 class="card-title mb-0">Usuarios</h5>
        <small class="text-muted">Número de usuarios</small>
      </div>
      <div id="salesLastYear"></div>
      <div class="card-body pt-0">
        <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
          <h4 class="mb-0">
            <i class="fa-solid fa-user"></i>
            <span id="usuariosDiv"></span>
          </h4>
          <small class="text-danger"></small>
        </div>
      </div>
    </div>
</div> --}}


  <!-- Sessions Last month -->
  <!-- Donadores Count -->
{{-- <div class="col-xl-3 col-md-4 col-6 mb-4">
  <div class="card h-100 d-flex flex-column">
      <div class="card-header pb-0">
          <h5 class="card-title mb-0">Donadores</h5>
          <small class="text-muted">Número de donadores</small>
      </div>
      <div class="card-body">
          <div id="sessionsLastMonth"></div>
          <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
              <h4>
                  <i class="fa-solid fa-hand-holding-dollar"></i>
                  <span id="donadoresCount"></span>
              </h4>
          </div>
      </div>
  </div>
</div> --}}


  <!-- Total Profit -->
  <!-- Campañas Activas -->
{{-- <div class="col-xl-3 col-md-4 col-6 mb-4">
  <div class="card h-100 d-flex flex-column">
      <div class="card-header pb-0">
          <h5 class="card-title mb-0">Campañas activas</h5>
          <small class="text-muted">Número de campañas activas</small>
      </div>
      <div class="card-body">
          <div id="sessionsLastMonth"></div>
          <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
              <h4>
                  <i class="fa-solid fa-house"></i>
                  <span id="campagnasActivas"></span>
              </h4>
          </div>
      </div>
  </div>
</div> --}}


    <!-- Total Sales -->
    <!-- Unidades Médicas -->
{{-- <div class="col-xl-3 col-md-4 col-6 mb-4">
  <div class="card h-100 d-flex flex-column">
      <div class="card-header pb-0">
          <h5 class="card-title mb-0">Unidades médicas</h5>
          <small class="text-muted">Número de unidades médicas</small>
      </div>
      <div class="card-body">
          <div id="sessionsLastMonth"></div>
          <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
              <h4>
                  <i class="fa-solid fa-notes-medical"></i>
                  <span id="unidadesMedicas"></span>
              </h4>
          </div>
      </div>
  </div>
</div> --}}


  
  
  <!-- Revenue Growth -->
  {{-- <div class="col-xl-4 col-md-6 mb-4">
    <div class="card h-100">
      <div class="card-header d-flex justify-content-between">
        <div class="card-title mb-0">
          <h5 class="mb-0">Active Project</h5>
          <small class="text-muted">Average 72% Completed</small>
        </div>
        <div class="dropdown">
          <button class="btn p-0" type="button" id="activeProjects" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ti ti-dots-vertical ti-sm text-muted"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="activeProjects">
            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
            <a class="dropdown-item" href="javascript:void(0);">Download</a>
            <a class="dropdown-item" href="javascript:void(0);">View All</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <ul class="p-0 m-0">
          <li class="mb-3 pb-1 d-flex">
            <div class="d-flex w-50 align-items-center me-3">
              <img src="../../assets/img/icons/brands/laravel-logo.png" alt="laravel-logo" class="me-3" width="35" />
              <div>
                <h6 class="mb-0">Laravel</h6>
                <small class="text-muted">eCommerce</small>
              </div>
            </div>
            <div class="d-flex flex-grow-1 align-items-center">
              <div class="progress w-100 me-3" style="height:8px;">
                <div class="progress-bar bg-danger" role="progressbar" style="width: 54%" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100">
                </div>
              </div>
              <span class="text-muted">54%</span>
            </div>
          </li>
          <li class="mb-3 pb-1 d-flex">
            <div class="d-flex w-50 align-items-center me-3">
              <img src="../../assets/img/icons/brands/figma-logo.png" alt="figma-logo" class="me-3" width="35" />
              <div>
                <h6 class="mb-0">Figma</h6>
                <small class="text-muted">App UI Kit</small>
              </div>
            </div>
            <div class="d-flex flex-grow-1 align-items-center">
              <div class="progress w-100 me-3" style="height:8px;">
                <div class="progress-bar bg-primary" role="progressbar" style="width: 86%" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100">
                </div>
              </div>
              <span class="text-muted">86%</span>
            </div>
          </li>
          <li class="mb-3 pb-1 d-flex">
            <div class="d-flex w-50 align-items-center me-3">
              <img src="../../assets/img/icons/brands/vue-logo.png" alt="vue-logo" class="me-3" width="35" />
              <div>
                <h6 class="mb-0">VueJs</h6>
                <small class="text-muted">Calendar App</small>
              </div>
            </div>
            <div class="d-flex flex-grow-1 align-items-center">
              <div class="progress w-100 me-3" style="height:8px;">
                <div class="progress-bar bg-success" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                </div>
              </div>
              <span class="text-muted">90%</span>
            </div>
          </li>
          <li class="mb-3 pb-1 d-flex">
            <div class="d-flex w-50 align-items-center me-3">
              <img src="../../assets/img/icons/brands/react-logo.png" alt="react-logo" class="me-3" width="35" />
              <div>
                <h6 class="mb-0">React</h6>
                <small class="text-muted">Dashboard</small>
              </div>
            </div>
            <div class="d-flex flex-grow-1 align-items-center">
              <div class="progress w-100 me-3" style="height:8px;">
                <div class="progress-bar bg-info" role="progressbar" style="width: 37%" aria-valuenow="37" aria-valuemin="0" aria-valuemax="100">
                </div>
              </div>
              <span class="text-muted">37%</span>
            </div>
          </li>
          <li class="mb-3 pb-1 d-flex">
            <div class="d-flex w-50 align-items-center me-3">
              <img src="../../assets/img/icons/brands/bootstrap-logo.png" alt="bootstrap-logo" class="me-3" width="35" />
              <div>
                <h6 class="mb-0">Bootstrap</h6>
                <small class="text-muted">Website</small>
              </div>
            </div>
            <div class="d-flex flex-grow-1 align-items-center">
              <div class="progress w-100 me-3" style="height:8px;">
                <div class="progress-bar bg-primary" role="progressbar" style="width: 22%" aria-valuenow="22" aria-valuemin="0" aria-valuemax="100">
                </div>
              </div>
              <span class="text-muted">22%</span>
            </div>
          </li>
          <li class="d-flex">
            <div class="d-flex w-50 align-items-center me-3">
              <img src="../../assets/img/icons/brands/sketch-logo.png" alt="sketch-logo" class="me-3" width="35" />
              <div>
                <h6 class="mb-0">Sketch</h6>
                <small class="text-muted">Website Design</small>
              </div>
            </div>
            <div class="d-flex flex-grow-1 align-items-center">
              <div class="progress w-100 me-3" style="height:8px;">
                <div class="progress-bar bg-warning" role="progressbar" style="width: 29%" aria-valuenow="29" aria-valuemin="0" aria-valuemax="100">
                </div>
              </div>
              <span class="text-muted">29%</span>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>

 <!-- FIN GROWTH -->
 
 


  <!-- Project Status -->
  <div class="col-12 col-xl-4 mb-4 col-md-6">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <h5 class="mb-0 card-title">Project Status</h5>
        <div class="dropdown">
          <button class="btn p-0" type="button" id="projectStatusId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ti ti-dots-vertical ti-sm text-muted"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="projectStatusId">
            <a class="dropdown-item" href="javascript:void(0);">View More</a>
            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="d-flex align-items-start">
          <div class="badge rounded bg-label-warning p-2 me-3 rounded"><i class="ti ti-currency-dollar ti-sm"></i></div>
          <div class="d-flex justify-content-between w-100 gap-2 align-items-center">
            <div class="me-2">
              <h6 class="mb-0">$4,3742</h6>
              <small class="text-muted">Your Earnings</small>
            </div>
            <p class="mb-0 text-success">+10.2%</p>
          </div>
        </div>
        <div id="projectStatusChart"></div>
        <div class="d-flex justify-content-between mb-3">
          <h6 class="mb-0">Donates</h6>
          <div class="d-flex">
            <p class="mb-0 me-3">$756.26</p>
            <p class="mb-0 text-danger">-139.34</p>
          </div>
        </div>
        <div class="d-flex justify-content-between mb-3 pb-1">
          <h6 class="mb-0">Podcasts</h6>
          <div class="d-flex">
            <p class="mb-0 me-3">$2,207.03</p>
            <p class="mb-0 text-success">+576.24</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--RENEVUE GRWOTH--> 

  <div class="col-xl-4 col-md-8 mb-4">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <div class="d-flex flex-column">
            <div class="card-title mb-auto">
              <h5 class="mb-1 text-nowrap">Revenue Growth</h5>
              <small>Weekly Report</small>
            </div>
            <div class="chart-statistics">
              <h3 class="card-title mb-1">$4,673</h3>
              <span class="badge bg-label-success">+15.2%</span>
            </div>
          </div>
          <div id="revenueGrowth"></div>
        </div>
      </div>
    </div>
  </div> --}}
          </div>
          <!-- / Content -->

          
    <!--Gráfica de unidades médicas y donaciones-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    
    <script type="text/javascript">
      // Variables para almacenar datos
      let donaciones = 0;
      let unidadesCount = 0;
  
      // Espera a que el DOM esté listo
      $(document).ready(function () {
        // Realiza una solicitud AJAX al backend para obtener la lista de donaciones
        $.ajax({
          url: 'http://127.0.0.1:8000/api/donations/',
          method: 'GET',
          dataType: 'json',
          success: function (response) {
            if (response.donations) {
              donaciones = response.donations.length;
              drawComparisonChart(); // Llama a la función de dibujo después de obtener los datos
            } else {
              console.error('Error al obtener la lista de donaciones.');
            }
          },
          error: function () {
            console.error('Error en la solicitud AJAX para donaciones.');
          }
        });
  
        // Realiza una solicitud AJAX al backend para obtener la lista de unidades médicas
        $.ajax({
          url: 'http://127.0.0.1:8000/api/medunits/',
          method: 'GET',
          dataType: 'json',
          success: function (response) {
            if (response.MedicalUnits) {
              unidadesCount = response.MedicalUnits.length;
              drawComparisonChart(); // Llama a la función de dibujo después de obtener los datos
            } else {
              console.error('Error al obtener las unidades médicas.');
            }
          },
          error: function () {
            console.error('Error en la solicitud AJAX para unidades médicas.');
          }
        });
      });
  
      // Carga Google Charts y llama a la función de dibujo después de cargar
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawComparisonChart);
  
      // Función para dibujar la gráfica de comparación
      function drawComparisonChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Count'],
          ['Unidades Médicas', unidadesCount],
          ['Donaciones', donaciones],
        ]);
  
        var options = {
          title: 'Comparación entre Unidades Médicas y Donaciones',
          slices: {
            0: { color: '#f94561' },
            1: { color: '#00c8fd' }
          },
        };
  
        var chart = new google.visualization.PieChart(document.getElementById('comparisonChart'));
        chart.draw(data, options);
      }
    </script>
    
    <!--Gráfica de usuarios y donadores-->
    <script>
      let donadoresCount = 0;
      let usersCount = 0;
    
      // Espera a que el DOM esté listo
      $(document).ready(function () {
        // Realiza una solicitud AJAX al backend para obtener la lista de usuarios
        $.ajax({
          url: 'http://127.0.0.1:8000/api/users/',
          method: 'GET',
          dataType: 'json',
          success: function (response) {
            if (response.users) {
              usersCount = response.users.length;
              donadoresCount = response.users.filter(user => user.donator === 1).length;
              // Llama a la función drawCharts después de actualizar los valores
              drawCharts();
            } else {
              console.error('Error al obtener la lista de usuarios.');
            }
          },
          error: function () {
            console.error('Error en la solicitud AJAX.');
          }
        });
      });
    
      // Carga la librería de Google Charts y luego llama a drawCharts
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawCharts);
    
      function drawCharts() {
        drawUserChart();
      }
    
      function drawUserChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Usuarios', usersCount],
          ['Donadores', donadoresCount],
        ]);
    
        var options = {
          title: 'Datos generales de los usuarios',
          is3D: true,
          slices: {
            0: { color: '#f94561' },
            1: { color: '#00c8fd' }
          }
        };
    
        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
    
        chart.draw(data, options);
      }
    </script>
    <div class="w-100">
      <div class="row">
        <div id="piechart_3d" style="width: 30%; height: 500px;  float: right; margin-left: .8em" class="col-4"></div>
        <div id="comparisonChart" style="width: 30%; height: 500px;" class="col-4"></div>
        <div id="barchart_values" class="col-4"></div>
      </div>
    </div>


    
    <!-- Gráfica de tipos de sangre -->
<script type="text/javascript">
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart(data) {
    // var defaultData = [
    //   ["Element", "Density", { role: "style" }],
    //   ["Copper", 8.94, "#b87333"],
    //   ["Silver", 10.49, "silver"],
    //   ["Gold", 19.30, "gold"],
    //   ["Platinum", 21.45, "color: #e5e4e2"]
    // ];

    // data = data || defaultData;

    var chartData = google.visualization.arrayToDataTable(data);

    var view = new google.visualization.DataView(chartData);
    view.setColumns([0, 1,
                     { calc: "stringify",
                       sourceColumn: 1,
                       type: "string",
                       role: "annotation" },
                     2]);

    var options = {
      title: "Tipos de Sangre",
      width: 450,
      height: 400,
      bar: {groupWidth: "95%"},
      legend: { position: "none" },
    };

    var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
    chart.draw(view, options);
  }

  $(document).ready(function () {
    // Realiza una solicitud AJAX al backend para obtener la lista de usuarios
    $.ajax({
      url: 'http://127.0.0.1:8000/api/users/',
      method: 'GET',
      dataType: 'json',
      success: function (response) {
        if (response.users) {
          const tiposSangre = response.users.map(user => user.blood_type);
          
          // Cuenta la frecuencia de cada tipo de sangre
          const frecuenciaTiposSangre = contarFrecuencia(tiposSangre);

          // Convierte los datos al formato necesario para la gráfica
          const data = [["Tipo de Sangre", "Frecuencia", { role: "style" }]];
          Object.entries(frecuenciaTiposSangre).forEach(([tipo, frecuencia]) => {
            data.push([tipo, frecuencia, getColorForBloodType(tipo)]);
          });

          // Llama a drawChart con los datos específicos
          drawChart(data);
        } else {
          console.error('Error al obtener la lista de usuarios.');
        }
      },
      error: function () {
        console.error('Error en la solicitud AJAX.');
      }
    });
  });

  // Función para contar la frecuencia de elementos en un array
  function contarFrecuencia(arr) {
    return arr.reduce((acc, val) => {
      acc[val] = (acc[val] || 0) + 1;
      return acc;
    }, {});
  }

  // Función para obtener un color para cada tipo de sangre
  function getColorForBloodType(tipo) {
    const colores = {
      "A+": "#FADBD8",
      "A-": "#F5B7B1",
      "B+": "#F1948A",
      "B-": "#EC7063",
      "AB+": "#E74C3C",
      "AB-": "#CB4335",
      "O+": "#B03A2E",
      "O-": "#943126",
      // ... agrega más tipos de sangre si es necesario
    };

    return colores[tipo] || "#F0CC90"; 
  }
</script>
{{-- <div id="piechart_3d" style="width: 48%; height: 500px;  float: left"></div> --}}

{{-- <div class="row">
  <div id="barchart_values" class="col-6 mt-5" style="margin-bottom: -390px;"></div>
  <div style="margin-left:800px; width: auto;">
    <div id="calendarioContainer" class="col-6 mt-5"></div>
    <div class="puntito"></div>
    <p style="display: inline-block; margin-top: 15px;">Día con citas</p>
  </div>
</div> --}}

<style>
  .puntito{
    background: #fa4062;
    border-radius: 100%;
    width: 1em;
    height: 1em;
    display: inline-block;
  }
</style>

<div class="d-flex flex-row"> 


   <!-- <div class="col-xl-3 col-md-4 col-6 mt-5 ms-5">
    <div class="card">
      <div class="card-header pb-0">
        <h5 class="card-title mb-0">Donaciones realizadas</h5>
        <small class="text-muted">Número de donaciones realizadas</small>
      </div>
      <div class="card-body">
        <div id="sessionsLastMonth"></div>
        <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
          <h4 class="mb-0" id="donacionesRealizadas"></h4>
        </div>
      </div>
    </div>
  </div>
</div>  -->



<!-- <div id="calendarioContainer"></div> -->

<script>
  const calendarioContainer = document.getElementById('calendarioContainer');

  const formatFechaDonacion = (fechaDonacion) => {
    const fecha = new Date(fechaDonacion);
    // Ajustar a la zona horaria local
    fecha.setMinutes(fecha.getMinutes() - fecha.getTimezoneOffset());
    const año = fecha.getFullYear();
    const mes = fecha.getMonth() + 1;
    const dia = fecha.getDate();
    return `${año}-${mes < 10 ? '0' : ''}${mes}-${dia < 10 ? '0' : ''}${dia}`;
  };

  const aplicarEstilos = (fechasMarcadas, instance) => {
    // Obtener todos los elementos de día en el calendario, independientemente del mes actual
    const dayElements = instance.daysContainer.querySelectorAll('.flatpickr-day');

    // Remover la clase de estilo de todos los días
    dayElements.forEach(dayElement => {
      dayElement.classList.remove('donation-day');
    });

    // Aplicar la clase de estilo solo a las fechas marcadas
    dayElements.forEach(dayElement => {
      const fechaElemento = formatFechaDonacion(dayElement.getAttribute('aria-label'));
      const debeMarcar = fechasMarcadas.includes(fechaElemento);

      if (debeMarcar) {
        dayElement.classList.add('donation-day');
      }
    });
  };

  const opcionesFlatpickr = {
    inline: true,
    onReady: function (selectedDates, dateStr, instance) {
      // Llamar a la función aplicarEstilos cuando el calendario esté listo
      fetch('http://127.0.0.1:8000/api/donationsdate/')
        .then(response => {
          if (!response.ok) {
            throw new Error('Error al obtener la lista de citas. Código de estado: ' + response.status);
          }
          return response.json();
        })
        .then(data => {
          if (data.donationDates) {
            const fechasMarcadas = data.donationDates.map(fechaDonacion => formatFechaDonacion(fechaDonacion.date_donation));
            aplicarEstilos(fechasMarcadas, instance);
          } else {
            throw new Error('Formato de respuesta inesperado. Se esperaba un campo "donationDates" de tipo array.');
          }
        })
        .catch(error => {
          console.error('Error al cargar citas:', error);
        });
    },
    onChange: function (selectedDates, dateStr, instance) {
      // Llamar a la función aplicarEstilos cuando cambia la fecha seleccionada
      fetch('http://127.0.0.1:8000/api/donationsdate/')
        .then(response => response.json())
        .then(data => {
          const fechasMarcadas = data.donationDates.map(fechaDonacion => formatFechaDonacion(fechaDonacion.date_donation));
          aplicarEstilos(fechasMarcadas, instance);
        })
        .catch(error => {
          console.error('Error al cargar citas:', error);
        });
    },
    onMonthChange: function (selectedDates, dateStr, instance) {
      // Llamar a la función aplicarEstilos cuando cambia el mes
      fetch('http://127.0.0.1:8000/api/donationsdate/')
        .then(response => response.json())
        .then(data => {
          const fechasMarcadas = data.donationDates.map(fechaDonacion => formatFechaDonacion(fechaDonacion.date_donation));
          aplicarEstilos(fechasMarcadas, instance);
        })
        .catch(error => {
          console.error('Error al cargar citas:', error);
        });
    }
  };

  const calendario = flatpickr(calendarioContainer, opcionesFlatpickr);
</script>
{{-- <div id="barchart_values" class="col-6 mt-5" style="margin: -390px auto;"></div> --}}
<style>
  .donation-day {
    background-color: #fa4062 !important;
    color: white !important;
  }
</style>




<!-- Footer -->
 {{-- <footer class="content-footer footer bg-footer-theme">
  <div class="container-xxl">
    <div class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
      <div>
        © <script>
        document.write(new Date().getFullYear())

        </script>
        , Bloodme <a href="" target="_blank" class="fw-medium"></a>
      </div>
      <div class="d-none d-lg-inline-block">
        
       
      </div>
    </div>
  </div>
</footer> --}}
<!-- / Footer -->

          
          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    
    
    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    
    
    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
    
  </div>
  <!-- / Layout wrapper -->

  

  

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  
  <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
  <script src="../../assets/vendor/libs/popper/popper.js"></script>
  <script src="../../assets/vendor/js/bootstrap.js"></script>
  <script src="../../assets/vendor/libs/node-waves/node-waves.js"></script>
  <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="../../assets/vendor/libs/hammer/hammer.js"></script>
  <script src="../../assets/vendor/libs/i18n/i18n.js"></script>
  <script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>
   <script src="../../assets/vendor/js/menu.js"></script>
  
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="../../assets/vendor/libs/apex-charts/apexcharts.js"></script>

  <!-- Main JS -->
  <script src="../../assets/js/main.js"></script>
  

  <!-- Page JS -->
  <script src="../../assets/js/dashboards-crm.js"></script>

  <!--http://127.0.0.1:8000/api/users/-->
  <!-- ... tu código HTML anterior ... -->

<script>
  // Espera a que el DOM esté listo
  $(document).ready(function () {
    // Realiza una solicitud AJAX al backend para obtener la lista de usuarios
    $.ajax({
      url: 'http://127.0.0.1:8000/api/users/', // Reemplaza con la ruta correcta
      method: 'GET', // O el método HTTP correcto
      dataType: 'json',
      success: function (response) {
        // Verifica si la respuesta del backend es exitosa
        if (response.users) {
          // Actualiza el contenido del div "usuariosDiv" con la longitud del array de usuarios
          $('#usuariosDiv').text(response.users.length);

          // Filtra los donadores (donator = 1) y cuenta su número
          const donadoresCount = response.users.filter(user => user.donator === 1).length;
          
          // Actualiza el contenido del div "donadoresCount" con el número de donadores
          $('#donadoresCount').text(donadoresCount);

          const tiposSangre = response.users.map(user => user.blood_type);
        } else {
          // Maneja el caso en el que la respuesta no fue exitosa
          console.error('Error al obtener la lista de usuarios.');
        }
      },
      error: function () {
        // Maneja el caso de un error en la solicitud AJAX
        console.error('Error en la solicitud AJAX.');
      }
    });
  });

  // Espera a que el DOM esté listo
  $(document).ready(function () {
  // Realiza una solicitud AJAX al backend para obtener la lista de campañas activas
  $.ajax({
    url: 'http://127.0.0.1:8000/api/campaigns', // Reemplaza con la ruta correcta
    method: 'GET', // O el método HTTP correcto
    dataType: 'json',
    success: function (response) {
      // Verifica si la respuesta del backend es exitosa
      if (response.Campaigns) { // Cambiado a response.Campaigns con mayúscula inicial
        // Actualiza el contenido del div "campagnasActivas" con la longitud del array de campañas activas
        $('#campagnasActivas').text(response.Campaigns.length);
      } else {
        // Maneja el caso en el que la respuesta no fue exitosa
        console.error('Error al obtener la lista de campañas activas.');
      }
    },
    error: function () {
      // Maneja el caso de un error en la solicitud AJAX
      console.error('Error en la solicitud AJAX.');
    }
  });
});

// Espera a que el DOM esté listo
$(document).ready(function () {
    // Realiza una solicitud AJAX al backend para obtener la lista de unidades médicas
    $.ajax({
      url: 'http://127.0.0.1:8000/api/medunits', // Reemplaza con la ruta correcta
      method: 'GET', // O el método HTTP correcto
      dataType: 'json',
      success: function (response) {
        // Verifica si la respuesta del backend es exitosa
        if (response.MedicalUnits) { // Cambiado a response.medicalUnits con mayúscula inicial
          // Actualiza el contenido del div "unidadesMedicas" con la longitud del array de unidades médicas
          $('#unidadesMedicas').text(response.MedicalUnits.length);
        } else {
          // Maneja el caso en el que la respuesta no fue exitosa
          console.error('Error al obtener la lista de unidades médicas.');
        }
      },
      error: function () {
        // Maneja el caso de un error en la solicitud AJAX
        console.error('Error en la solicitud AJAX.');
      }
    });
  });


  // Espera a que el DOM esté listo
  $(document).ready(function () {
    // Realiza una solicitud AJAX al backend para obtener la lista de usuarios
    $.ajax({
      url: 'http://127.0.0.1:8000/api/donations/', // Reemplaza con la ruta correcta
      method: 'GET', // O el método HTTP correcto
      dataType: 'json',
      success: function (response) {
        // Verifica si la respuesta del backend es exitosa
        if (response) {
          $('#donacionesRealizadas').text(response.donations.length);
        } else {
          // Maneja el caso en el que la respuesta no fue exitosa
          console.error('Error al obtener la lista de usuarios.');
        }
      },
      error: function () {
        // Maneja el caso de un error en la solicitud AJAX
        console.error('Error en la solicitud AJAX.');
      }
    });
  });
  
</script>

<!-- ... tu código HTML posterior ... -->

  
  
</body>

</html>

<!-- beautify ignore:end -->


