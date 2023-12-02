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

    <title>Administrador | Unidades médicas</title>

    
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
        cargarYMostrarUnidades();
    };

    function cargarYMostrarUnidades() {
        fetch('http://127.0.0.1:8000/api/medunits/')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error al obtener la lista de unidades médicas. Código de estado: ' + response.status);
                }
                return response.json();
            })
            .then(data => {
                if (data.MedicalUnits && Array.isArray(data.MedicalUnits)) {
                    renderizarTablaUnidadesMedicas(data.MedicalUnits);
                } else {
                    throw new Error('Formato de respuesta inesperado. Se esperaba un campo "MedicalUnits" de tipo array.');
                }
            })
            .catch(error => {
                console.error('Error al cargar unidades médicas:', error);
            });
    }

    function renderizarTablaUnidadesMedicas(units) {
        var tbody = document.getElementById('tablaUnidadesMedicasBody');
        if (!tbody) {
            console.error('Elemento tbody no encontrado.');
            return;
        }
        tbody.innerHTML = '';

        units.forEach(unit => {
            var row = tbody.insertRow();

            var cellNombre = row.insertCell(0);
            var cellUrlGmaps = row.insertCell(1);
            var cellAcciones = row.insertCell(2);

            cellNombre.innerText = unit.name;
            cellUrlGmaps.innerText = unit.urlGmaps || 'N/A';

            cellAcciones.innerHTML = `
                <button type="button" class="btn btn-primary" onclick="obtenerDetallesUnidad(${unit.id})">Editar</button>
                <button type="button" class="btn btn-danger" onclick="eliminarUnidad('${unit.id}')"><i class="ti ti-trash"></i> Eliminar</button>`;
        });
    }

    let unidadSeleccionadaId = null;

    async function obtenerDetallesUnidad(id) {
    try {
        const response = await fetch(`http://127.0.0.1:8000/api/medunit/${id}`);
        if (!response.ok) {
            throw new Error(`Error al obtener los detalles de la unidad médica. Código de estado: ${response.status}`);
        }
        const data = await response.json();
        console.log('Detalles de la unidad médica:', data);
        // Realizar acciones adicionales con los detalles obtenidos si es necesario
    } catch (error) {
        console.error('Error al obtener los detalles de la unidad médica:', error);
        // Manejar el error según tus necesidades
        alert('Error al obtener los detalles de la unidad médica.');
    }
}

    document.getElementById('btnEdit').addEventListener('click', function () {
        console.log("Soy el botón editar");
        verificarCamposEdit();
    });

    function eliminarUnidad(unitId) {
        if (confirm('¿Estás seguro de que quieres eliminar esta unidad médica?')) {
            fetch(`http://127.0.0.1:8000/api/medunit/${unitId}`, {
                method: 'DELETE'
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`Error al eliminar la unidad médica. Código de estado: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                console.log('Unidad médica eliminada exitosamente:', data);
                cargarYMostrarUnidades();
            })
            .catch(error => {
                console.error('Error al eliminar la unidad médica:', error);
                alert('Error al eliminar la unidad médica.');
            });
        }
    }
</script>

<style>
  #offcanvasAddMedicalUnit{
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    width: 50%;
    height: 300px;
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
        <!-- validaciones de los modales -->

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
    var curpInput = document.getElementById('add-curp');
    var mensajeErrorCurp = document.getElementById('mensajeErrorCurp');

    // Expresión regular para permitir solo letras sin acentos y números
    var regexCurp = /^[A-Za-z0-9]+$/;

    // Verificar la longitud del CURP
    if (curpInput.value.length !== 18 || !regexCurp.test(curpInput.value)) {
        mensajeErrorCurp.innerText = 'El CURP debe tener exactamente 18 caracteres y solo contener letras y números sin acentos.';
        curpInput.classList.add('is-invalid');
    } else {
        mensajeErrorCurp.innerText = ''; // Limpiar el mensaje de error si la longitud y formato son correctos
        curpInput.classList.remove('is-invalid');
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
    function validarFechaNacimiento() {
    var fechaInput = document.getElementById('html5-date-input');
    var mensajeErrorFecha = document.getElementById('mensajeErrorFecha');
    var fechaArray = fechaInput.value.split('-');
    if (fechaArray.length === 3 && fechaArray[0].length > 4) {
        fechaArray[0] = fechaArray[0].substring(0, 4);
        fechaInput.value = fechaArray.join('-');
    }

    var fechaSeleccionada = new Date(fechaInput.value);
    var fechaMinima = new Date('1900-01-01');
    var fechaMaxima = new Date('2023-11-27');

    if (fechaSeleccionada < fechaMinima || fechaSeleccionada > fechaMaxima) {
        mensajeErrorFecha.innerText = 'Por favor, ingresa una fecha entre 1900-01-01 y 2023-12-31.';
        fechaInput.classList.add('is-invalid');
    } else {
        mensajeErrorFecha.innerText = '';
        fechaInput.classList.remove('is-invalid');
    }
}

function verificarCamposMedicalUnits() {
    var formulario = document.getElementById('addNewMedicalUnit');
    if (!formulario.checkValidity()) {
        formulario.reportValidity();
        return;
    }

    // Obtener valores de los campos de la unidad médica
    var nombreUnidadMedica = document.getElementById('add-nombreUnidadMedica').value;
    var urlGmaps = document.getElementById('add-urlGmaps').value;

    // Crear objeto de datos para enviar al servidor
    var medicalUnitData = {
        name: nombreUnidadMedica,
        urlGmaps: urlGmaps
    };

    // Realizar la solicitud POST a la API de unidades médicas
    fetch('http://127.0.0.1:8000/api/medunit/', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(medicalUnitData)
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Error al agregar la unidad médica. Código de estado: ' + response.status);
        }
        return response.json(); 
    })
    .then(data => {
        // La respuesta exitosa del servidor
        console.log('Respuesta del servidor (Unidad Médica):', data);

        // Restablecer valores de los campos a blanco
        document.getElementById('add-nombreUnidadMedica').value = '';
        document.getElementById('add-urlGmaps').value = '';

        alert('Unidad médica creada exitosamente.');
    })
    .catch(error => {
    // Manejar errores en la solicitud
    console.error('Error en la solicitud:', error);

    // Verificar si hay una respuesta del servidor
    if (error && error.response) {
        error.response.text().then(text => {
            console.error('Contenido de la respuesta:', text);
        });
    }

    alert('Error al agregar la unidad médica.');
});

    // Cerrar el modal 
    var offcanvasAddMedicalUnit = new bootstrap.Offcanvas(document.getElementById('offcanvasAddMedicalUnit'));
    offcanvasAddMedicalUnit.hide();
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
date
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

function verificarCamposEditMedicalUnit() {
    // Obtener el formulario
    var formulario = document.getElementById('editMedicalUnitForm');

    // Verificar la validez del formulario
    if (!formulario.checkValidity()) {
        // Si el formulario no es válido, mostrar mensajes de error y detener el proceso
        formulario.reportValidity();
        return;
    }

    // Obtener valores de los campos de la unidad médica
    var nombreUnidadMedica = document.getElementById('edit-nombreUnidadMedica').value;
    var urlGmaps = document.getElementById('edit-urlGmaps').value;

    // Crear objeto de datos para enviar al servidor
    var editedMedicalUnitData = {
        name: nombreUnidadMedica,
        urlGmaps: urlGmaps
    };

    // Obtener el ID de la unidad médica seleccionada de alguna manera (por ejemplo, mediante una variable global)
    var unidadMedicaSeleccionadaId = obtenerIdUnidadMedicaSeleccionada();

    // Realizar la solicitud PUT a la API de unidades médicas
    fetch('http://127.0.0.1:8000/api/medunit/' + unidadMedicaSeleccionadaId, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(editedMedicalUnitData)
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Error al editar la unidad médica. Código de estado: ' + response.status);
        }
        return response.json(); 
    })
    .then(data => {
        console.log('Respuesta del servidor (Unidad Médica):', data);

        var offcanvasEditMedicalUnit = new bootstrap.Offcanvas(document.getElementById('offcanvasEditMedicalUnit'));
        offcanvasEditMedicalUnit.hide();
        setTimeout(function() {
            alert('Unidad médica editada exitosamente.');
        }, 300);
    })
    .catch(error => {
        console.error('Error en la solicitud de edición de unidad médica:', error);
        alert('Error al editar la unidad médica.');

        if (error && error.response && error.response.text) {
            // Intenta obtener más información sobre la respuesta
            error.response.text().then(text => {
                console.error('Contenido de la respuesta:', text);
            });
        }
    });
}

// Función para obtener el ID de la unidad médica seleccionada (puedes ajustarla según tu lógica)
function obtenerIdUnidadMedicaSeleccionada() {
    // Supongamos que tienes una variable global llamada unidadMedicaSeleccionadaId
    return unidadMedicaSeleccionadaId;
}
</script>
<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
      <h4>Lista de unidades médicas</h4>
      <button type="button" class="btn btn-secondary" id="btnAddMedicalUnit">Añadir</button>
  </div>

  <div class="table-responsive text-nowrap">
      <table class="table">
          <thead class="table-light">
              <tr>
                  <th>Nombre</th>
                  <th>URL</th>
                  <th>Acciones</th>
              </tr>
          </thead>
          <!-- Asegúrate de tener un tbody con el ID 'tablaCampanasBody' -->
          <tbody class="table-border-bottom-0" id="tablaUnidadesMedicasBody">
              <!-- Aquí puedes tener filas predefinidas si lo deseas -->
          </tbody>
      </table>
  </div>
</div>
<!-- Bootstrap Table with Header - Light -->



<!-- Modal Editar Unidades Médicas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEditMedicalUnit" aria-labelledby="offcanvasEditMedicalUnitLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasEditMedicalUnitLabel" class="offcanvas-title">Editar Unidad Médica</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
        <form class="edit-medical-unit pt-0" id="editMedicalUnitForm" onsubmit="return false">

            <div class="mb-3">
                <label class="form-label" for="edit-nombreUnidadMedica">Nombre de la Unidad Médica</label>
                <input type="text" id="edit-nombreUnidadMedica" class="form-control" placeholder="Escribir Nombre de la Unidad Médica" aria-label="Nombre de la Unidad Médica" />
            </div>

            <div class="mb-3">
                <label class="form-label" for="edit-urlGmaps">Escribir Url del Mapa</label>
                <input type="text" id="edit-urlGmaps" class="form-control" placeholder="Escribir Url del Mapa" aria-label="Url de la Unidad Médica" />
            </div>

            <button type="submit" id="btnEditMedicalUnit" class="btn btn-primary me-sm-3 me-1 data-submit" onclick="verificarCamposEditMedicalUnit()">Guardar Cambios</button>
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancelar</button>
        </form>
    </div>
</div>

  <!-- Modal Añadir Unidades Medicas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddMedicalUnit" aria-labelledby="offcanvasAddMedicalUnitLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasAddMedicalUnitLabel" class="offcanvas-title">Unidad Medica</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>

  <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
    <form class="add-new-campaign pt-0" id="addNewMedicalUnit" onsubmit="return false">

      <div class="mb-3">
        <label class="form-label" for="add-nombreUnidadMedica">Nombre de la Unidad Medica</label>
        <input type="text" id="add-nombreUnidadMedica" class="form-control" placeholder="Escribir Nombre de la Unidad Medica" aria-label="Nombre de la Unidad Medica" />
      </div>

      <div class="mb-3">
        <label class="form-label" for="add-urlGmaps">Escribir Url del Mapa</label>
        <input type="text" id="add-urlGmaps" class="form-control" placeholder="Escribir Url del Mapa" aria-label="Url de la Unidad Medica" />
      </div>

      <div class="text-center">
        <button type="submit" id="btnAddMedicalUnit" class="btn btn-danger me-sm-3 me-1 data-submit" onclick="verificarCamposMedicalUnits()">Confirmar</button>
        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancelar</button>
      </div>

    </form>
  </div>
</div>









<!-- Modal Añadir Campañas -->
<!-- <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddMedicalUnit" aria-labelledby="offcanvasAddMedicalUnitLabel">
  <div class="offcanvas-header">
      <h5 id="offcanvasAddMedicalUnitLabel" class="offcanvas-title">Campaña</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>

  <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
      <form class="add-new-campaign pt-0" id="addNewCampaignForm" onsubmit="return false">

          <div class="mb-3">
              <label class="form-label" for="add-nombreCampaña">Nombre de la Campaña</label>
              <input type="text" id="add-nombreCampaña" class="form-control" placeholder="Escribir Nombre de la Campaña" aria-label="Nombre de la Campaña" />
          </div>

          <div class="mb-3">
              <label class="form-label" for="add-descripcionCampaña">Descripción de la Campaña</label>
              <input type="text" id="add-descripcionCampaña" class="form-control" placeholder="Escribir Descripción de la Campaña" aria-label="Descripción de la Campaña" />
          </div>

          <div class="mb-3">
              <label class="form-label" for="add-tipoCampaña">Tipo de Campaña</label>
              <select id="add-tipoCampaña" class="form-select">
                  <option selected disabled value="">Opciones...</option>
                  <option value="Plaquetas">Plaquetas</option>
                  <option value="Sangre">Sangre</option>
              </select>
          </div>

          <div class="mb-3">
              <label class="form-label" for="add-fechaInicio">Fecha de Inicio</label>
              <div class="col-md-10">
                  <input class="form-control" type="date" value="" id="add-fechaInicio" min="2022-01-01" max="2023-12-31" />
              </div>
          </div>

          <div class="mb-3">
              <label class="form-label" for="add-donacionesRequeridas">Donaciones Requeridas</label>
              <input type="number" id="add-donacionesRequeridas" class="form-control" placeholder="Número de Donaciones Requeridas" aria-label="Donaciones Requeridas" />
          </div> -->

          <!-- <button type="submit" id="btnAddCampaign" class="btn btn-danger me-sm-3 me-1 data-submit" onclick="verificarCamposCampaign()">Confirmar</button>
          <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancelar</button>
      </form>
  </div>
</div> -->

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
  var btnAddMedicalUnit = document.getElementById('btnAddMedicalUnit');
  var offcanvasAddMedicalUnit = new bootstrap.Offcanvas(document.getElementById('offcanvasAddMedicalUnit'));
  btnAddMedicalUnit.addEventListener('click', function () {
    offcanvasAddMedicalUnit.show();
  });
</script>



</body>

</html>

<!-- beautify ignore:end -->