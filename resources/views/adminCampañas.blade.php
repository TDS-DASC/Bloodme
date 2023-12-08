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

    <title>Administrador | Campañas</title>

    
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


<script>
        window.onload = function () {
    cargarYMostrarCampanas();
};

function cargarYMostrarCampanas() {
    fetch('https://bloodprueba.up.railway.app/api/campaigns/')
        .then(response => {
            if (!response.ok) {
                throw new Error('Error al obtener la lista de campañas. Código de estado: ' + response.status);
            }
            return response.json();
        })
        .then(data => {
            if (data.Campaigns && Array.isArray(data.Campaigns)) {
                renderizarTablaCampanas(data.Campaigns);
            } else {
                throw new Error('Formato de respuesta inesperado. Se esperaba un campo "Campaigns" de tipo array.');
            }
        })
        .catch(error => {
            console.error('Error al cargar campañas:', error);
        });
}
function renderizarTablaCampanas(campaigns) {
    var tbody = document.getElementById('tablaCampanasBody');
    if (!tbody) {
        console.error('Elemento tbody no encontrado.');
        return;
    }
    tbody.innerHTML = '';

    campaigns.forEach(campaign => {
        var row = tbody.insertRow();

        var cellNumero = row.insertCell(0);  //Aqui cambiar por el ROW al que le pertenece nombre porque 0 es el ID
        var cellDescripcion = row.insertCell(1);
        var cellTipo = row.insertCell(2);
        var cellFechaInicio = row.insertCell(3);
        var cellFechaFin = row.insertCell(4);
        var cellAcciones = row.insertCell(5);

        cellNumero.innerText = campaign.id; 
        cellDescripcion.innerText = campaign.description || 'N/A';
        cellTipo.innerText = campaign.blood === 1 ? 'Sangre' : 'Plaquetas'; 
        cellFechaInicio.innerText = campaign.start_campaign;
        cellFechaFin.innerText = campaign.end_campaign || 'N/A'; 

        cellAcciones.innerHTML = `
        <button type="button" class="btn btn-secondary" onclick="obtenerDetallesCampaña(${campaign.id})">Detalles</button>
        <button type="button" class="btn btn-primary" onclick="obtenerDetallesCampana(${campaign.id})">Editar</button>
        <button type="button" class="btn btn-danger" onclick="eliminarCampana('${campaign.id}')"> Eliminar</button>`;
    });
}

let campaignSeleccionadaId = null;

