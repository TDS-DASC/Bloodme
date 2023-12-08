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

    <title>Administrador | citas</title>

    
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
        cargarYMostrarCitas();
    };
    function cargarYMostrarCitas() {
        fetch('https://bloodprueba.up.railway.app/api/donationsdate/')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error al obtener la lista de citas. Código de estado: ' + response.status);
                }
                return response.json();
            })
            .then(data => {
                if (data.donationDates && Array.isArray(data.donationDates)) {
                    renderizarTablaCitas(data.donationDates);
                } else {
                    throw new Error('Formato de respuesta inesperado. Se esperaba un campo "donationDates" de tipo array.');
                }
            })
            .catch(error => {
                console.error('Error al cargar citas:', error);
            });
    }
    function renderizarTablaCitas(citas) {
    var tbody = document.getElementById('tablaCitasBody');
    if (!tbody) {
        console.error('Elemento tbody no encontrado.');
        return;
    }
    tbody.innerHTML = '';

    citas.forEach(cita => {
        var row = tbody.insertRow();

        var cellUserId = row.insertCell(0);
        var cellCampaignId = row.insertCell(1);
        var cellDateDonation = row.insertCell(2);
        var cellNombreReceptor = row.insertCell(3);
        var cellMedicalUnitId = row.insertCell(4);
        var cellAcciones = row.insertCell(5);

        cellUserId.innerText = cita.user_id || 'N/A';
        cellCampaignId.innerText = cita.campaign_id || 'N/A';
        cellDateDonation.innerText = cita.date_donation || 'N/A';
        cellNombreReceptor.innerText = cita.nombre_receptor || 'N/A';
        cellMedicalUnitId.innerText = cita.medical_unit_id || 'N/A';

        cellAcciones.innerHTML = `
            <button type="button" class="btn btn-secondary" onclick="obtenerDetalles(${cita.id})">Detalles</button>
            <button type="button" class="btn btn-primary" onclick="obtenerDetallesCita(${cita.id})">Editar</button>
            <button type="button" class="btn btn-danger" onclick="eliminarCita('${cita.id}')">Eliminar</button>`;
    });

}

// Función para cargar dinámicamente las opciones de campañas
function cargarOpcionesCampañas() {
    fetch('https://bloodprueba.up.railway.app/api/campaigns')
        .then(response => response.json())
        .then(data => {
            var selectCampaña = document.getElementById('add-idCampaña');
            selectCampaña.innerHTML = '<option selected disabled value="">Opciones...</option>';
            
            // Verificar si "Campaigns" existe y es un arreglo
            if (data.Campaigns && Array.isArray(data.Campaigns)) {
                data.Campaigns.forEach(campaign => {
                    var option = document.createElement('option');
                    option.value = campaign.id;
                    option.textContent = campaign.id;
                    selectCampaña.appendChild(option);
                });
            } else {
                console.error('Error: La lista de campañas no es válida.');
            }
        })
        .catch(error => {
            console.error('Error al obtener la lista de campañas:', error);
        });
}

// Función para cargar dinámicamente las opciones de unidades médicas
function cargarOpcionesUnidadesMedicas() {
    fetch('https://bloodprueba.up.railway.app/api/medunits/')
        .then(response => response.json())
        .then(data => {
            var selectUnidad = document.getElementById('add-idUnidad');
            selectUnidad.innerHTML = '<option selected disabled value="">Opciones...</option>';
            
            // Verificar si "MedicalUnits" existe y es un arreglo
            if (data.MedicalUnits && Array.isArray(data.MedicalUnits)) {
                data.MedicalUnits.forEach(unit => {
                    var option = document.createElement('option');
                    option.value = unit.id;
                    option.textContent = unit.id;
                    selectUnidad.appendChild(option);
                });
            } else {
                console.error('Error: La lista de unidades médicas no es válida.');
            }
        })
        .catch(error => {
            console.error('Error al obtener la lista de unidades médicas:', error);
        });
}

// Llamadas a las funciones de carga al cargar la página
document.addEventListener('DOMContentLoaded', function() {
    cargarOpcionesCampañas();
    cargarOpcionesUnidadesMedicas();
});

