<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
    <!-- Meta y títulos -->
    <meta charset="utf-8" />
    <title>Agendar Citas</title>
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
<div id="layout-wrapper">
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content mt-4">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Agendar Cita</h4>
                            
                        </div><!-- end card header -->

                        <div class="card-body">

                            <div class="live-preview">
                                <form class="row g-3">
                                    
                                    <div class="col-md-4">
                                    <div>
                                            <label for="exampleInputdate" class="form-label">Input Date</label>
                                            <input type="date" class="form-control" id="exampleInputdate">
                                        </div>
                                    </div>
                                   

                                    <div class="col-md-3">
                                        <label for="validationDefault05" class="form-label">AQUI VA EL  MAPA NO SE QUE PONER MIENTRAS</label>
                                        <input type="text" class="form-control" id="validationDefault05" required>
                                    </div>


                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                                            <label class="form-check-label" for="invalidCheck2">
                                                Verifica si los datos estan correctos
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-danger" type="submit">Confirmar Cita</button>
                                    </div>
                                </form>
                            </div>


                            <div class="d-none code-view">
                                <pre class="language-markup" style="height: 352px">
                                    <code>&lt;form class=&quot;row g-3&quot;&gt;
                                    &lt;div class=&quot;col-md-4&quot;&gt;
                                    &lt;label for=&quot;validationDefault01&quot; class=&quot;form-label&quot;&gt;First name&lt;/label&gt;
                                    &lt;input type=&quot;text&quot; class=&quot;form-control&quot; id=&quot;validationDefault01&quot; value=&quot;Mark&quot; required&gt;
                                    &lt;/div&gt;
                                    &lt;div class=&quot;col-md-4&quot;&gt;
                                    &lt;label for=&quot;validationDefault02&quot; class=&quot;form-label&quot;&gt;Last name&lt;/label&gt;
                                    &lt;input type=&quot;text&quot; class=&quot;form-control&quot; id=&quot;validationDefault02&quot; value=&quot;Otto&quot; required&gt;
                                    &lt;/div&gt;
                                    &lt;div class=&quot;col-md-4&quot;&gt;
                                    &lt;label for=&quot;validationDefaultUsername&quot; class=&quot;form-label&quot;&gt;Username&lt;/label&gt;
                                    &lt;div class=&quot;input-group&quot;&gt;
                                        &lt;span class=&quot;input-group-text&quot; id=&quot;inputGroupPrepend2&quot;&gt;@&lt;/span&gt;
                                        &lt;input type=&quot;text&quot; class=&quot;form-control&quot; id=&quot;validationDefaultUsername&quot; aria-describedby=&quot;inputGroupPrepend2&quot;
                                            required&gt;
                                    &lt;/div&gt;
                                    &lt;/div&gt;
                                    &lt;div class=&quot;col-md-6&quot;&gt;
                                    &lt;label for=&quot;validationDefault03&quot; class=&quot;form-label&quot;&gt;City&lt;/label&gt;
                                    &lt;input type=&quot;text&quot; class=&quot;form-control&quot; id=&quot;validationDefault03&quot; required&gt;
                                    &lt;/div&gt;
                                    &lt;div class=&quot;col-md-3&quot;&gt;
                                    &lt;label for=&quot;validationDefault04&quot; class=&quot;form-label&quot;&gt;State&lt;/label&gt;
                                    &lt;select class=&quot;form-select&quot; id=&quot;validationDefault04&quot; required&gt;
                                        &lt;option selected disabled value=&quot;&quot;&gt;Choose...&lt;/option&gt;
                                        &lt;option&gt;...&lt;/option&gt;
                                    &lt;/select&gt;
                                    &lt;/div&gt;
                                    &lt;div class=&quot;col-md-3&quot;&gt;
                                    &lt;label for=&quot;validationDefault05&quot; class=&quot;form-label&quot;&gt;Zip&lt;/label&gt;
                                    &lt;input type=&quot;text&quot; class=&quot;form-control&quot; id=&quot;validationDefault05&quot; required&gt;
                                    &lt;/div&gt;
                                    &lt;div class=&quot;col-12&quot;&gt;
                                    &lt;div class=&quot;form-check&quot;&gt;
                                        &lt;input class=&quot;form-check-input&quot; type=&quot;checkbox&quot; value=&quot;&quot; id=&quot;invalidCheck2&quot; required&gt;
                                        &lt;label class=&quot;form-check-label&quot; for=&quot;invalidCheck2&quot;&gt;
                                            Agree to terms and conditions
                                        &lt;/label&gt;
                                    &lt;/div&gt;
                                    &lt;/div&gt;
                                    &lt;div class=&quot;col-12&quot;&gt;
                                    &lt;button class=&quot;btn btn-primary&quot; type=&quot;submit&quot;&gt;Submit form&lt;/button&gt;
                                    &lt;/div&gt;
                                    &lt;/form&gt;</code></pre>
                            </div>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
            <!-- end row -->
            </div>

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


</div>
<!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- @@include("partials/right-sidebar.html") -->

</div>
</body>

</html>