function obtenerDetallesCampana(campaignId) {
    fetch(`https://bloodprueba.up.railway.app/api/campaign/${campaignId}`)
        .then(response => {
            if (!response.ok) {
                throw new Error(`Error al obtener los detalles de la campaña. Código de estado: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('Respuesta completa de la API:', data);

            const campaign = data.Campaign || {};
            const campaignId = campaign.id || '';
            const campaignStartDate = campaign.start_campaign || '';
            const campaignEndDate = campaign.end_campaign || '';

            if (campaignId && campaignStartDate) {
                campaignSeleccionadaId = campaignId;

                document.getElementById('edit-IdCampaña').value = campaignId;
                document.getElementById('edit-FechaInicioCampaña').value = campaignStartDate;
                document.getElementById('edit-FechaFinCampaña').value = campaignEndDate || '';

                // Mostrar el modal de edición
                var offcanvasEditCampaign = new bootstrap.Offcanvas(document.getElementById('offcanvasEditCampaign'));
                offcanvasEditCampaign.show();
            } else {
                throw new Error('Formato de respuesta inesperado. Datos incompletos de la campaña.');
            }
        })
        .catch(error => {
            console.error('Error al obtener los detalles de la campaña:', error);
            alert('Error al obtener los detalles de la campaña.');
        });
}


function obtenerDetallesCampaña(campaignId) {
    fetch(`https://bloodprueba.up.railway.app/api/campaign/${campaignId}`, {
        method: 'GET'
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`Error al obtener los detalles de la campaña. Código de estado: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        const campaign = data.Campaign || {};
        const campaignId = campaign.id || '';
        const inicioCampaña = campaign.start_campaign || '';
        const finCampaña = campaign.end_campaign || '';
        const tipoSangreRequerido = campaign.blood === 1 ? 'Plaquetas': 'Sangre' ;
        const donacionesRequeridas = campaign.donations_required || '';
        const donacionesActuales = campaign.current_donations || '';
        const tipoDonacion = campaign.description || '';
        const userId = campaign.user_id || '';

        // Hacer una solicitud adicional para obtener el CURP del receptor
        return fetch(`https://bloodprueba.up.railway.app/api/user/${userId}`, {
            method: 'GET'
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`Error al obtener los detalles del usuario. Código de estado: ${response.status}`);
            }
            return response.json();
        })
        .then(userData => {
            const curpReceptor = userData.user.curp || '';
            const nombreReceptor = userData.user.name || ''; 


            if (campaignId) {
                campaignSeleccionadaId = campaignId;

                document.getElementById('detalles-idCampaña').value = campaignId;
                document.getElementById('detalles-inicioCampaña').value = inicioCampaña;
                document.getElementById('detalles-finCampaña').value = finCampaña;
                document.getElementById('detalles-tipoSangreRequerido').value = tipoSangreRequerido;
                document.getElementById('detalles-donacionesRequeridas').value = donacionesRequeridas;
                document.getElementById('detalles-donacionesActuales').value = donacionesActuales;
                document.getElementById('detalles-tipoDonacion').value = tipoDonacion;
                document.getElementById('detalles-userId').value = userId;
                document.getElementById('detalles-curpReceptor').value = curpReceptor;
                document.getElementById('detalles-nombreReceptor').value = nombreReceptor;


                var offcanvasDetallesUsuario = new bootstrap.Offcanvas(document.getElementById('offcanvasDetallesUsuario'));
                offcanvasDetallesUsuario.show();
            } else {
                throw new Error('Formato de respuesta inesperado. Datos incompletos de la campaña.');
            }
        });
    })
    .catch(error => {
        console.error('Error al obtener los detalles de la campaña:', error);
        alert('Error al obtener los detalles de la campaña.');
    });
}


function editarCampaña(campaignId) {
    obtenerDetallesCampaña(campaignId);
}

function validarCurp() {
    var curpInput = document.getElementById('add-curpCampaña');
    var mensajeErrorCurp = document.getElementById('mensajeErrorCurp');

    if (curpInput) {
        var regexCurp = /^[A-Za-z0-9]+$/;

        if (curpInput.value.length !== 18 || !regexCurp.test(curpInput.value)) {
            mensajeErrorCurp.innerText = 'El CURP debe tener exactamente 18 caracteres y solo contener letras y números sin acentos.';
            curpInput.classList.add('is-invalid');
        } else {
            mensajeErrorCurp.innerText = ''; 
            curpInput.classList.remove('is-invalid');
        }
    } else {
        console.error('El elemento con ID "add-curpCampaña" no existe.');
    }
}


