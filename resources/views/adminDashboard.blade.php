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
    <a href="index.html" class="app-brand-link">
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
      <a href="" class="menu-link">
      <span class="menu-header-text">Administrar Campañas</span>
      </a>
    </ul>


    <ul style="margin-left: 12px; margin-top:20px">
      <a href="" class="menu-link">
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
          
          <!-- Style Switcher -->
          <li class="nav-item dropdown-style-switcher dropdown me-2 me-xl-0">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
              <i class='ti ti-md'></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-styles">
              <li>
                <a class="dropdown-item" href="javascript:void(0);" data-theme="light">
                  <span class="align-middle"><i class='ti ti-sun me-2'></i>Light</span>
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="javascript:void(0);" data-theme="dark">
                  <span class="align-middle"><i class="ti ti-moon me-2"></i>Dark</span>
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="javascript:void(0);" data-theme="system">
                  <span class="align-middle"><i class="ti ti-device-desktop me-2"></i>System</span>
                </a>
              </li>
            </ul>
          </li>
          <!-- / Style Switcher-->
          

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
                <a class="dropdown-item" href="pages-profile-user.html">
                  <i class="ti ti-user-check me-2 ti-sm"></i>
                  <span class="align-middle">Mi Perfil</span>
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="pages-account-settings-account.html">
                  <i class="ti ti-settings me-2 ti-sm"></i>
                  <span class="align-middle">Editar Perfil</span>
                </a>
              </li>

              <li>
                <a class="dropdown-item" href="pages-faq.html">
                  <i class="ti ti-help me-2 ti-sm"></i>
                  <span class="align-middle">Mis Campañas</span>
                </a>
              </li>
              
              <li>
                <div class="dropdown-divider"></div>
              </li>
              
             
             
              <li>
                <a class="dropdown-item" href="auth-login-cover.html" target="_blank">
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
            
            
<div class="row">

  <!-- Sales last year -->
  <div class="col-xl-2 col-md-4 col-6 mb-4">
    <div class="card">
      <div class="card-header pb-0">
        <h5 class="card-title mb-0">Sales</h5>
        <small class="text-muted">Last Year</small>
      </div>
      <div id="salesLastYear"></div>
      <div class="card-body pt-0">
        <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
          <h4 class="mb-0">175k</h4>
          <small class="text-danger">-16.2%</small>
        </div>
      </div>
    </div>
  </div>

  <!-- Sessions Last month -->
  <div class="col-xl-2 col-md-4 col-6 mb-4">
    <div class="card">
      <div class="card-header pb-0">
        <h5 class="card-title mb-0">Sessions</h5>
        <small class="text-muted">Last Month</small>
      </div>
      <div class="card-body">
        <div id="sessionsLastMonth"></div>
        <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
          <h4 class="mb-0">45.1k</h4>
          <small class="text-success">+12.6%</small>
        </div>
      </div>
    </div>
  </div>

  <!-- Total Profit -->
  <div class="col-xl-2 col-md-4 col-6 mb-4">
    <div class="card">
      <div class="card-body">
        <div class="badge p-2 bg-label-danger mb-2 rounded"><i class="ti ti-currency-dollar ti-md"></i></div>
        <h5 class="card-title mb-1 pt-2">Total Profit</h5>
        <small class="text-muted">Last week</small>
        <p class="mb-2 mt-1">1.28k</p>
        <div class="pt-1">
          <span class="badge bg-label-secondary">-12.2%</span>
        </div>
      </div>
    </div>
  </div>

  <!-- Total Sales -->
  <div class="col-xl-2 col-md-4 col-6 mb-4">
    <div class="card">
      <div class="card-body">
        <div class="badge p-2 bg-label-info mb-2 rounded"><i class="ti ti-chart-bar ti-md"></i></div>
        <h5 class="card-title mb-1 pt-2">Total Sales</h5>
        <small class="text-muted">Last week</small>
        <p class="mb-2 mt-1">$4,673</p>
        <div class="pt-1">
          <span class="badge bg-label-secondary">+25.2%</span>
        </div>
      </div>
    </div>
  </div>

  <!-- Revenue Growth -->
  <div class="col-xl-4 col-md-6 mb-4">
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
  </div>


 
 

          </div>
          <!-- / Content -->

          
          

<!-- Footer -->
<footer class="content-footer footer bg-footer-theme">
  <div class="container-xxl">
    <div class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
      <div>
        © <script>
        document.write(new Date().getFullYear())

        </script>
        , Bloodme <a href="" target="_blank" class="fw-medium"></a>
      </div>
      <div class="d-none d-lg-inline-block">
        
        <a href="https://themeforest.net/licenses/standard" class="footer-link me-4" target="_blank">AQUI PONER UN FOOTER SI QUEREMOS</a>
       
      </div>
    </div>
  </div>
</footer>
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
  
</body>

</html>

<!-- beautify ignore:end -->

