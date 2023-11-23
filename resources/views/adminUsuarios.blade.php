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

    <title>Administrador | Usuarios</title>

    
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
<link rel="stylesheet" href="../../assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css">
<link rel="stylesheet" href="../../assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css">
<link rel="stylesheet" href="../../assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css">
<link rel="stylesheet" href="../../assets/vendor/libs/select2/select2.css" />
<link rel="stylesheet" href="../../assets/vendor/libs/@form-validation/umd/styles/index.min.css" />

<!-- Page CSS -->


<!-- Helpers -->
<script src="../../assets/vendor/js/helpers.js"></script>
<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
<!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->

<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
<script src="../../assets/js/config.js"></script>
    
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
      <svg width="32" height="22" viewBox="0 0 32 22" fill="none">
        <img src="public/images/logo.png" alt="Logo de BLOODME"> <!-- ACOMODAR LOGO -->
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
              <span class="d-none d-md-inline-block text-muted">ADMINISTRAR USUARIOS</span>
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
                <a class="dropdown-item" href="{{route('login')}}">
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

  <!------------------------------------------ AQUI EMPIEZA EL CODIGO --------------------------------------------------------->    

      <!-- Content wrapper -->
      <div class="content-wrapper">

        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">
            
            

            <div class="row g-4 mb-4">
              <div class="col-sm-6 col-xl-3">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                      <div class="content-left">
                        <span>Session</span>
                        <div class="d-flex align-items-center my-2">
                          <h3 class="mb-0 me-2">21,459</h3>
                          <p class="text-success mb-0">(+29%)</p>
                        </div>
                        <p class="mb-0">Total Users</p>
                      </div>
                      <div class="avatar">
                        <span class="avatar-initial rounded bg-label-primary">
                          <i class="ti ti-user ti-sm"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-xl-3">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                      <div class="content-left">
                        <span>Paid Users</span>
                        <div class="d-flex align-items-center my-2">
                          <h3 class="mb-0 me-2">4,567</h3>
                          <p class="text-success mb-0">(+18%)</p>
                        </div>
                        <p class="mb-0">Last week analytics </p>
                      </div>
                      <div class="avatar">
                        <span class="avatar-initial rounded bg-label-danger">
                          <i class="ti ti-user-plus ti-sm"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-xl-3">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                      <div class="content-left">
                        <span>Active Users</span>
                        <div class="d-flex align-items-center my-2">
                          <h3 class="mb-0 me-2">19,860</h3>
                          <p class="text-danger mb-0">(-14%)</p>
                        </div>
                        <p class="mb-0">Last week analytics</p>
                      </div>
                      <div class="avatar">
                        <span class="avatar-initial rounded bg-label-success">
                          <i class="ti ti-user-check ti-sm"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-xl-3">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                      <div class="content-left">
                        <span>Pending Users</span>
                        <div class="d-flex align-items-center my-2">
                          <h3 class="mb-0 me-2">237</h3>
                          <p class="text-success mb-0">(+42%)</p>
                        </div>
                        <p class="mb-0">Last week analytics</p>
                      </div>
                      <div class="avatar">
                        <span class="avatar-initial rounded bg-label-warning">
                          <i class="ti ti-user-exclamation ti-sm"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- ---------------------------------------Users List Table ----------------------------->
           <!-- Bootstrap Table with Header - Light -->
           <div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h4>Listado de Usuarios</h4>
    <button type="button" class="btn btn-secondary" id="btnAdd">Añadir</button>
  </div>
  
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead class="table-light">
        <tr>
          <th>Nombre</th>
          <th>Correo Electronico</th>
          <th>Tipo de Sangre</th>
          <th>Fecha de Nacimiento</th>
          <th>Genero</th>
          <th>Donador</th>
          <th>CURP</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        <tr>
          <td>Albert Cook</td>
          <td>Albert Cook</td>
          <td>Albert Cook</td>
          <td>Albert Cook</td>
          <td>Albert Cook</td>
          <td>Albert Cook</td>
          <td>Albert Cook</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-pencil me-1"></i> Edit</a>
                <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-trash me-1"></i> Delete</a>
              </div>
            </div>
          </td>
        </tr>
        
      </tbody>
    </table>
  </div>
</div>
<!-- Bootstrap Table with Header - Light -->