let usuarioSeleccionadoId = null;

function obtenerDetallesCita(citaId) {
    fetch(`https://bloodprueba.up.railway.app/api/donationdate/${citaId}`, {
        method: 'GET'
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`Error al obtener los detalles de la cita. Código de estado: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        console.log('Respuesta completa de la API:', data);

        const cita = data.donationDate || {};
        const citaId = cita.id || '';
        const citaFechaInicio = cita.date_donation || '';

        if (citaId && citaFechaInicio) {
            // Almacena el ID de la cita seleccionada globalmente
            citaSeleccionadaId = citaId;

            // Rellenar campos del formulario de edición
            document.getElementById('edit-IdCita').value = citaId;
            document.getElementById('edit-FechaInicioCita').value = citaFechaInicio;

            // Mostrar el modal de edición
            var offcanvasEditCita = new bootstrap.Offcanvas(document.getElementById('offcanvasEditCita'));
            offcanvasEditCita.show();
        } else {
            throw new Error('Formato de respuesta inesperado. Datos incompletos de la cita.');
        }
    })
    .catch(error => {
        console.error('Error al obtener los detalles de la cita:', error);
        alert(`Error al obtener los detalles de la cita. Detalles: ${error.message}`);
    });
}

var elementoIdCita = document.getElementById('detalles-idCita');
if (elementoIdCita) {
    elementoIdCita.value = citaId;
}
function obtenerDetalles(citaId) {
  fetch(`https://bloodprueba.up.railway.app/api/donationdate/${citaId}`, {
        method: 'GET'
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`Error al obtener los detalles de la cita. Código de estado: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        const cita = data.donationDate || {};
        const citaId = cita.id || '';
        const userId = cita.user_id || '';
        const campaignId = cita.campaign_id || '';
        const fechaDonacion = cita.date_donation || '';
        const nombreReceptor = cita.nombre_receptor || '';
        const medicalUnitId = cita.medical_unit_id || '';
        if (citaId) {
            document.getElementById('detalles-idCita').value = citaId;
            document.getElementById('detalles-userId').value = userId;
            document.getElementById('detalles-campaignId').value = campaignId;
            document.getElementById('detalles-fechaDonacion').value = fechaDonacion;
            document.getElementById('detalles-nombreReceptor').value = nombreReceptor;
            document.getElementById('detalles-medicalUnitId').value = medicalUnitId;
            var offcanvasDetallesCita = new bootstrap.Offcanvas(document.getElementById('offcanvasDetallesCita'));
            offcanvasDetallesCita.show();
        } else {
            throw new Error('Formato de respuesta inesperado. Datos incompletos de la cita.');
        }
    })
    .catch(error => {
    console.error('Error al obtener los detalles de la cita:', error);
    alert('Error al obtener los detalles de la cita. Detalles: ' + error.message);
    });
}





//EDITAR

function editarCita() {
    // Obtener valores de los campos
    var nuevaFechaDonacion = document.getElementById('edit-FechaInicioCita').value;

    // Validar que se haya seleccionado una cita
    if (!citaSeleccionadaId) {
        alert('Error: No se ha seleccionado una cita para editar.');
        return;
    }

    // Realizar la solicitud PUT a la API para actualizar la fecha de donación
    fetch(`https://bloodprueba.up.railway.app/api/donationsdate/${citaSeleccionadaId}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ date_donation: nuevaFechaDonacion })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`Error al actualizar la fecha de donación. Código de estado: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        // La respuesta exitosa del servidor
        console.log('Respuesta del servidor:', data);

        alert('Fecha de donación actualizada exitosamente.');

        // Cerrar el modal de edición
        var offcanvasEditCita = new bootstrap.Offcanvas(document.getElementById('offcanvasEditCita'));
        offcanvasEditCita.hide();
    })
    .catch(error => {
        // Manejar errores en la solicitud
        console.error('Error al procesar la solicitud:', error);
        alert('Error al actualizar la fecha de donación. Detalles: ' + error.message);
    });
}

