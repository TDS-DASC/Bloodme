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


<script>
        window.onload = function () {
    cargarYMostrarUsuarios();
};

function cargarYMostrarUsuarios() {
    fetch('http://127.0.0.1:8000/api/users/')
        .then(response => {
            if (!response.ok) {
                throw new Error('Error al obtener la lista de usuarios. Código de estado: ' + response.status);
            }
            return response.json();
        })
        .then(data => {
            if (data.users && Array.isArray(data.users)) {
                renderizarTablaUsuarios(data.users);
            } else {
                throw new Error('Formato de respuesta inesperado. Se esperaba un campo "users" de tipo array.');
            }
        })
        .catch(error => {
            console.error('Error al cargar usuarios:', error);
        });
}

function renderizarTablaUsuarios(usuarios) {
    var tbody = document.getElementById('tablaUsuariosBody');
    if (!tbody) {
        console.error('Elemento tbody no encontrado.');
        return;
    }
    tbody.innerHTML = '';

    usuarios.forEach(usuario => {
        var row = tbody.insertRow();

        var cellNombre = row.insertCell(0);
        var cellCorreo = row.insertCell(1);
        var cellTipoSangre = row.insertCell(2);
        var cellFechaNacimiento = row.insertCell(3);
        var cellGenero = row.insertCell(4);
        var cellDonador = row.insertCell(5);
        var cellCURP = row.insertCell(6);
        var cellAcciones = row.insertCell(7);

        cellNombre.innerText = usuario.name + ' ' + usuario.last_name;
        cellCorreo.innerText = usuario.email;
        cellTipoSangre.innerText = usuario.blood_type;
        cellFechaNacimiento.innerText = usuario.birthdate;
        cellGenero.innerText = usuario.gender;
        cellDonador.innerText = usuario.donor;
        cellCURP.innerText = usuario.curp;

        cellAcciones.innerHTML = `
        <button type="button" class="btn btn-primary" onclick="obtenerDetallesUsuario(${usuario.id})">Editar</button>
            <button type="button" class="btn btn-danger" onclick="eliminarUsuario('${usuario.id}')"><i class="ti ti-trash"></i> Eliminar</button>`;
    });
}

let usuarioSeleccionadoId = null;