<!-- Modal Añadir Usuarios -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
    <div class="offcanvas-header">
      <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Añadir Usuario</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
      <form class="add-new-user pt-0" id="addNewUserForm" onsubmit="return false">



        <div class="mb-3">
            <label class="form-label" for="add-NombreCompleto">Nombre Completo</label>
            <input type="text" id="add-NombreCompleto" class="form-control" placeholder="Escribir Nombre Completo" aria-label="Nombre Completo" onkeypress="return validarSoloLetras(event)" />
            <div id="mensajeErrorLetras" style="color: red;"></div>
        </div>

        <div class="mb-3">
          <label class="form-label" for="add-correoElectronico">Correo Electrónico</label>
          <input type="text" id="add-correoElectronico" class="form-control" placeholder="Escribir Correo Electrónico" aria-label="john.doe@example.com" onblur="validarCorreoElectronico()" />
          <div id="mensajeErrorCorreo" style="color: red;"></div>
      </div>

        <div class="mb-3">
        <label class="form-label" for="add-fechaNacimiento">Fecha de Nacimiento</label>
            <div class="col-md-10">
              <input class="form-control" type="date" value="" id="html5-date-input" />
            </div>
        </div>

        <div class="mb-3">
          <label class="form-label" for="add-genero">Género</label>
          <select id="add-genero" class="form-select">
            <option selected disabled value="">Opciones...</option>
            <option value="Hombre">Hombre</option>
            <option value="Mujer">Mujer</option>
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label" for="add-tipoSangre">Tipo de Sangre</label>
          <select id="add-tipoSangre" class="form-select">
            <option selected disabled value="">Opciones...</option>
            <option value="A+">A+</option>
            <option value="O+">O+</option>
            <option value="B+">B+</option>
            <option value="AB+">AB+</option>
            <option value="A-">A-</option>
            <option value="O-">O-</option>
            <option value="B-">B-</option>
            <option value="AB-">AB-</option>
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label" for="add-donador">Donador</label>
          <select id="add-donador" class="form-select">
            <option selected disabled value="">Opciones...</option>
            <option value="Si">Si</option>
            <option value="No">No</option>
          </select>
        </div>

        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit" onclick="verificarCampos()">Añadir</button>
        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancelar</button>
      </form>
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
  <script src="../../assets/vendor/libs/moment/moment.js"></script>
<script src="../../assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<script src="../../assets/vendor/libs/select2/select2.js"></script>
<script src="../../assets/vendor/libs/@form-validation/umd/bundle/popular.min.js"></script>
<script src="../../assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js"></script>
<script src="../../assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js"></script>
<script src="../../assets/vendor/libs/cleavejs/cleave.js"></script>
<script src="../../assets/vendor/libs/cleavejs/cleave-phone.js"></script>

  <!-- Main JS -->
  <script src="../../assets/js/main.js"></script>
  

  <!-- Page JS -->
  <script src="../../assets/js/app-user-list.js"></script>


  <script>
  var btnAdd = document.getElementById('btnAdd');
  var offcanvasAddUser = new bootstrap.Offcanvas(document.getElementById('offcanvasAddUser'));
  btnAdd.addEventListener('click', function () {
    offcanvasAddUser.show();
  });
</script>


<script>
    function validarSoloLetras(event) {
        var charCode = event.which || event.keyCode;

        // Permitir solo letras (sin espacios, números o caracteres especiales)
        if ((charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122) && charCode !== 32) {
            var mensajeErrorLetras = document.getElementById('mensajeErrorLetras');
            mensajeErrorLetras.textContent = 'Solo se permiten letras (sin espacios, números o caracteres especiales).';
            return false;
        }

        // Limpiar mensaje de error si la entrada es válida
        var mensajeErrorLetras = document.getElementById('mensajeErrorLetras');
        mensajeErrorLetras.textContent = '';
        return true;
    }
</script>

<script>
    function validarCorreoElectronico() {
        var inputCorreo = document.getElementById('add-correoElectronico');
        var mensajeErrorCorreo = document.getElementById('mensajeErrorCorreo');

        // Expresión regular para validar un formato de correo electrónico básico
        var regexCorreo = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!regexCorreo.test(inputCorreo.value)) {
            mensajeErrorCorreo.textContent = 'Por favor, ingresa un correo electrónico válido.';
            inputCorreo.classList.add('is-invalid');
        } else {
            mensajeErrorCorreo.textContent = '';
            inputCorreo.classList.remove('is-invalid');
        }
    }
</script>
<script>
    function verificarCampos() {
        // Obtener valores de los campos
        var nombreCompleto = document.getElementById('add-NombreCompleto').value;
        var correoElectronico = document.getElementById('add-correoElectronico').value;
        var fechaNacimiento = document.getElementById('html5-date-input').value;
        var genero = document.getElementById('add-genero').value;
        var tipoSangre = document.getElementById('add-tipoSangre').value;
        var donador = document.getElementById('add-donador').value;

        // Validar que todos los campos estén llenos
        if (
            nombreCompleto.trim() === '' ||
            correoElectronico.trim() === '' ||
            fechaNacimiento.trim() === '' ||
            genero.trim() === '' ||
            tipoSangre.trim() === '' ||
            donador.trim() === ''
        ) {
            alert('Por favor, completa todos los campos.');
            return;
        }

        // Validar formato de correo electrónico
        var regexCorreo = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!regexCorreo.test(correoElectronico)) {
            alert('Por favor, ingresa un correo electrónico válido.');
            return;
        }

        // Validar que el nombre solo contenga letras
        var regexLetras = /^[a-zA-Z\s]+$/;
        if (!regexLetras.test(nombreCompleto)) {
            alert('Por favor, ingresa un nombre válido (solo letras y espacios).');
            return;
        }

        // Si todos los campos están llenos y las validaciones son exitosas, imprimir en consola
        console.log('Datos válidos:', {
            NombreCompleto: nombreCompleto,
            CorreoElectronico: correoElectronico,
            FechaNacimiento: fechaNacimiento,
            Genero: genero,
            TipoSangre: tipoSangre,
            Donador: donador
        });

        // Aquí podrías enviar los datos al servidor si es necesario

        // Cerrar el modal (opcional)
        var offcanvasAddUser = new bootstrap.Offcanvas(document.getElementById('offcanvasAddUser'));
        offcanvasAddUser.hide();
    }
</script>


</body>

</html>

<!-- beautify ignore:end -->