function verificarCamposCitas() {
    var formulario = document.getElementById('addNewCampaignForm');
    if (!formulario.checkValidity()) {
        formulario.reportValidity();
        return;
    }

    // Obtener valores de los campos
    var idCampaña = document.getElementById('add-idCampaña').value;
    var nuevaFechaDonacion = document.getElementById('add-fechaDonacion').value;

    // Realizar la solicitud para obtener los datos de la campaña
    fetch(`https://bloodprueba.up.railway.app/api/campaign/${idCampaña}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Error al obtener detalles de la campaña. Código de estado: ' + response.status);
            }
            return response.json();
        })
        .then(data => {
            if (data.Campaign && data.Campaign.start_campaign && data.Campaign.end_campaign) {
                var startCampaign = new Date(data.Campaign.start_campaign);
                var endCampaign = new Date(data.Campaign.end_campaign);

                // Validar si la nueva fecha de donación está fuera del rango de la campaña
                if (nuevaFechaDonacion < startCampaign || nuevaFechaDonacion > endCampaign) {
                    document.getElementById('mensajeErrorFechaAdd').textContent = 'La fecha de donación debe estar dentro del rango de la campaña.';
                } else {
                    // Si la validación pasa, puedes ejecutar la lógica para agregar la cita
                    agregarCita();
                }
            } else {
                throw new Error('La estructura de la respuesta de la API no es la esperada.');
            }
        })
        .catch(error => {
            console.error('Error al obtener detalles de la campaña:', error);
            document.getElementById('mensajeErrorFechaAdd').textContent = 'Error al obtener detalles de la campaña.';
        });
}


function validarFechaAñadir() {
    var fechaInicioInput = document.getElementById('add-fechaDonacion');
    var mensajeErrorFechaAdd = document.getElementById('mensajeErrorFechaAdd');

    // Obtener la fecha actual
    var fechaActual = new Date();

    // Obtener la fecha de donación ingresada por el usuario
    var nuevaFechaDonacion = new Date(fechaInicioInput.value);

    // Calcular la fecha que está 6 meses en el futuro
    var seisMesesEnElFuturo = new Date();
    seisMesesEnElFuturo.setMonth(seisMesesEnElFuturo.getMonth() + 6);

    // Calcular la fecha de ayer
    var ayer = new Date();
    ayer.setDate(ayer.getDate() - 1);

    // Restablecer el mensaje de error
    mensajeErrorFechaAdd.textContent = '';

    // Validar si la nueva fecha de donación está entre ayer y 6 meses en el futuro
    if (nuevaFechaDonacion < ayer || nuevaFechaDonacion > seisMesesEnElFuturo) {
        document.getElementById('btnAddCampaign').disabled = true;
    } else {
        // Habilitar el botón si la fecha es válida
        document.getElementById('btnAddCampaign').disabled = false;
    }
}




// Función auxiliar para obtener la fecha actual más 6 meses
function seisMesesEnElFuturo() {
    var fecha = new Date();
    fecha.setMonth(fecha.getMonth() + 6);
    return fecha;
}

function validarFechaEdicion() {
    var fechaInicioInput = document.getElementById('edit-FechaInicioCita');
    var mensajeErrorFechaEdit = document.getElementById('mensajeErrorFechaEdit');

    // Obtener el ID de la cita seleccionada
    var citaId = document.getElementById('edit-IdCita').value;

    // Realizar la solicitud para obtener los detalles de la cita vinculada
    fetch(`https://bloodprueba.up.railway.app/api/donationdate/${citaId}`)
        .then(response => {
            if (!response.ok) {
                throw new Error(`Error al obtener los detalles de la cita. Código de estado: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('Respuesta de la API al obtener detalles de la cita:', data);

            // Verificar si la estructura de la respuesta es como se espera
            if (data.donationDate && data.donationDate.campaign_id) {
                // Obtener la ID de la campaña vinculada
                var campaignId = data.donationDate.campaign_id;

                // Realizar la solicitud para obtener los detalles de la campaña
                return fetch(`https://bloodprueba.up.railway.app/api/campaign/${campaignId}`);
            } else {
                console.error('La estructura de la respuesta de la API no es la esperada:', data);
                mensajeErrorFechaEdit.textContent = 'Error al obtener detalles de la cita. La respuesta de la API no tiene la estructura esperada.';
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`Error al obtener detalles de la campaña. Código de estado: ${response.status}`);
            }
            return response.json();
        })
        .then(campaignData => {
            // Obtener la fecha de inicio y fin de la campaña vinculada
            var startCampaign = new Date(campaignData.Campaign.start_campaign);
            var endCampaign = new Date(campaignData.Campaign.end_campaign);

            // Obtener la fecha de donación ingresada por el usuario
            var nuevaFechaDonacion = fechaInicioInput.valueAsDate;
            console.log('Fecha de donación ingresada:', nuevaFechaDonacion);

            // Restablecer el mensaje de error
            mensajeErrorFechaEdit.textContent = '';

            // Validar si la nueva fecha de donación está fuera del rango de la campaña
            if (nuevaFechaDonacion < startCampaign || nuevaFechaDonacion > endCampaign) {
                mensajeErrorFechaEdit.textContent = 'La fecha de donación debe estar dentro del rango de la campaña.';
                document.getElementById('btnEditCita').disabled = true;
            } else {
                // Habilitar el botón si la fecha es válida
                document.getElementById('btnEditCita').disabled = false;
            }
        })
        .catch(error => {
            // Manejar errores en la solicitud
            console.error('Error al obtener detalles de la cita o la campaña:', error);
            mensajeErrorFechaEdit.textContent = 'Error al obtener detalles de la cita o la campaña.';
        });
}





var citaSeleccionadaId;

// Función para abrir el modal de edición y obtener detalles de la cita
function editarCitaModal(citaId) {
    // Almacena el ID de la cita seleccionada globalmente
    citaSeleccionadaId = citaId;

    // Implementa la lógica para obtener los detalles de la cita según el ID
    obtenerDetallesCita(citaId);

    // Muestra el modal de edición
    var offcanvasEditCita = new bootstrap.Offcanvas(document.getElementById('offcanvasEditCita'));
    offcanvasEditCita.show();
}


  // FUNCION ELIMINAR CITA
function eliminarCita(citaId) {
    if (confirm('¿Estás seguro de que quieres eliminar esta cita?')) {
        fetch(`https://bloodprueba.up.railway.app/api/donationsdate/${citaId}`, {
            method: 'DELETE'
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`Error al eliminar la cita. Código de estado: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('Cita eliminada exitosamente:', data);
            cargarYMostrarCitas(); // Vuelve a cargar y mostrar la lista de citas después de la eliminación
        })
        .catch(error => {
            console.error('Error al eliminar la cita:', error);
            alert('Error al eliminar la cita.');
        });
    }
}
</script>

<style>
  #offcanvasAddCampaign{
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    width: 50%;
    height: 390px;
  }

  #offcanvasEditCita{
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    width: 50%;
    height: 320px;
  }

  #offcanvasDetallesCita{
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    width: 50%;
    height: 380px;
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
              <span class="d-none d-md-inline-block text-muted">ADMINISTRAR CITAS</span>
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

    function validarCurp() {
    var curpInput = document.getElementById('add-curpDonante');
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


function verificarCamposCitas() {
    var formulario = document.getElementById('addNewCampaignForm');
    if (!formulario.checkValidity()) {
        formulario.reportValidity();
        return;
    }

    // Obtener valores de los campos
    var curpDonante = document.getElementById('add-curpDonante').value;
    var fechaDonacion = document.getElementById('add-fechaDonacion').value;
    var idCampaña = document.getElementById('add-idCampaña').value;
    var idUnidad = document.getElementById('add-idUnidad').value;

    // Validar que los campos obligatorios no estén vacíos
    if (!curpDonante || !idCampaña || !idUnidad) {
        alert('Por favor, completa todos los campos obligatorios.');
        return;
    }

    // Declarar la variable receptorNombre
    var receptorNombre;

    // Realizar la solicitud para obtener los datos de la campaña
    var campaignEndpoint = 'https://bloodprueba.up.railway.app/api/campaign/' + idCampaña;
    fetch(campaignEndpoint)
        .then(response => {
            if (!response.ok) {
                throw new Error('Error al obtener datos de la campaña. Código de estado: ' + response.status);
            }
            return response.json();
        })
        .then(data => {
            if (data.Campaign && data.Campaign.user_id) {
                // Se obtuvo el ID del usuario (receptor) desde la API de la campaña
                var receptorId = data.Campaign.user_id;

                // Realizar la solicitud para obtener el nombre del receptor
                var userEndpoint = 'https://bloodprueba.up.railway.app/api/user/' + receptorId;
                return fetch(userEndpoint);
            } else {
                // La respuesta de la campaña no incluyó el ID del usuario (receptor)
                throw new Error('La respuesta de la campaña no incluyó el ID del usuario (receptor).');
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Error al obtener datos del usuario (receptor). Código de estado: ' + response.status);
            }
            return response.json();
        })
        .then(data => {
            if (data.user && data.user.name) {
                // Se obtuvo el nombre del receptor desde la API de usuarios
                receptorNombre = data.user.name;

                // Realizar la solicitud para obtener el ID del donante a través de la API
                var curpDonanteEndpoint = 'https://bloodprueba.up.railway.app/api/users/curp/' + curpDonante;
                return fetch(curpDonanteEndpoint);
            } else {
                // La respuesta de la API de usuarios no incluyó el nombre del receptor
                throw new Error('La respuesta de la API de usuarios no incluyó el nombre del receptor.');
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Error al obtener datos del donante. Código de estado: ' + response.status);
            }
            return response.json();
        })
        .then(data => {
            if (data.users && data.users.length > 0) {
                // Se encontró al menos un usuario con el CURP del donante
                var donanteId = data.users[0].id;

                // Crear objeto de datos para enviar al servidor
                var citaData = {
                    user_id: donanteId,
                    campaign_id: idCampaña,
                    date_donation: fechaDonacion,
                    medical_unit_id: idUnidad,
                    nombre_receptor: receptorNombre  // Utilizando el nombre obtenido del receptor
                };

                // Imprimir el objeto JSON en la consola
                console.log('Objeto JSON a enviar:', citaData);

                // Realizar la solicitud POST a la API de citas
                return fetch('https://bloodprueba.up.railway.app/api/donationdate', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(citaData)
                });
            } else {
                // No se encontraron usuarios con el CURP del donante
                throw new Error('No se encontró un usuario con el CURP del donante proporcionado.');
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Error al agregar la cita. Código de estado: ' + response.status);
            }
            return response.json();
        })
        .then(data => {
            // La respuesta exitosa del servidor
            console.log('Respuesta del servidor:', data);

            alert('Cita creada exitosamente.');

            // Restablecer valores de los campos a blanco
            document.getElementById('add-curpDonante').value = '';
            document.getElementById('add-fechaDonacion').value = '';
            document.getElementById('add-idCampaña').value = '';
            document.getElementById('add-idUnidad').value = '';

            offcanvasAddCampaign.hide();
        })
        .catch(error => {
            // Manejar errores en la solicitud
            console.error('Error al procesar la solicitud:', error);
            alert('Error al agregar la cita. Detalles: ' + error.message);
        });
}





    // -------------------------AQUI TERMINA EL AÑADIR Y COMIENZA EL EDITAR-----------------------------------------
    function validarCorreoElectronicoEdit() {
        var inputCorreoEdit = document.getElementById('edit-correoElectronico');
        var mensajeErrorCorreoEdit = document.getElementById('mensajeErrorCorreoEdit');
        var regexCorreo = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!regexCorreo.test(inputCorreoEdit.value)) {
            mensajeErrorCorreoEdit.textContent = 'Por favor, ingresa un correo electrónico válido.';
            inputCorreoEdit.classList.add('is-invalid');
        } else {
            mensajeErrorCorreoEdit.textContent = '';
            inputCorreoEdit.classList.remove('is-invalid');
        }
    }

    function validarContrasenaEdit() {
        var contrasenaInputEdit = document.getElementById('edit-contrasena');
        var mensajeErrorContrasenaEdit = document.getElementById('mensajeErrorContrasenaEdit');
        if (contrasenaInputEdit.value.length < 6 || contrasenaInputEdit.value.length > 15) {
            mensajeErrorContrasenaEdit.textContent = 'La contraseña debe tener entre 6 y 15 caracteres.';
            contrasenaInputEdit.classList.add('is-invalid');
        } else {
            mensajeErrorContrasenaEdit.textContent = '';
            contrasenaInputEdit.classList.remove('is-invalid');
        }
    }

    function validarCurpEdit() {
    var curpInputEdit = document.getElementById('edit-curp');
    var mensajeErrorCurpEdit = document.getElementById('mensajeErrorCurpEdit');

    // Convertir el CURP a mayúsculas
 

    // Expresión regular para permitir solo letras sin acentos y números
    var regexCurp = /^[A-Z0-9]+$/;

    // Verificar la longitud del CURP y el formato
    if (curpInputEdit.value.length !== 18 || !regexCurp.test(curpInputEdit.value)) {
        mensajeErrorCurpEdit.innerText = 'El CURP debe tener exactamente 18 caracteres y solo contener letras y números sin acentos.';
        curpInputEdit.classList.add('is-invalid');
    } else {
        // Limpiar el mensaje de error si la longitud y formato son correctos
        mensajeErrorCurpEdit.innerText = '';
        curpInputEdit.classList.remove('is-invalid');
        curpInputEdit.value = curpInputEdit.value.toUpperCase();
    }
}


</script>
<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
      <h4>Lista de citas</h4>
      <button type="button" class="btn btn-success" id="btnAddCampaignModal">Añadir</button>
  </div>

  <div class="table-responsive text-nowrap">
      <table class="table">
          <thead class="table-light">
              <tr>
                  <th>ID Usuario</th>
                  <th>ID Campaña</th>
                  <th>Fecha de Donación</th>
                  <th>Nombre del Receptor</th>
                  <th>ID Unidad Médica</th>
                  <th>Acciones</th>
              </tr>
          </thead>
          <!-- Asegúrate de tener un tbody con el ID 'tablaCitasBody' -->
          <tbody class="table-border-bottom-0" id="tablaCitasBody">
              <!-- Aquí puedes tener filas predefinidas si lo deseas -->
          </tbody>
      </table>
  </div>
</div>
<!-- Bootstrap Table with Header - Light -->


<!-- Modal Editar Cita -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEditCita" aria-labelledby="offcanvasEditCitaLabel">
  <div class="offcanvas-header">
      <h5 id="offcanvasEditCitaLabel" class="offcanvas-title">Editar Cita</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>

  <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
      <form class="edit-cita pt-0" id="editCitaForm" onsubmit="return false">

          <div class="mb-3">
              <label class="form-label" for="edit-IdCita">ID de la Cita</label>
              <input type="text" id="edit-IdCita" class="form-control" placeholder="ID de la Cita" aria-label="ID de la Cita" readonly />
          </div>

          <div class="mb-3">
            <label class="form-label" for="edit-FechaInicioCita">Fecha de Donación</label>
            <div class="col-md-10">
                <input class="form-control" type="date" value="" id="edit-FechaInicioCita" onchange="validarFechaEdicion()" />
                <div id="mensajeErrorFechaEdit" style="color: red;"></div>
            </div>
        </div>

          <div class="d-flex justify-content-center">
            <button type="submit" id="btnEditCita" class="btn btn-primary me-sm-3 me-1 data-submit" onclick="editarCita()">Guardar Cambios</button>
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancelar</button>
          </div>
      </form>
  </div>
</div>
<!-- Modal Añadir Citas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddCampaign" aria-labelledby="offcanvasAddCampaignLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasAddCampaignLabel" class="offcanvas-title">Añadir Cita</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
        <form class="add-new-campaign pt-0" id="addNewCampaignForm" onsubmit="return false">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label" for="add-idCampaña">Id de la campaña</label>
                    <select id="add-idCampaña" class="form-select">
                        <option selected disabled value="">Opciones...</option>
                        <!-- Opciones de campañas se cargarán dinámicamente aquí -->
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="add-idUnidad">Id de la unidad médica</label>
                    <select id="add-idUnidad" class="form-select">
                        <option selected disabled value="">Opciones...</option>
                        <!-- Opciones de unidades médicas se cargarán dinámicamente aquí -->
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label class="form-label" for="add-fechaDonacion">Fecha de la donación</label>
                    <div class="col-md-10">
                        <input class="form-control" type="date" value="" id="add-fechaDonacion" min="2023-12-01" max="2024-01-01" onchange="validarFechaAñadir()" />
                        <div id="mensajeErrorFechaAdd" style="color: red;"></div>
                    </div>
                </div>
            </div>

            <!-- Nuevo campo para el CURP del donante -->
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label" for="add-curpDonante">CURP del Donante</label>
                    <input type="text" id="add-curpDonante" class="form-control" placeholder="Escribir el CURP del donante" aria-label="CURP del donante" onblur="validarCurp()" />
                    <div id="mensajeErrorCurp" style="color: red;"></div>
                </div>
            </div>

            <div class="row text-center mt-4">
                <div class="col">
                    <button type="submit" id="btnAddCampaign" class="btn btn-danger me-sm-3 me-1 data-submit" onclick="verificarCamposCitas()">Confirmar</button>
                    <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancelar</button>
                </div>
            </div>
        </form>
    </div>
</div>


                      <!-- MODAL DETALLES -->


<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasDetallesCita" aria-labelledby="offcanvasDetallesCitaLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasDetallesCitaLabel" class="offcanvas-title">Detalles de la Cita</h5>
        <button type="button" class="btn-close text-reset ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
  
    <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
        <form class="detalles-cita pt-0" id="detallesCitaForm" onsubmit="return false">
            <div class="row">
                <!-- Columna 1 -->
                <div class="col-md-6">
                    <!-- Campo ID de la Cita -->
                    <div class="mb-3">
                        <label for="detalles-idCita" class="form-label">ID de la Cita:</label>
                        <input type="text" class="form-control" id="detalles-idCita" readonly>
                    </div>
            
                    <!-- Campo ID del Usuario -->
                    <div class="mb-3">
                        <label for="detalles-userId" class="form-label">ID del Usuario:</label>
                        <input type="text" class="form-control" id="detalles-userId" readonly>
                    </div>
                </div>
            
                <!-- Columna 2 -->
                <div class="col-md-6">
                    <!-- Campo ID de la Campaña -->
                    <div class="mb-3">
                        <label for="detalles-campaignId" class="form-label">ID de la Campaña:</label>
                        <input type="text" class="form-control" id="detalles-campaignId" readonly>
                    </div>
            
                    <!-- Campo ID de la Unidad Médica -->
                    <div class="mb-3">
                        <label for="detalles-medicalUnitId" class="form-label">ID de la Unidad Médica:</label>
                        <input type="text" class="form-control" id="detalles-medicalUnitId" readonly>
                    </div>
                </div>
            
                <!-- Campo Fecha de Donación -->
                <div class="mb-3 col-md-6">
                    <label for="detalles-fechaDonacion" class="form-label">Fecha de Donación:</label>
                    <input type="text" class="form-control" id="detalles-fechaDonacion" readonly>
                </div>
            
                <!-- Campo Nombre del Receptor -->
                <div class="mb-3 col-md-6">
                    <label for="detalles-nombreReceptor" class="form-label">Nombre del Receptor:</label>
                    <input type="text" class="form-control" id="detalles-nombreReceptor" readonly>
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
  var btnAddCampaign = document.getElementById('btnAddCampaignModal');
  var offcanvasAddCampaign = new bootstrap.Offcanvas(document.getElementById('offcanvasAddCampaign'));
  btnAddCampaign.addEventListener('click', function () {
    offcanvasAddCampaign.show();
  });
</script>



</body>

</html>

<!-- beautify ignore:end -->