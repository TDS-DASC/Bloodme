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
    fetch('https://bloodprueba.up.railway.app/api/users/')
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
        var cellGenero = row.insertCell(3);
        var cellDonador = row.insertCell(4);
        var cellAcciones = row.insertCell(5);

        cellNombre.innerText = usuario.name + ' ' + usuario.last_name;
        cellCorreo.innerText = usuario.email;
        cellTipoSangre.innerText = usuario.blood_type;
        cellGenero.innerText = usuario.gender;
        cellDonador.innerText = usuario.donator === 1 ? 'Si' : 'No';
       
       

        cellAcciones.innerHTML = `
        <button type="button" class="btn btn-secondary" onclick="mostrarDetallesUsuario(${usuario.id})">Detalles</button>
        <button type="button" class="btn btn-primary" onclick="obtenerDetallesUsuario(${usuario.id})">Editar</button>
        <button type="button" class="btn btn-danger" onclick="eliminarUsuario('${usuario.id}')"> Eliminar</button>`;
    });
}

let usuarioSeleccionadoId = null;

function obtenerDetallesUsuario(userId) {
    fetch(`https://bloodprueba.up.railway.app/api/user/${userId}`, {
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
            
            // Asegurarse de que el valor de donador se maneje adecuadamente
            const donadorValue = data.user.donator ? 'Si' : 'No';
            
            // Seleccionar la opción correspondiente en el elemento select
            const editDonadorSelect = document.getElementById('edit-donador');
            for (let i = 0; i < editDonadorSelect.options.length; i++) {
                if (editDonadorSelect.options[i].value === donadorValue) {
                    editDonadorSelect.selectedIndex = i;
                    break;
                }
            }

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

function editarUsuario(userId) {
    obtenerDetallesUsuario(userId);
}




document.getElementById('btnEdit').addEventListener('click', function() {
        console.log("Soy el botón editar");
        verificarCamposEdit();
    });



// FUNCION ELIMINAR
function eliminarUsuario(usuarioId) {
    if (confirm('¿Estás seguro de que quieres eliminar este usuario?')) {
        fetch(`https://bloodprueba.up.railway.app/api/users/${usuarioId}`, {
            method: 'DELETE'
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`Error al eliminar el usuario. Código de estado: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('Usuario eliminado exitosamente:', data);
            cargarYMostrarUsuarios();
        })
        .catch(error => {
            console.error('Error al eliminar el usuario:', error);
            alert('Error al eliminar el usuario.');
        });
    }
}

function obtenerDetallesUsuario2(userId) {
    fetch(`https://bloodprueba.up.railway.app/api/user/${userId}`, {
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

            // Llena los campos del modal con los datos del usuario
            document.getElementById('detalles-Nombres').value = usuarioNombre;
            document.getElementById('detalles-Apellidos').value = usuarioApellido;
            document.getElementById('detalles-correoElectronico').value = usuarioEmail;
            document.getElementById('detalles-tipoSangre').value = data.user.blood_type || '';
            document.getElementById('detalles-curp').value = data.user.curp || '';
            document.getElementById('detalles-fechaNacimiento').value = data.user.birthdate || '';
            document.getElementById('detalles-genero').value = data.user.gender || '';
            document.getElementById('detalles-donador').value = data.user.donator ? 'Sí' : 'No';

        }  
    })
    .catch(error => {
        console.error('Error al obtener los detalles del usuario:', error);
        alert('Error al obtener los detalles del usuario.');
    });
}

function mostrarDetallesUsuario(userId) {
    // Obtener y mostrar detalles del usuario en el modal offcanvasDetallesUsuario
    obtenerDetallesUsuario2(userId);

    // Mostrar el modal de detalles
    var offcanvasDetallesUsuario = new bootstrap.Offcanvas(document.getElementById('offcanvasDetallesUsuario'));
    offcanvasDetallesUsuario.show();
}

</script>
    
<style>
    #offcanvasAddUser, #offcanvasEditUser {
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        width: 50%;
        height: 550px;
    }

    #offcanvasDetallesUsuario {
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        width: 50%;
        height: 500px;
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
    <a href="{{ route('adminDashboardRuta') }}"  class="app-brand-link">
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
    var curpInput = document.getElementById('add-curp');
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

var offcanvasAddUser = new bootstrap.Offcanvas(document.getElementById('offcanvasAddUser'));
function verificarCampos() {
        var formulario = document.getElementById('addNewUserForm');
        if (!formulario.checkValidity()) {
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
       
        var donador = document.getElementById('add-donador').value;
        var donadorValue = donador === 'Si' ? 1 : 0;

        
        // Crear objeto de datos para enviar al servidor
        var userData = {
            name: nombres,
            last_name: apellidos,
            email: correoElectronico,
            password: contrasena,
            blood_type: tipoSangre,
            curp: curp,
            birthdate: fechaNacimiento,
            gender: genero,
            donator: donadorValue
        };

        // Realizar la solicitud POST a la API
        fetch('https://bloodprueba.up.railway.app/api/register', {
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
            return response.json(); 
        })
        .then(data => {
            // La respuesta exitosa del servidor
            console.log('Respuesta del servidor:', data);

            
            

            
           
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
        document.getElementById('add-donador').value = '';
        
        offcanvasAddUser.hide();
   
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
        // var offcanvasAddUser = new bootstrap.Offcanvas(document.getElementById('offcanvasAddUser'));
        // offcanvasAddUser.hide();
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


function validarCurp2() {
    var curpInput = document.getElementById('edit-curp');
    var mensajeErrorCurp = document.getElementById('mensajeErrorCurpEdit');

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
    var curpInputEdit = document.getElementById('edit-curp');
    var mensajeErrorCurpEdit = document.getElementById('mensajeErrorCurpEdit');

    // Expresión regular para permitir solo letras sin acentos y números
    var regexCurp = /^[A-Za-z0-9]+$/;

    // Verificar la longitud del CURP y el formato
    if (curpInputEdit.value.length !== 18 || !regexCurp.test(curpInputEdit.value)) {
        mensajeErrorCurpEdit.innerText = 'El CURP debe tener exactamente 18 caracteres y solo contener letras y números sin acentos escritas en mayusculas.';
        curpInputEdit.classList.add('is-invalid');
    } else {
        // Limpiar el mensaje de error si la longitud y formato son correctos
        mensajeErrorCurpEdit.innerText = '';
        curpInputEdit.classList.remove('is-invalid');

        // Convertir el CURP a mayúsculas
        curpInputEdit.value = curpInputEdit.value.toUpperCase();
    }
}

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


function verificarCamposEdit() {
        // Obtener el formulario
        var formulario = document.getElementById('editUserForm');

        // Verificar la validez del formulario
        if (!formulario.checkValidity()) {
            // Si el formulario no es válido, mostrar mensajes de error y detener el proceso
            formulario.reportValidity();
            return;
        }

        // Obtener valores de los campos
        var nombres = document.getElementById('edit-Nombres').value;
        var apellidos = document.getElementById('edit-Apellidos').value;
        var correoElectronico = document.getElementById('edit-correoElectronico').value;
        var contrasena = document.getElementById('edit-contrasena').value;
        var tipoSangre = document.getElementById('edit-tipoSangre').value;
        var curp = document.getElementById('edit-curp').value;
        var fechaNacimiento = document.getElementById('edit-html5-date-input').value;
        var genero = document.getElementById('edit-genero').value;
        var donador = document.getElementById('edit-donador').value;
        var donadorValue = donador === 'Si' ? 1 : 0;
       

        // Crear objeto de datos para enviar al servidor
        var editedUserData = {
          name: nombres,
          last_name: apellidos,
          email: correoElectronico,
          password: contrasena,
          blood_type: tipoSangre,
          curp: curp,
          birthdate: fechaNacimiento,
          gender: genero,
          donator:donadorValue
        };

          fetch('https://bloodprueba.up.railway.app/api/users/' + usuarioSeleccionadoId, {
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
        return response.json(); 
    })
    .then(data => {
        console.log('Respuesta del servidor:', data);

        var offcanvasEditUser = new bootstrap.Offcanvas(document.getElementById('offcanvasEditUser'));
        offcanvasEditUser.hide();
        
        var modalElement = document.getElementById('offcanvasEditUser');
        var modal = bootstrap.Offcanvas.getInstance(modalElement);
        modal.hide();
        
        alert('Usuario editado exitosamente')
       
    })
    .catch(error => {
        console.error('Error en la solicitud de edición:', error);
        alert('Error al editar el usuario.');

        if (error && error.response && error.response.text) {
            // Intenta obtener más información sobre la respuesta
            error.response.text().then(text => {
                console.error('Contenido de la respuesta:', text);
            });
        }
    });
    var offcanvasEditUser = new bootstrap.Offcanvas(document.getElementById('offcanvasEditUser'));
    offcanvasEditUser.hide();
}



    // -------------------------AQUI EMPIEZA PARA VER DETALLES-----------------------------------------
</script>


<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h4>Listado de Usuarios</h4>
    <button type="button" class="btn btn-success" id="btnAdd">Añadir</button>
  </div>
  
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead class="table-light">
        <tr>
          <th>Nombre</th>
          <th>Correo Electronico</th>
          <th>Tipo de Sangre</th>
          <th>Genero</th>
          <th>Donador</th>
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




<!-- Modal de Detalles del Usuario -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasDetallesUsuario" class="modal" aria-labelledby="offcanvasDetallesUsuarioLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasDetallesUsuarioLabel" class="offcanvas-title">Detalles del Usuario</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
        <form class="detalles-usuario pt-0" id="detallesUsuarioForm" onsubmit="return false">

            <div class="row">
                <!-- Columna 1 -->
                <div class="col-md-6">
                    <!-- Campo Nombres -->
                    <div class="mb-3">
                        <label for="detalles-Nombres" class="form-label">Nombres:</label>
                        <input type="text" class="form-control" id="detalles-Nombres" readonly>
                    </div>

                    <!-- Campo Apellidos -->
                    <div class="mb-3">
                        <label for="detalles-Apellidos" class="form-label">Apellidos:</label>
                        <input type="text" class="form-control" id="detalles-Apellidos" readonly>
                    </div>

                    <!-- Campo Correo Electrónico -->
                    <div class="mb-3">
                        <label for="detalles-correoElectronico" class="form-label">Correo Electrónico:</label>
                        <input type="email" class="form-control" id="detalles-correoElectronico" readonly>
                    </div>

                    <!-- Campo Donador -->
                    <div class="mb-3">
                      <label for="detalles-donador" class="form-label">Donador:</label>
                      <input type="text" class="form-control" id="detalles-donador" readonly>
                    </div>



                </div>

                <!-- Columna 2 -->
                <div class="col-md-6">
                    <!-- Campo Fecha de Nacimiento -->
                    <div class="mb-3">
                        <label for="detalles-fechaNacimiento" class="form-label">Fecha de Nacimiento:</label>
                        <input type="date" class="form-control" id="detalles-fechaNacimiento" readonly>
                    </div>

                    <!-- Campo Género -->
                    <div class="mb-3">
                        <label for="detalles-genero" class="form-label">Género:</label>
                        <input type="text" class="form-control" id="detalles-genero" readonly>
                    </div>

                    <!-- Campo CURP -->
                    <div class="mb-3">
                        <label for="detalles-curp" class="form-label">CURP:</label>
                        <input type="text" class="form-control" id="detalles-curp" readonly>
                    </div>

                    <!-- Campo Tipo de Sangre -->
                    <div class="mb-3">
                        <label for="detalles-tipoSangre" class="form-label">Tipo de Sangre:</label>
                        <input type="text" class="form-control" id="detalles-tipoSangre" readonly>
                    </div>
                </div>
            </div>

            <!-- Botón para cerrar el modal -->
            <div class="text-center">
                <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cerrar</button>
            </div>
        </form>
    </div>
</div>



<!-- Modal Editar Usuarios -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEditUser" class="modal" aria-labelledby="offcanvasEditUserLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasEditUserLabel" class="offcanvas-title">Editar Usuario</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
        <form class="edit-user pt-0" id="editUserForm" onsubmit="return false">

            <div class="row">
                <!-- Columna 1 -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label" for="edit-Nombres">Nombres</label>
                        <input type="text" id="edit-Nombres" class="form-control" placeholder="Escribir Nombres" aria-label="Nombre Completo" onkeypress="return validarSoloLetras(event, this)" />
                        <div id="mensajeErrorLetrasNombresEdit" style="color: red;"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="edit-Apellidos">Apellidos</label>
                        <input type="text" id="edit-Apellidos" class="form-control" placeholder="Escribir Apellidos" aria-label="Apellido Completo" onkeypress="return validarSoloLetras(event, this)" />
                        <div id="mensajeErrorLetrasApellidosEdit" style="color: red;"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="edit-correoElectronico">Correo Electrónico</label>
                        <input type="text" id="edit-correoElectronico" class="form-control" placeholder="Escribir Correo Electrónico" aria-label="john.doe@example.com" onblur="validarCorreoElectronicoEdit()" />
                        <div id="mensajeErrorCorreoEdit" style="color: red;"></div>
                    </div>


                    <div class="mb-3">
                        <label class="form-label" for="edit-curp">CURP</label>
                        <input type="text" id="edit-curp" class="form-control" placeholder="Escribir CURP" aria-label="CURP" onblur="validarCurp2()" />
                        <div id="mensajeErrorCurpEdit" style="color: red;"></div>
                    </div>

                </div>

                <!-- Columna 2 -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label" for="edit-contrasena">Contraseña</label>
                        <input type="password" id="edit-contrasena" class="form-control" placeholder="Escribir Contraseña" aria-label="Contraseña" onblur="validarContrasenaEdit()" />
                        <div id="mensajeErrorContrasenaEdit" style="color: red;"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="edit-fechaNacimiento">Fecha de Nacimiento</label>
                        <div class="col-md-10">
                            <input class="form-control" type="date" value="" id="edit-html5-date-input" min='1900-01-01' max='2023-12-31' onblur="validarFechaNacimientoEdit()" />
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
                </div>
            </div>

            <div class="mb-3">
                        <label class="form-label" for="edit-donador">Donador</label>
                        <select id="edit-donador" class="form-select">
                            <option selected disabled value="">Opciones...</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>

            <!-- Botones -->
            <div class="text-center">
                <button type="submit" id="btnEdit" class="btn btn-primary me-sm-3 me-1 data-submit" onclick="verificarCamposEdit()" data-bs-dismiss="offcanvas">Guardar Cambios</button>
                <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancelar</button>
            </div>
        </form>
    </div>
</div>






<!-- Modal Añadir Usuarios -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Usuario</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
        <form class="add-new-user pt-0" id="addNewUserForm" onsubmit="return false">

            <div class="row">
                <!-- Columna 1 -->
                <div class="col-md-6">
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
    <label class="form-label" for="add-fechaNacimiento">Fecha de Nacimiento</label>
    <div class="col-md-10">
        <input class="form-control" type="date" value="" id="html5-date-input" oninput="validarFechaNacimiento()" min='1900-01-01' max='2023-12-31' />
        <div id="mensajeErrorFecha" style="color: red;"></div>
    </div>
</div>


<div class="mb-3">
              <label class="form-label" for="add-curp">CURP</label>
              <input type="text" id="add-curp" class="form-control" placeholder="Escribir CURP" aria-label="CURP" onblur="validarCurp()"/>
              <div id="mensajeErrorCurp" style="color: red;"></div>              
          </div>


                </div>

                <!-- Columna 2 -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label" for="add-correoElectronico">Correo Electrónico</label>
                        <input type="text" id="add-correoElectronico" class="form-control" placeholder="Escribir Correo Electrónico" aria-label="john.doe@example.com" onblur="validarCorreoElectronico()" />
                        <div id="mensajeErrorCorreo" style="color: red;"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="add-contrasena">Contraseña</label>
                        <input type="password" id="add-contrasena" class="form-control" placeholder="Escribir Contraseña" aria-label="Contraseña" onblur="validarContrasena()" />
                        <div id="mensajeErrorContrasena" style="color: red;"></div>
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

                    <!-- Agrega más inputs a la columna 2 según sea necesario -->

                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="add-donador">Donador</label>
                <select id="add-donador" class="form-select">
                    <option selected disabled value="">Opciones...</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </div>

            <!-- Resto de los inputs -->

            <!-- Nueva fila para centrar los botones -->
            <div class="row">
                <div class="col-md-12 offset-md-0 text-center">
                    <button type="submit" id="btnAdd" class="btn btn-danger me-sm-3 me-1 data-submit" onclick="verificarCampos()">Confirmar</button>
                    <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancelar</button>
                </div>
            </div>
        </form>
    </div>
</div>








          
          

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