function editarCampana(campaignId) {
    obtenerDetallesCampana(campaignId);
}


    document.getElementById('btnAddCampaign').addEventListener('click', function() {
        console.log("Soy el botón Añadir");
        verificarCamposCampaign();
    });

    function eliminarCampana(campañaId) {
    if (confirm('¿Estás seguro de que quieres eliminar esta campaña?')) {
        fetch(`https://bloodprueba.up.railway.app/api/campaigns/?id=${campañaId}`, {
            method: 'DELETE'
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`Error al eliminar la campaña. Código de estado: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('Campaña eliminada exitosamente:', data);

            cargarYMostrarCampañas();
        })
        .catch(error => {
            console.error('Error al eliminar la campaña:', error);
            alert('Campaña borrada.');
        });
    }
}

</script>

<style>
    #offcanvasEditCampaign{
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        width: 50%;
        height: 350px;
    }
</style>
    
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
              <span class="d-none d-md-inline-block text-muted">ADMINISTRAR CAMPAÑAS</span>
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

  <!------------------------------------------ AQUI EMPIEZA EL CODIGO --------------------------------------------------------->    

      <!-- Content wrapper -->
      <div class="content-wrapper">

        <!-- Content -->
        
        <div class="container-xxl flex-grow-1 container-p-y">


            <!-- ---------------------------------------Users List Table ----------------------------->
        

<script>
  function mostrarErrorLetras(id, mensaje) {
        var mensajeErrorLetras = document.getElementById(id);
        if (mensajeErrorLetras) {
            mensajeErrorLetras.textContent = mensaje;
        }
    }

    function validarSoloLetras(event, campoInput) {
        var charCode = event.which || event.keyCode;
        var mensajeErrorId = 'mensajeErrorLetras' + campoInput.id.charAt(4);

        // Permitir solo letras (sin espacios, números o caracteres especiales)idacio
        if ((charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122) && charCode !== 32) {
            mostrarErrorLetras(mensajeErrorId, 'Solo se permiten letras (sin espacios, números o caracteres especiales).');
            return false;
        }
        mostrarErrorLetras(mensajeErrorId, ''); 
        return true;
    }



    function validarCorreoElectronico() {
        var inputCorreo = document.getElementById('add-correoElectronico');
        var mensajeErrorCorreo = document.getElementById('mensajeErrorCorreo');
        var regexCorreo = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!regexCorreo.test(inputCorreo.value)) {
            mensajeErrorCorreo.textContent = 'Por favor, ingresa un correo electrónico válido.';
            inputCorreo.classList.add('is-invalid');
        } else {
            mensajeErrorCorreo.textContent = '';
            inputCorreo.classList.remove('is-invalid');
        }
    }

    function validarContrasena() {
        var contrasenaInput = document.getElementById('add-contrasena');
        var mensajeErrorContrasena = document.getElementById('mensajeErrorContrasena');

        // Verificar la longitud de la contraseña
        if (contrasenaInput.value.length < 6 || contrasenaInput.value.length > 15) {
            mensajeErrorContrasena.textContent = 'La contraseña debe tener entre 6 y 15 caracteres.';
            contrasenaInput.classList.add('is-invalid');
        } else {
            mensajeErrorContrasena.textContent = ''; 
            contrasenaInput.classList.remove('is-invalid');
        }
    }
    function validarFechas() {
    var fechaInicioInput = document.getElementById('add-fechaInicio');
    var fechaFinInput = document.getElementById('add-fechaFin');
    var mensajeErrorFechaInicio = document.getElementById('mensajeErrorFechaInicio');
    var mensajeErrorFechaFin = document.getElementById('mensajeErrorFechaFin');

    // Obtener valores de las fechas
    var fechaInicio = new Date(fechaInicioInput.value);
    var fechaFin = new Date(fechaFinInput.value);

    // Restablecer los mensajes de error
    mensajeErrorFechaInicio.textContent = '';
    mensajeErrorFechaFin.textContent = '';

    // Validar si la fecha de fin es anterior a la fecha de inicio
    if (fechaFin < fechaInicio) {
        mensajeErrorFechaInicio.textContent = 'La fecha de fin no puede ser anterior a la fecha de inicio.';
        return false;
    }

    // Validar si la diferencia es menor a una semana (en milisegundos)
    if ((fechaFin - fechaInicio) < (7 * 24 * 60 * 60 * 1000)) {
        mensajeErrorFechaFin.textContent = 'La diferencia entre la fecha de inicio y fin debe ser de al menos una semana.';
        return false;
    }

    // Si las validaciones pasan, todo está bien
    return true;
}

function validarFechasEdit() {
    var fechaInicioInput = document.getElementById('edit-FechaInicioCampaña');
    var fechaFinInput = document.getElementById('edit-FechaFinCampaña');
    var mensajeErrorFechaInicio = document.getElementById('mensajeErrorFechaInicio');
    var mensajeErrorFechaFin = document.getElementById('mensajeErrorFechaFin');

    // Obtener valores de las fechas
    var fechaInicio = new Date(fechaInicioInput.value);
    var fechaFin = new Date(fechaFinInput.value);

    // Restablecer los mensajes de error
    mensajeErrorFechaInicio.textContent = '';
    mensajeErrorFechaFin.textContent = '';

    // Obtener la fecha actual
    var fechaActual = new Date();

    // Calcular la fecha permitida hasta 6 meses en el futuro
    var fechaPermitida = new Date();
    fechaPermitida.setMonth(fechaPermitida.getMonth() + 6);

// Validar si la fecha de inicio es mayor a 6 meses a partir de la fecha actual
if (fechaInicio > fechaPermitida) {
    mensajeErrorFechaInicio.textContent = 'La fecha de inicio no puede ser mayor a 6 meses a partir de la fecha actual.';
} else if ((fechaInicio - fechaActual) < (7 * 24 * 60 * 60 * 1000)) {
    mensajeErrorFechaInicio.textContent = 'La fecha de inicio no puede ser una semana anterior a la fecha actual.';
}

    // Validar si la fecha de fin es anterior a la fecha de inicio
    if (fechaFin < fechaInicio) {
        mensajeErrorFechaInicio.textContent = 'La fecha de fin no puede ser anterior a la fecha de inicio.';
    }

    // Validar si la diferencia es menor a un día (en milisegundos)
    if ((fechaFin - fechaInicio) < (24 * 60 * 60 * 1000)) {
        mensajeErrorFechaFin.textContent = 'La diferencia entre la fecha de inicio y fin debe ser de al menos un día.';
    }

    // Validar que no se pueda escribir más de 4 números en la parte del año
    var fechaArrayInicio = fechaInicioInput.value.split('-');
    if (fechaArrayInicio.length === 3 && fechaArrayInicio[0].length > 4) {
        fechaArrayInicio[0] = fechaArrayInicio[0].substring(0, 4);
        fechaInicioInput.value = fechaArrayInicio.join('-');
    }

    var fechaArrayFin = fechaFinInput.value.split('-');
    if (fechaArrayFin.length === 3 && fechaArrayFin[0].length > 4) {
        fechaArrayFin[0] = fechaArrayFin[0].substring(0, 4);
        fechaFinInput.value = fechaArrayFin.join('-');
    }

    // Cambiar el color del texto a rojo si hay mensajes de error
    if (mensajeErrorFechaInicio.textContent) {
        mensajeErrorFechaInicio.style.color = 'red';
    }

    if (mensajeErrorFechaFin.textContent) {
        mensajeErrorFechaFin.style.color = 'red';
    }

    // Si las validaciones pasan, todo está bien
    return true;
}








function validarUnidadesRequeridas() {
    var inputUnidades = document.getElementById('add-unidadesRequeridas');
    var errorUnidades = document.getElementById('error-unidadesRequeridas');

    var unidades = parseFloat(inputUnidades.value);

    if (unidades <= 0 || isNaN(unidades)) {
        errorUnidades.textContent = 'Ingrese un valor válido mayor a cero.';
    } else {
        errorUnidades.textContent = '';
    }
}

var offcanvasAddCampaign = new bootstrap.Offcanvas(document.getElementById('offcanvasAddCampaign'));

function verificarCamposCampaign() {
    var formulario = document.getElementById('addNewCampaignForm');
    if (!formulario.checkValidity()) {
        formulario.reportValidity();
        return;
    }

    // Obtener valores de los campos
    var fechaInicio = document.getElementById('add-fechaInicio').value;
    var fechaFin = document.getElementById('add-fechaFin').value;
    var tipoDonacion = document.getElementById('add-tipoDonacion').value;
    var unidadesRequeridas = document.getElementById('add-unidadesRequeridas').value;
    var descripcionCampaña = document.getElementById('add-descripcionCampaña').value;
    var curpCampaña = document.getElementById('add-curpCampaña').value;

    // Obtener el ID del usuario a través de la API
    var curpEndpoint = 'https://bloodprueba.up.railway.app/api/users/curp/' + curpCampaña;
    
    fetch(curpEndpoint)
        .then(response => response.json())
        .then(data => {
            if (data.users && data.users.length > 0) {
                // Se encontró al menos un usuario con el CURP
                var userId = data.users[0].id;

                // Crear objeto de datos para enviar al servidor
                var campaignData = {
                    start_campaign: fechaInicio,
                    end_campaign: fechaFin,
                    donations_required: unidadesRequeridas,
                    blood: tipoDonacion === 'Plaquetas' ? 1 : 2,  // Ajusta el valor según tus necesidades
                    user_id: userId,
                    description: descripcionCampaña
                };

                // Realizar la solicitud POST a la API de campañas
                fetch('https://bloodprueba.up.railway.app/api/campaign', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(campaignData)
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error al agregar la campaña. Código de estado: ' + response.status);
                    }
                    return response.json(); 
                })
                .then(data => {
                    // La respuesta exitosa del servidor
                    console.log('Respuesta del servidor:', data);

                    
                    

                    
                        alert('Campaña creada exitosamente.');

                        // Restablecer valores de los campos a blanco
                        document.getElementById('add-fechaInicio').value = '';
                        document.getElementById('add-fechaFin').value = '';
                        document.getElementById('add-tipoDonacion').value = '';
                        document.getElementById('add-unidadesRequeridas').value = '';
                        document.getElementById('add-descripcionCampaña').value = '';
                        document.getElementById('add-curpCampaña').value = '';

                        offcanvasAddCampaign.hide();
                })
                .catch(error => {
                    // Manejar errores en la solicitud
                    console.error('Error en la solicitud:', error);
                    alert('Error al agregar la campaña.');

                    // Verificar si hay una respuesta del servidor
                    if (error && error.response && error.response.text) {
                        // Intenta obtener más información sobre la respuesta
                        error.response.text().then(text => {
                            console.error('Contenido de la respuesta:', text);
                        });
                    }
                });
            } else {
                // No se encontraron usuarios con el CURP
                alert('No se encontró un usuario con el CURP proporcionado.');
            }
        })
        .catch(error => {
            console.error('Error al obtener el ID del usuario:', error);
            alert('Error al obtener el ID del usuario.');
        });
}



    // -------------------------AQUI TERMINA EL AÑADIR Y COMIENZA EL EDITAR-----------------------------------------

    function validarCurp2() {
    var curpInput = document.getElementById('add-curpCampaña');
    var mensajeErrorCurp = document.getElementById('mensajeErrorCurp');

    // Expresión regular para permitir solo letras sin acentos y números
    var regexCurp = /^[A-Za-z0-9]+$/;

    // Verificar la longitud del CURP y el formato
    if (curpInput.value.length !== 18 || !regexCurp.test(curpInput.value)) {
        mensajeErrorCurp.innerText = 'El CURP debe tener exactamente 18 caracteres y solo contener letras y números sin acentos.';
        curpInput.classList.add('is-invalid');
    } else {
        // Limpiar el mensaje de error si la longitud y formato son correctos
        mensajeErrorCurp.innerText = '';
        curpInput.classList.remove('is-invalid');

        // Convertir el CURP a mayúsculas
        curpInput.value = curpInput.value.toUpperCase();
    }
}
    function validarCurpEdit() {
    var curpInputEdit = document.getElementById('detalles-curp');
    var mensajeErrorCurpEdit = document.getElementById('mensajeErrorCurpEdit');

    curpInputEdit.value = curpInputEdit.value.toUpperCase();

    // Expresión regular para permitir solo letras sin acentos y números
    var regexCurp = /^[A-Z0-9]+$/;

    if (curpInputEdit.value.length !== 18 || !regexCurp.test(curpInputEdit.value)) {
        mensajeErrorCurpEdit.innerText = 'El CURP debe tener exactamente 18 caracteres y solo contener letras y números sin acentos.';
        curpInputEdit.classList.add('is-invalid');
    } else {
        mensajeErrorCurpEdit.innerText = ''; // Limpiar el mensaje de error si la longitud y formato son correctos
        curpInputEdit.classList.remove('is-invalid');
    }
}
function validarFechaNacimientoEdit() {
    function validarFechaNacimientoEdit() {
        var fechaInputEdit = document.getElementById('edit-html5-date-input');
        var mensajeErrorFechaEdit = document.getElementById('mensajeErrorFechaEdit');
        var fechaArrayEdit = fechaInputEdit.value.split('-');
        if (fechaArrayEdit.length === 3 && fechaArrayEdit[0].length > 4) {
            fechaArrayEdit[0] = fechaArrayEdit[0].substring(0, 4);
            fechaInputEdit.value = fechaArrayEdit.join('-');
        }

        // Verifica si la fecha está dentro del rango deseado
        var fechaSeleccionadaEdit = new Date(fechaInputEdit.value);
        var fechaMinimaEdit = new Date('1900-01-01');
        var fechaMaximaEdit = new Date('2023-12-31');

        if (fechaSeleccionadaEdit < fechaMinimaEdit || fechaSeleccionadaEdit > fechaMaximaEdit) {
            mensajeErrorFechaEdit.innerText = 'Por favor, ingresa una fecha entre 1900-01-01 y 2023-12-31.';
            fechaInputEdit.classList.add('is-invalid');
        } else {
            mensajeErrorFechaEdit.innerText = '';
            fechaInputEdit.classList.remove('is-invalid');
        }
    }
}

function verificarCamposEdit() {
    // Obtener el formulario
    var formulario = document.getElementById('editCampaignForm');

    // Verificar la validez del formulario
    if (!formulario.checkValidity()) {
        // Si el formulario no es válido, mostrar mensajes de error y detener el proceso
        formulario.reportValidity();
        return;
    }
    
    // Obtener valores de los campos
    var idCampaña = document.getElementById('edit-IdCampaña').value;
    var fechaInicio = document.getElementById('edit-FechaInicioCampaña').value;
    var fechaFin = document.getElementById('edit-FechaFinCampaña').value;

    // Crear objeto de datos para enviar al servidor
    var editedCampaignData = {
        start_campaign: fechaInicio,
        end_campaign: fechaFin
    };

    fetch('https://bloodprueba.up.railway.app/api/campaigns/?id=' + idCampaña, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(editedCampaignData)
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Error al editar la campaña. Código de estado: ' + response.status);
        }
        return response.json(); 
    })
    .then(data => {
        console.log('Respuesta del servidor:', data);

        var modalElement = document.getElementById('offcanvasEditCampaign');
        var modal = bootstrap.Offcanvas.getInstance(modalElement);
        modal.hide();
            alert('Campaña editada exitosamente.');
       
    })
    .catch(error => {
        console.error('Error en la solicitud de edición de campaña:', error);
        alert('Error al editar la campaña.');

        if (error && error.response && error.response.text) {
            // Intenta obtener más información sobre la respuesta
            error.response.text().then(text => {
                console.error('Contenido de la respuesta:', text);
            });
        }
    });
    // var offcanvasEditCampaign = new bootstrap.Offcanvas(document.getElementById('offcanvasEditCampaign'));
    // offcanvasEditCampaign.hide();
}
</script>
<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
      <h4>Listado de Campañas</h4>
      <button type="button" class="btn btn-success" id="btnAddCampaign">Añadir</button>
  </div>

  <div class="table-responsive text-nowrap">
      <table class="table">
          <thead class="table-light">
              <tr>
                  <th>#</th>
                  <th>Descripción</th>
                  <th>Tipo</th>
                  <th>Fecha de Inicio</th>
                  <th>Fecha de Fin</th>
                  <th>Acciones</th>
              </tr>
          </thead>
          <!-- Asegúrate de tener un tbody con el ID 'tablaCampanasBody' -->
          <tbody class="table-border-bottom-0" id="tablaCampanasBody">
              <!-- Aquí puedes tener filas predefinidas si lo deseas -->
          </tbody>
      </table>
  </div>
</div>
<!-- Bootstrap Table with Header - Light -->

<!-- Modal de Detalles Campaña -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasDetallesUsuario" aria-labelledby="offcanvasDetallesUsuarioLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasDetallesUsuarioLabel" class="offcanvas-title">Detalles del Usuario</h5>
        <button type="button" class="btn-close text-reset ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
        <form class="detalles-usuario pt-0" id="detallesUsuarioForm" onsubmit="return false">
            <div class="row">
                <!-- Columna 1 -->
                <div class="col-md-6">
                    <!-- Campo ID de la Campaña -->
                    <div class="mb-3">
                        <label for="detalles-idCampaña" class="form-label">ID de la Campaña:</label>
                        <input type="text" class="form-control" id="detalles-idCampaña" readonly>
                    </div>

                    <!-- Campo Inicio de la Campaña -->
                    <div class="mb-3">
                        <label for="detalles-inicioCampaña" class="form-label">Inicio de la Campaña:</label>
                        <input type="date" class="form-control" id="detalles-inicioCampaña" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="detalles-tipoSangreRequerido" class="form-label">Tipo de Sangre Requerido:</label>
                        <input type="text" class="form-control" id="detalles-tipoSangreRequerido" readonly>
                    </div>
                    
                </div>

                <!-- Columna 2 -->
                <div class="col-md-6">


                <div class="mb-3">
                        <label for="detalles-userId" class="form-label">ID del Receptor:</label>
                        <input type="text" class="form-control" id="detalles-userId" readonly>
                    </div>
                    <!-- Campo Tipo de Sangre Requerido -->
                   
                    <!-- Campo Fin de la Campaña -->
                    <div class="mb-3">
                        <label for="detalles-finCampaña" class="form-label">Fin de la Campaña:</label>
                        <input type="date" class="form-control" id="detalles-finCampaña" readonly>
                    </div>



                    <!-- Campo Donaciones Actuales -->
                    <div class="mb-3">
                        <label for="detalles-donacionesActuales" class="form-label">Donaciones Actuales:</label>
                        <input type="number" class="form-control" id="detalles-donacionesActuales" readonly>
                    </div>
                </div>

                <!-- Columna 3 -->
                <div class="col-md-6">
                    <!-- Campo Tipo de Donación -->
                    <div class="mb-3">
                        <label for="detalles-tipoDonacion" class="form-label">Descripción:</label>
                        <input type="text" class="form-control" id="detalles-tipoDonacion" readonly>
                    </div>
                </div>

                <!-- Columna 4 -->
                <div class="col-md-6">
                     <!-- Campo Donaciones Requeridas -->
                     <div class="mb-3">
                        <label for="detalles-donacionesRequeridas" class="form-label">Donaciones Requeridas:</label>
                        <input type="number" class="form-control" id="detalles-donacionesRequeridas" readonly>
                    </div>
                </div>

                <div class="col-md-6">

                <!-- Campo Nombre del Receptor -->
                <div class="mb-3">
                        <label for="detalles-nombreReceptor" class="form-label">Nombre del Receptor:</label>
                        <input type="text" class="form-control" id="detalles-nombreReceptor" readonly>
                    </div>
                     <!-- Campo Donaciones Requeridas -->
                     
                </div>

                <!-- Columna 5 -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="detalles-curpReceptor" class="form-label">CURP del Receptor</label>
                        <input type="text" class="form-control" id="detalles-curpReceptor" readonly>
                    </div>
                </div>
            </div>

            <!-- Botón para cerrar el modal -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cerrar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Editar Campaña -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEditCampaign" aria-labelledby="offcanvasEditCampaignLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasEditCampaignLabel" class="offcanvas-title">Editar Campaña</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
        <form class="edit-campaign pt-0" id="editCampaignForm" onsubmit="return false">
            <div>
                <!-- Contenedor para el primer par de etiqueta y campo de entrada -->
                <div class="mb-3" style="width: 45%; display: inline-block;">
                    <label class="form-label" for="edit-FechaInicioCampaña">Fecha de Inicio</label>
                    <input type="date" id="edit-FechaInicioCampaña" class="form-control" onchange="validarFechasEdit()" />
                    <div>
                        <span id="mensajeErrorFechaInicio"></span>
                    </div>
                </div>
            
                <!-- Contenedor para el segundo par de etiqueta y campo de entrada -->
                <div class="mb-3 ms-5" style="width: 45%; display: inline-block;">
                    <label class="form-label" for="edit-FechaFinCampaña">Fecha de Fin</label>
                    <input type="date" id="edit-FechaFinCampaña" class="form-control" onchange="validarFechasEdit()" />
                    <div>
                        <span id="mensajeErrorFechaFin"></span>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label" for="edit-IdCampaña">ID de la Campaña</label>
                <input type="text" id="edit-IdCampaña" class="form-control" readonly />
            </div>
            <!-- Otros campos que desees editar -->

            <div class="w-100 d-flex justify-content-center mt-3">
                <button type="submit" id="btnGuardarCambios" class="btn btn-primary me-sm-3 me-1 data-submit" onclick="verificarCamposEdit()" data-bs-dismiss="offcanvas">Guardar Cambios</button>
                <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancelar</button>
            </div>
        </form>
    </div>
</div>



<!-- Modal Añadir Campañas -->
<div class="offcanvas offcanvas-end modal-dialog-centered" tabindex="-1" id="offcanvasAddCampaign" aria-labelledby="offcanvasAddCampaignLabel">
    <div class="offcanvas-header d-flex justify-content-between w-100">
        <h5 id="offcanvasAddCampaignLabel" class="offcanvas-title">Nueva Campaña</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
        <form class="add-new-campaign pt-0" id="addNewCampaignForm" onsubmit="return false">
            <div class="row">
                <!-- Columna 1 -->
                <div>
                    
                </div>
                <div class="col-12 col-md-6 w-100">
                    <div class="mb-3" style="display: inline-block; width: 48%">
                        <label class="form-label" for="add-fechaInicio">Inicio de la Campaña</label>
                        <div class="col-md-10 w-100">
                            <input class="form-control w-100" type="date" value="" id="add-fechaInicio" min="2022-01-01" max="2023-12-31" onblur="validarFechas()">
                            <div id="mensajeErrorFechaInicio" class="text-danger"></div> <!-- Nuevo div para mensaje de error -->
                        </div>
                    </div>
                
                    <div class="mb-3" style="display: inline-block;  width: 48%">
                        <label class="form-label" for="add-fechaFin">Final de la Campaña</label>
                        <div class="col-md-10 w-100">
                            <input class="form-control" style="width: 100%" type="date" value="" id="add-fechaFin" min="2022-01-01" max="2023-12-31" onblur="validarFechas()">
                            <div id="mensajeErrorFechaFin" class="text-danger"></div> <!-- Nuevo div para mensaje de error -->
                        </div>
                    </div>
                </div>


                <div class="col-12">
                    <div class="mb-3" style="display: inline-block;  width: 48%">
                        <label class="form-label" for="add-tipoDonacion">Tipo de Donaciones</label>
                        <select id="add-tipoDonacion" class="form-select">
                            <option selected disabled value="">Opciones...</option>
                            <option value="Plaquetas">Plaquetas</option>
                            <option value="Sangre">Sangre</option>
                        </select>
                    </div>
                    <div class="mb-3" style="display: inline-block;  width: 48%">
                        <label class="form-label" for="add-unidadesRequeridas">Unidades Requeridas</label>
                        <input type="number" id="add-unidadesRequeridas" class="form-control" placeholder="Número de Unidades Requeridas" aria-label="Unidades Requeridas" onblur="validarUnidadesRequeridas()" />
                        <div id="error-unidadesRequeridas" class="text-danger"></div>
                    </div>
                </div>

                

                <!-- Columna 2 -->
                <div class="col-12 col-md-6 w-100">

                    <div class="mb-3" style="display: inline-block;  width: 48%">
                        <label class="form-label" for="add-descripcionCampaña">Descripción de la Campaña</label>
                        <input type="text" id="add-descripcionCampaña" class="form-control" placeholder="Escribir Descripción de la Campaña" aria-label="Descripción de la Campaña" />
                    </div>

                    <div class="mb-3" style="display: inline-block;  width: 48%">
                        <label class="form-label" for="add-curpCampaña">CURP de la persona a donar</label>
                        <input type="text" id="add-curpCampaña" class="form-control" placeholder="Escribir CURP de la persona a Donar" aria-label="CURP" onblur="validarCurp2()" />
                        <div id="mensajeErrorCurp" style="color: red;"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Nueva fila para centrar los botones -->
                <div class="col-md-12 offset-md-0 text-center">
                    <button type="submit" id="btnAddCampaign" class="btn btn-danger me-sm-3 me-1 data-submit" onclick="verificarCamposCampaign()">Confirmar</button>
                    <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancelar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<style>
    #offcanvasAddCampaign {
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        width: 50%;
        height: 400px;
    }
</style>

<style>
    #offcanvasDetallesUsuario {
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        width: 50%;
        height: 450px;
    }
</style>


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
  var btnAddCampaign = document.getElementById('btnAddCampaign');
  var offcanvasAddCampaign = new bootstrap.Offcanvas(document.getElementById('offcanvasAddCampaign'));
  btnAddCampaign.addEventListener('click', function () {
    offcanvasAddCampaign.show();
  });
</script>



</body>

</html>

<!-- beautify ignore:end -->