// Función para obtener y mostrar los detalles del usuario en el modal de edición
function obtenerDetallesUsuario(userId) {
    fetch(`http://127.0.0.1:8000/api/user/${userId}`, {
        method: 'GET'
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`Error al obtener los detalles del usuario. Código de estado: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        console.log('Respuesta completa de la API:', data);

        // Modifica esta parte según la estructura real de tu respuesta
        const usuarioId = data.user.id || '';
        const usuarioNombre = data.user.name || '';
        const usuarioApellido = data.user.last_name || '';
        const usuarioEmail = data.user.email || '';

        if (usuarioId && usuarioNombre && usuarioApellido && usuarioEmail) {
            // Almacena el ID del usuario seleccionado globalmente
            usuarioSeleccionadoId = usuarioId;

            // Rellenar campos del formulario de edición
            document.getElementById('edit-Nombres').value = usuarioNombre;
            document.getElementById('edit-Apellidos').value = usuarioApellido;
            document.getElementById('edit-correoElectronico').value = usuarioEmail;
            document.getElementById('edit-tipoSangre').value = data.user.blood_type || '';
            document.getElementById('edit-curp').value = data.user.curp || '';
            document.getElementById('edit-html5-date-input').value = data.user.birthdate || '';
            document.getElementById('edit-genero').value = data.user.gender || '';

            // Mostrar el modal de edición
            var offcanvasEditUser = new bootstrap.Offcanvas(document.getElementById('offcanvasEditUser'));
            offcanvasEditUser.show();
        } else {
            throw new Error('Formato de respuesta inesperado. Datos incompletos del usuario.');
        }
    })
    .catch(error => {
        console.error('Error al obtener los detalles del usuario:', error);
        alert('Error al obtener los detalles del usuario.');
    });
}

// Función para abrir el modal de edición al hacer clic en el botón de editar
function editarUsuario(userId) {
    obtenerDetallesUsuario(userId);
}

// Asigna el evento de clic al botón de editar para abrir el modal de edición
document.getElementById('btnEdit').addEventListener('click', function() {
  console.log("Soy el botón editar");
    verificarCamposEdit();
});


</script>
    
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
        var mensajeErrorId = 'mensajeErrorLetras' + campoInput.id.charAt(4); // Genera un identificador dinámico

        // Permitir solo letras (sin espacios, números o caracteres especiales)
        if ((charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122) && charCode !== 32) {
            mostrarErrorLetras(mensajeErrorId, 'Solo se permiten letras (sin espacios, números o caracteres especiales).');
            return false;
        }

        // Limpiar mensaje de error si la entrada es válida
        mostrarErrorLetras(mensajeErrorId, ''); // Limpiar el mensaje de error
        return true;
    }

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


    function validarCurp() {
        var curpInput = document.getElementById('add-curp');
        var mensajeErrorCurp = document.getElementById('mensajeErrorCurp');

        // Verificar la longitud del CURP
        if (curpInput.value.length !== 18) {
            mensajeErrorCurp.innerText = 'El CURP debe tener exactamente 18 caracteres.';
            curpInput.classList.add('is-invalid');
        } else {
            mensajeErrorCurp.innerText = ''; // Limpiar el mensaje de error si la longitud es correcta
            curpInput.classList.remove('is-invalid');
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
            mensajeErrorContrasena.textContent = ''; // Limpiar el mensaje de error si la longitud es correcta
            contrasenaInput.classList.remove('is-invalid');
        }
    }

    function validarCorreoElectronicoEdit() {
        var inputCorreoEdit = document.getElementById('edit-correoElectronico');
        var mensajeErrorCorreoEdit = document.getElementById('mensajeErrorCorreoEdit');

        // Expresión regular para validar un formato de correo electrónico básico
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

        // Verificar la longitud de la contraseña
        if (contrasenaInputEdit.value.length < 6 || contrasenaInputEdit.value.length > 15) {
            mensajeErrorContrasenaEdit.textContent = 'La contraseña debe tener entre 6 y 15 caracteres.';
            contrasenaInputEdit.classList.add('is-invalid');
        } else {
            mensajeErrorContrasenaEdit.textContent = ''; // Limpiar el mensaje de error si la longitud es correcta
            contrasenaInputEdit.classList.remove('is-invalid');
        }
    }

    function validarCurpEdit() {
        var curpInputEdit = document.getElementById('edit-curp');
        var mensajeErrorCurpEdit = document.getElementById('mensajeErrorCurpEdit');

        // Verificar la longitud del CURP
        if (curpInputEdit.value.length !== 18) {
            mensajeErrorCurpEdit.innerText = 'El CURP debe tener exactamente 18 caracteres.';
            curpInputEdit.classList.add('is-invalid');
        } else {
            mensajeErrorCurpEdit.innerText = ''; // Limpiar el mensaje de error si la longitud es correcta
            curpInputEdit.classList.remove('is-invalid');
        }
    }

function validarFechaNacimientoEdit() {
    // Lógica de validación para la fecha de nacimiento en modo edición
    function validarFechaNacimientoEdit() {
        var fechaInputEdit = document.getElementById('edit-html5-date-input');
        var mensajeErrorFechaEdit = document.getElementById('mensajeErrorFechaEdit');

        // Verifica si hay más de 4 dígitos en el año y corrige si es necesario
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
    // Obtener el formulario de edición
    var formularioEdit = document.getElementById('editUserForm');

    // Verificar la validez del formulario
    if (!formularioEdit.checkValidity()) {
        // Si el formulario no es válido, mostrar mensajes de error y detener el proceso
        formularioEdit.reportValidity();
        return;
    }

    // Obtener valores de los campos editables
    var editNombres = document.getElementById('edit-Nombres').value;
    var editApellidos = document.getElementById('edit-Apellidos').value;
    var editCorreoElectronico = document.getElementById('edit-correoElectronico').value;
    var editTipoSangre = document.getElementById('edit-tipoSangre').value;
    var editCurp = document.getElementById('edit-curp').value;
    var editFechaNacimiento = document.getElementById('edit-html5-date-input').value;
    var editGenero = document.getElementById('edit-genero').value;

    console.log('Datos de edición válidos:', {
        Nombres: editNombres,
        Apellidos: editApellidos,
        CorreoElectronico: editCorreoElectronico,
        TipoSangre: editTipoSangre,
        CURP: editCurp,
        FechaNacimiento: editFechaNacimiento,
        Genero: editGenero
    });

    // Crear objeto de datos para enviar al servidor
    var editedUserData = {
        name: editNombres,
        last_name: editApellidos,
        email: editCorreoElectronico,
        blood_type: editTipoSangre,
        curp: editCurp,
        birthdate: editFechaNacimiento,
        gender: editGenero
    };

    // Realizar la solicitud PUT a la API para editar el usuario
    fetch('http://127.0.0.1:8000/api/users/' + usuarioSeleccionadoId, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(editedUserData)
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Error al editar el usuario. Código de estado: ' + response.status);
        }
        return response.json(); // Intenta parsear la respuesta como JSON
    })
    .then(data => {
        // La respuesta exitosa del servidor
        console.log('Respuesta del servidor:', data);

        var offcanvasEditUser = new bootstrap.Offcanvas(document.getElementById('offcanvasAddUser'));
        offcanvasEditUser.hide();

        // Mostrar alerta de edición exitosa después de un breve retraso para dar tiempo al modal para ocultarse completamente
        setTimeout(function() {
            alert('Usuario editado exitosamente.');

            // Restablecer valores de los campos a blanco si es necesario
            // (puedes adaptar esto según tu lógica específica)
        }, 300);
    })
    .catch(error => {
        // Manejar errores en la solicitud de edición
        console.error('Error en la solicitud de edición:', error);
        alert('Error al editar el usuario.');

        // Verificar si hay una respuesta del servidor
        if (error && error.response && error.response.text) {
            // Intenta obtener más información sobre la respuesta
            error.response.text().then(text => {
                console.error('Contenido de la respuesta:', text);
            });
        }
    });

    // Cerrar el modal de edición
    var offcanvasEditUser = new bootstrap.Offcanvas(document.getElementById('offcanvasEditUser'));
    offcanvasEditUser.hide();
}

    function verificarCampos() {
        // Obtener el formulario
        var formulario = document.getElementById('addNewUserForm');

        // Verificar la validez del formulario
        if (!formulario.checkValidity()) {
            // Si el formulario no es válido, mostrar mensajes de error y detener el proceso
            formulario.reportValidity();
            return;
        }

        // Obtener valores de los campos
        var nombres = document.getElementById('add-Nombres').value;
        var apellidos = document.getElementById('add-Apellidos').value;
        var correoElectronico = document.getElementById('add-correoElectronico').value;
        var contrasena = document.getElementById('add-contrasena').value;
        var tipoSangre = document.getElementById('add-tipoSangre').value;
        var curp = document.getElementById('add-curp').value;
        var fechaNacimiento = document.getElementById('html5-date-input').value;
        var genero = document.getElementById('add-genero').value;
        

        

        console.log('Datos válidos:', {
            Nombres: nombres,
            Apellidos: apellidos,
            CorreoElectronico: correoElectronico,
            Contrasena: contrasena,
            TipoSangre: tipoSangre,
            CURP: curp,
            FechaNacimiento: fechaNacimiento,
            Genero: genero
        });

        // Crear objeto de datos para enviar al servidor
        var userData = {
            name: nombres,
            last_name: apellidos,
            email: correoElectronico,
            password: contrasena,
            blood_type: tipoSangre,
            curp: curp,
            birthdate: fechaNacimiento,
            gender: genero
        };

        // Realizar la solicitud POST a la API
        fetch('http://127.0.0.1:8000/api/register', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(userData)
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Error al agregar el usuario. Código de estado: ' + response.status);
            }
            return response.json(); // Intenta parsear la respuesta como JSON
        })
        .then(data => {
            // La respuesta exitosa del servidor
            console.log('Respuesta del servidor:', data);

            var offcanvasAddUser = new bootstrap.Offcanvas(document.getElementById('offcanvasAddUser'));
            offcanvasAddUser.hide();

            // Mostrar alerta de creación exitosa después de un breve retraso para dar tiempo al modal para ocultarse completamente
            setTimeout(function() {
                alert('Usuario creado exitosamente.');

                 // Restablecer valores de los campos a blanco
        document.getElementById('add-Nombres').value = '';
        document.getElementById('add-Apellidos').value = '';
        document.getElementById('add-correoElectronico').value = '';
        document.getElementById('add-contrasena').value = '';
        document.getElementById('add-tipoSangre').value = '';
        document.getElementById('add-curp').value = '';
        document.getElementById('html5-date-input').value = '';
        document.getElementById('add-genero').value = '';
        
            }, 300);
        })
        .catch(error => {
    // Manejar errores en la solicitud
    console.error('Error en la solicitud:', error);
    alert('Error al agregar el usuario.');

    // Verificar si hay una respuesta del servidor
    if (error && error.response && error.response.text) {
        // Intenta obtener más información sobre la respuesta
        error.response.text().then(text => {
            console.error('Contenido de la respuesta:', text);
        });
    }
});

        // Cerrar el modal 
        var offcanvasAddUser = new bootstrap.Offcanvas(document.getElementById('offcanvasAddUser'));
        offcanvasAddUser.hide();
    }

   

    function validarFechaNacimiento() {
    var fechaInput = document.getElementById('html5-date-input');
    var mensajeErrorFecha = document.getElementById('mensajeErrorFecha');

    // Verifica si hay más de 4 dígitos en el año y corrige si es necesario
    var fechaArray = fechaInput.value.split('-');
    if (fechaArray.length === 3 && fechaArray[0].length > 4) {
        fechaArray[0] = fechaArray[0].substring(0, 4);
        fechaInput.value = fechaArray.join('-');
    }

    // Verifica si la fecha está dentro del rango deseado
    var fechaSeleccionada = new Date(fechaInput.value);
    var fechaMinima = new Date('1900-01-01');
    var fechaMaxima = new Date('2023-12-31');

    if (fechaSeleccionada < fechaMinima || fechaSeleccionada > fechaMaxima) {
        mensajeErrorFecha.innerText = 'Por favor, ingresa una fecha entre 1900-01-01 y 2023-12-31.';
        fechaInput.classList.add('is-invalid');
    } else {
        mensajeErrorFecha.innerText = '';
        fechaInput.classList.remove('is-invalid');
    }
}

</script>


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
      <!-- Asegúrate de tener un tbody con el ID 'tablaUsuariosBody' -->
      <tbody class="table-border-bottom-0" id="tablaUsuariosBody">
        <!-- Aquí puedes tener filas predefinidas si lo deseas -->
        
      </tbody>
    </table>
  </div>
</div>
<!-- Bootstrap Table with Header - Light -->



<!-- Modal Editar Usuarios -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEditUser" aria-labelledby="offcanvasEditUserLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasEditUserLabel" class="offcanvas-title">Editar Usuario</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
        <form class="edit-user pt-0" id="editUserForm" onsubmit="return false">

            <div class="mb-3">
                <label class="form-label" for="edit-Nombres">Nombres</label>
                <input type="text" id="edit-Nombres" class="form-control" placeholder="Escribir Nombres" aria-label="Nombre Completo" onkeypress="return validarSoloLetras(event, this)" />
                <div id="mensajeErrorLetrasNombresEdit" style="color: red;"></div>
            </div>

            <div class="mb-3">
                <label class="form-label" for="edit-Apellidos">Apellidos</label>
                <input type="text" id="edit-Apellidos" class="form-control" placeholder="Escribir Apellidos" aria-label="Apellido Completo" onkeypress="return validarSoloLetras(event, this)"  />
                <div id="mensajeErrorLetrasApellidosEdit" style="color: red;"></div>
            </div>

            <div class="mb-3">
              <label class="form-label" for="edit-correoElectronico">Correo Electrónico</label>
              <input type="text" id="edit-correoElectronico" class="form-control" placeholder="Escribir Correo Electrónico" aria-label="john.doe@example.com" onblur="validarCorreoElectronicoEdit()" />
              <div id="mensajeErrorCorreoEdit" style="color: red;"></div>
          </div>
          
            <div class="mb-3">
              <label class="form-label" for="edit-contrasena">Contraseña</label>
              <input type="text" id="edit-contrasena" class="form-control" placeholder="Escribir Contraseña" aria-label="Contraseña" onblur="validarContrasenaEdit()" />
              <div id="mensajeErrorContrasenaEdit" style="color: red;"></div>
            </div>

            <div class="mb-3">
              <label class="form-label" for="edit-fechaNacimiento">Fecha de Nacimiento</label>
              <div class="col-md-10">
                  <input class="form-control" type="date" value="" id="edit-html5-date-input" oninput="validarFechaNacimientoEdit()" min='1900-01-01' max='2023-12-31' />
                  <div id="mensajeErrorFechaEdit" style="color: red;"></div>
              </div>
            </div>

            <div class="mb-3">
                <label class="form-label" for="edit-genero">Género</label>
                <select id="edit-genero" class="form-select">
                    <option selected disabled value="">Opciones...</option>
                    <option value="Hombre">Hombre</option>
                    <option value="Mujer">Mujer</option>
                </select>
            </div>

            <div class="mb-3">
              <label class="form-label" for="edit-curp">CURP</label>
              <input type="text" id="edit-curp" class="form-control" placeholder="Escribir CURP" aria-label="CURP"  onblur="validarCurpEdit()" />
              <div id="mensajeErrorCurpEdit" style="color: red;"></div>
          </div>

            <div class="mb-3">
                <label class="form-label" for="edit-tipoSangre">Tipo de Sangre</label>
                <select id="edit-tipoSangre" class="form-select">
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
                <label class="form-label" for="edit-donador">Donador</label>
                <select id="edit-donador" class="form-select">
                    <option selected disabled value="">Opciones...</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </div>

            <button type="submit" id="btnEdit" class="btn btn-primary me-sm-3 me-1 data-submit" onclick="verificarCamposEdit()">Guardar Cambios</button>
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancelar</button>
        </form>
    </div>
</div>


<!-- ---------------------------------------------------------Modal Añadir Usuarios---------------------------------------------------------- -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
    <div class="offcanvas-header">
      <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Usuario</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
      <form class="add-new-user pt-0" id="addNewUserForm" onsubmit="return false">


      <div class="mb-3">
    <label class="form-label" for="add-Nombres">Nombres</label>
    <input type="text" id="add-Nombres" class="form-control" placeholder="Escribir Nombres" aria-label="Nombre Completo" onkeypress="return validarSoloLetras(event, this)" />
    <div id="mensajeErrorLetrasNombres" style="color: red;"></div>
</div>

<div class="mb-3">
    <label class="form-label" for="add-Apellidos">Apellidos</label>
    <input type="text" id="add-Apellidos" class="form-control" placeholder="Escribir Apellidos" aria-label="Apellido Completo" onkeypress="return validarSoloLetras(event, this)" />
    <div id="mensajeErrorLetrasApellidos" style="color: red;"></div>
</div>

        <div class="mb-3">
          <label class="form-label" for="add-correoElectronico">Correo Electrónico</label>
          <input type="text" id="add-correoElectronico" class="form-control" placeholder="Escribir Correo Electrónico" aria-label="john.doe@example.com" onblur="validarCorreoElectronico()" />
          <div id="mensajeErrorCorreo" style="color: red;"></div>
      </div>

      <div class="mb-3">
      <label class="form-label" for="add-contrasena">Contraseña</label>
      <input type="text" id="add-contrasena" class="form-control" placeholder="Escribir Contraseña" aria-label="Contraseña" onblur="validarContrasena()" />
      <div id="mensajeErrorContrasena" style="color: red;"></div>
     </div>

        <div class="mb-3">
    <label class="form-label" for="add-fechaNacimiento">Fecha de Nacimiento</label>
    <div class="col-md-10">
        <!-- Agrega el atributo oninput y el script de JavaScript -->
        <input class="form-control" type="date" value="" id="html5-date-input" oninput="validarFechaNacimiento()" min='1900-01-01' max='2023-12-31' />
        <div id="mensajeErrorFecha" style="color: red;"></div>
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
              <label class="form-label" for="add-curp">CURP</label>
              <input type="text" id="add-curp" class="form-control" placeholder="Escribir CURP" aria-label="CURP" onblur="validarCurp()"/>
              <div id="mensajeErrorCurp" style="color: red;"></div>              
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

        <button type="submit" id="btnAdd" class="btn btn-danger me-sm-3 me-1 data-submit" onclick="verificarCampos()">Confirmar</button>
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



</body>

</html>

<!-- beautify ignore:end -->